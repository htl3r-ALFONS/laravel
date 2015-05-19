<?php namespace App\Http\Controllers;

class MyController extends Controller {	

	//Lukas first controller, such excitement.

	public function about()
	{

		$name ="Lukas Mörtl";
		return view('myPage.about')->with('name', $name);
	}

	public function contact()
	{
		$mail="lukas.moertl@gmx.at";
		return view('myPage.contact')->with('mail', $mail);
	}
    
    public function index() {
        return view('myPage.index');
    }
    public function login() {
        return view('myPage.login');
    }
    public function test3() {
        return view('myPage.homemasterview');
    }
    public function students() {
        return view('myPage.studenthome');
    }
    public function teachers() {
        return view('myPage.teacherhome');
    }
    public function settings() {
        return view('myPage.settings');
    }
    public function feedback() {
        return view('myPage.lehrerliste');
    }
    
    
    

}