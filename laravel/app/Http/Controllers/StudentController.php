<?php namespace App\Http\Controllers;

use DateTime;
use App\Teacher;
use App\Comment;
use App\Feedback;
use App\Question;
use Illuminate\Http\Request;
use Auth;

class StudentController extends Controller {	
    
    public function __construct() {
        $this->middleware('student');
    }
    
    public function getIndex() {
        return view('myPage.student.home', ['teachers' => Teacher::all(), 'comments' => Comment::all(), 'feedbacks' => Feedback::all(), 'questions' => Question::all()]);
    }
    public function getSettings() {
        return view('myPage.student.settings');
    }    
    public function getFeedback() {
        return view('myPage.student.feedback', ['teachers' => Teacher::all(), 'comments' => Comment::all(), 'feedbacks' => Feedback::all(), 'questions' => Question::all()]);
    }
    
    public function getNew() {
        return view('feedback.create')
            ->with('teachers', Teacher::lists('name','id'));
    }
    
    public function postNew(Request $request) {
        $this->validate($request, [
            'feedback' => 'required|string'
        ]);
        
        $teacher = Teacher::find($request->input('teacher'));
        
        $feedback = new Feedback;
        $feedback->teacher()->associate($teacher);
        if($request->input('fishname') !== null) {
            $feedback->show_fishname = $request->input('fishname');
        } else {
            $feedback->show_fishname = false;
        }
        $feedback->content = $request->input('feedback');
        $feedback->student()->associate(Auth::user()->student);
        if($request->input('classroom') !== null) {
            $feedback->show_classroom = $request->input('classroom');
        } else {
            $feedback->show_classroom = false;
        }
        $feedback->save();
        
        return redirect()->action('StudentController@getIndex');
    }
    
    
    public function postPassword(Request $request) {
        $this->validate($request, [
            'password_current' => 'required',
            'password' => 'required|confirmed'
        ]);
        
        if (Auth::validate(['id' => Auth::user()->id, 'password' => $request->input('password_current')])) {
            $user = Auth::user();
            $user->password = \Hash::make($request->input('password'));
            $user->save();
            return redirect()->action('StudentController@getIndex');
        } else {
            return redirect()->back();
        }
    }

    public function postComment(Request $request) {
        $this->validate($request, [
            'feedback' => 'required|exists:feedback,id',
            'content' => 'required|string'
        ]);
        $comment = new Comment;
        $comment->content = $request->input('content');
        $comment->from = "student";
        if($request->input('feedback') == 'feedback') {
            $comment->fk_feedback = $request->input('feedback');
        } else {
            $comment->fk_question = $request->input('feedback');
        }
        $comment->created_at = new DateTime;
        $comment->save();
        
        return redirect()->action('StudentController@getIndex');
    }
}