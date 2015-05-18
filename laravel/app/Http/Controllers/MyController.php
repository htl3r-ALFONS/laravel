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
    
    public function robin() {
        return view('myPage.index');
    }
    public function test2() {
        return view('myPage.login');
    }
    public function test3() {
        return view('myPage.homemasterview');
    }
    public function test4() {
        return view('myPage.studenthome');
    }
    public function test5() {
        return view('myPage.teacherhome');
    }
    
    
    

}