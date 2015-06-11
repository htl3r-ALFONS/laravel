<?php namespace App\Http\Controllers\Auth;

use Auth;
use App\Student;
use App\Teacher;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentLoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller {
    
    public function __construct() {
        $this->middleware('guest');
    }

    public function getStudent() {
        return view('myPage.login.student');
    }
    
    public function postStudent(StudentLoginRequest $request) {
        $student = Student::where('fishname', $request->input('fishname'))->firstOrFail();
        Auth::attempt(['id' => $student->user->id, 'password' => $request->input('password')]);
        return redirect('/login/student');
    }
    
    public function getTeacher() {
        return view('myPage.login.teacher');
    }
    
    public function postTeacher(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $teacher = Teacher::where('email', $request->input('email'))->firstOrFail();
        Auth::attempt(['id' => $teacher->user->id, 'password' => $request->input('password')]);
        return redirect('/login/teacher');
    }

}
