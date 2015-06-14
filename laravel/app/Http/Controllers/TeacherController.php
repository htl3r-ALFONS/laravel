<?php namespace App\Http\Controllers;

use App\Teacher;
use App\Comment;
use App\Feedback;
use App\Question;
use Request;
use App\Student;

class TeacherController extends Controller {
    
    public function __construct() {
        $this->middleware('teacher');
    }
    
    public function getIndex() {
        return view('myPage.teacher.home', ['students' => Student::all(), 'comments' => Comment::all(), 'feedbacks' => Feedback::all(), 'questions' => Question::all()]);
    }
    public function getSettings() {
        return view('myPage.teacher.settings');
    }
    public function getFrage() {
        return view('myPage.teacher.questions');
    }
    //ToDo: links auf getQuestions ändern.
    public function getAskFrage() {
        return view('myPage.teacher.newquestion');
    }
    
    
    public function getFeedback() {
        return view('myPage.teacher.feedback', ['students' => Student::all(), 'comments' => Comment::all(), 'feedbacks' => Feedback::all(), 'questions' => Question::all()]);
    }
    public function getProfile(){
        return view('myPage.teacher.profile');
    }
    public function postComment(Request $request) {
        $this->validate($request, [
            'feedback' => 'required|exists:feedback,id',
            'content' => 'required|string'
        ]);
        $comment = new Comment;
        $comment->content = $request->input('content');
        $comment->from = "teacher";
        $comment->fk_feedback = $request->input('feedback');
        $comment->created_at = new DateTime;
        $comment->save();
        
        return redirect()->action('TeacherController@getIndex');
    }

}