<?php namespace App\Http\Controllers;

use App\Classroom;
use App\Question;
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
        $teacher = \Auth::user()->teacher("");
        $class = Classroom::find(Request::get('class'));
        
        $question = new Question;
        $question->teacher()->associate($teacher);
        $question->classes()->associate($class);
        $question->content = Request::get('question');
        $question->show_classname = Request::get('classname');
        $question->save();
    }
}
