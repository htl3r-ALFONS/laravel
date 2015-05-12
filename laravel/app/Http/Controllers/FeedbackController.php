<?php namespace App\Http\Controllers;

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
            ->with('teachers', Teacher::all());
    }
    
    public function store() {
        /* probe von eloquent */
        $teacher = Teacher::find(Request::get(''));
        
        $feedback = new Feedback;
        $feedback->teacher()->associate($teacher);
        $feedback->fishname = false;
        $feedback->save();
        $feedback = Feedback::create(['teacher' => Request::get(''), 'feedback' => Request::get(''),'fishname' => Request::get('')]);
        $input = Request::all();
        
        return $input;
    }
}
