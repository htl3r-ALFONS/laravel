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

}