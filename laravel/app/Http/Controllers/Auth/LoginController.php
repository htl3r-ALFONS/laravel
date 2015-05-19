<?php namespace App\Http\Controllers\Auth;

use Auth;
use App\Student;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentLoginRequest;

class LoginController extends Controller {

    public function getStudent() {
        return view('myPage.login.student');
    }
    
    public function postStudent(StudentLoginRequest $request) {
        $student = Student::where('fishname', $request->input('fishname'))->firstOrFail();
        Auth::attempt(['id' => $student->user->id, 'password' => $request->input('password')]);
        return redirect()->secure('/login/student');
    }
    
    public function getTeacher() {
        return view('myPage.login.teacher');
    }
    
    public function postTeacher() {
        
    }

}
