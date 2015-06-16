<?php namespace App\Http\Controllers;

use DateTime;
use App\Teacher;
use App\Comment;
use App\Feedback;
use App\Question;
use Illuminate\Http\Request;
use App\Student;
use App\Classroom;
use Auth;

class TeacherController extends Controller {
    
    public function __construct() {
        $this->middleware('teacher');
    }
    
    public function getIndex() {
        return view('myPage.teacher.feedback', ['students' => Student::all(), 'comments' => Comment::all(), 'feedbacks' => Feedback::all(), 'questions' => Question::all()]);
    }
    public function getSettings() {
        return view('myPage.teacher.settings');
    }
    public function getFrage() {

        return view('myPage.teacher.questions', ['students' => Student::all(), 'comments' => Comment::all(), 'feedbacks' => Feedback::all(), 'questions' => Question::all()]);
    }
    //ToDo: links auf getQuestions ändern.
    public function getAskFrage() {
        return view('myPage.teacher.newquestion')
            ->with('classes', Classroom::lists('year','id'));
    }
    
    
    public function getFeedback() {
        return view('myPage.teacher.feedback', ['students' => Student::all(), 'comments' => Comment::all(), 'feedbacks' => Feedback::all(), 'questions' => Question::all(), 'classroom' => Classroom::all()]);
    }
    public function getProfile(){
        return view('myPage.teacher.profile');
    }

    

    public function postComment(Request $request) {
        $this->validate($request, [
            'feedback' => 'required_without:question|exists:feedback,id',
            'question' => 'required_without:feedback|exists:questions,id',
            'content' => 'required|string'
        ]);
        $comment = new Comment;
        $comment->content = $request->input('content');
        $comment->from = "teacher";
        if ($request->has('feedback')) {
            $comment->fk_feedback = $request->input('feedback');
        } else {
            $comment->fk_question = $request->input('question');
        }
        $comment->created_at = new DateTime;
        $comment->save();
        
        return redirect()->action('TeacherController@getIndex');
    }

    
    public function postNew(Request $request) {
        $question = new Question;
        $question->teacher()->associate(Auth::user()->teacher);
        $question->content = $request->input('question');

        $question->save();
        

        $question->classes()->attach($request->input('classname'));
        
        return redirect()->action('TeacherController@getIndex');

    }

}