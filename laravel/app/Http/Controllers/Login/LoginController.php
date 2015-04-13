<?php namespace App\Http\Controllers\Login;

use Auth;
use App\Student;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentLoginRequest;

class LoginController extends Controller {

    public function getStudent() {
        return view('myPage.login.students');
    }
    
    public function postStudent(StudentLoginRequest $request) {
        $student = Student::where('fishname', '=', $request->input('fishname'))->firstOrFail();
        Auth::loginUsingId($student->user->id);
        return redirect('/login/student');
    }
    
    public function getTeacher() {
        return view('myPage.login.teacher');
    }
    
    public function postTeacher() {
        
    }

}
