<?php namespace App\Http\Controllers;

use App\Feedback;
use Request;

class FeedbackController extends Controller {
	public function __construct()
	{
		$this->middleware('guest');
	}
    

    public function create() {
        return view('feedback.create');
    }
    
    public function store() {
        $input = Request::all();
        
        return $input;
    }
}
