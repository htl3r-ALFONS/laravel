<?php namespace App\Http\Controllers;

use App\Teacher;
use App\Comment;
use App\Feedback;
use App\Question;

class MyController extends Controller {	
    
    public function index() {
        return view('myPage.index');
    }
    public function login() {
        return view('myPage.login');
    }
    public function richtlinien() {
        return view('myPage.richtlinien');
    }    

    }
    public function impressum() {
        return view('myPage.impressum');
    }
}