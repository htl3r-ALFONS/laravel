<?php namespace App\Http\Controllers;

class FeedbackController extends Controller {
	public function __construct()
	{
		$this->middleware('guest');
	}
    

    public function create() {
        return view('feedback.create');
    }
}
