<?php namespace App\Http\Controllers;

use App\Classroom;
use App\Feedback;
use Request;

class QuestionController extends Controller {
	public function __construct()
	{
		$this->middleware('guest');
	}
    

    public function create() {
        return view('feedback.createQuestion')
            -> with('classrooms', Classroom::all());
    }
    
    public function store() {
        /* probe von eloquent */
        $teacher = Teacher::find(Request::get('teacher'));
        
        $feedback = new Feedback;
        $feedback->teacher()->associate($teacher);
        $feedback->classes()->associate(Request::get('class'));
        $feedback->content = Request::get('question');
        $feedback->show_classname = Request::get('classname');
        $feedback->save();
    }
}
