<?php namespace App\Http\Controllers;

use Auth;
use App\Teacher;
use App\Feedback;
use Request;

class FeedbackController extends Controller {
	public function __construct()
	{
		$this->middleware('guest');
	}
    

    public function create() {
        return view('feedback.create')
            ->with('teachers', Teacher::lists('name','id'));
    }
    
    public function store() {
        $teacher = Teacher::find(Request::get('teacher'));
        
        $feedback = new Feedback;
        $feedback->teacher()->associate($teacher);
        $feedback->show_fishname = Request::get('fishname');
        $feedback->content = Request::get('feedback');
        $feedback->student()->associate(Auth::user()->student());
        $feedback->show_classname = Request::get('classname');
        $feedback->save();
    }
}
