<?php namespace App\Http\Controllers\Auth;

use Auth;
use App\Classroom;
use App\User;
use App\Student;
use App\Teacher;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRegisterRequest;

class RegisterController extends Controller {
    
    public function getIndex() {
        return view('myPage.register.index');
    }

    public function getStudent() {
        return view('myPage.register.student');
    }
    
    public function postStudent(StudentRegisterRequest $request) {
        $count = $request->input("count");
        $classroom_string = $request->input("classroom");
        $result = [];

        $classroom = Classroom::where('year', $classroom_string[0])
            ->where('letter', $classroom_string[1])
            ->where('branch', $classroom_string[2])
            ->first();
        
        if (is_null($classroom)) {
            $classroom = new Classroom;
            $classroom->year = $classroom_string[0];
            $classroom->letter = $classroom_string[1];
            $classroom->branch = $classroom_string[2];
            $classroom->save();
        }
        
        for ($i = 0; $i < $count; $i += 1) {
            $password = str_random(20);
            
            $user = new User;
            $user->password = \Hash::make($password);
            $user->save();
            
            $student = new Student;
            $student->user()->associate($user);
            $student->fishname = str_random(20); // TODO actual fishname
            $student->classroom()->associate($classroom);
            $student->save();
            
            $result[$i] = [
                'student_id' => $student->id,
                'fishname' => $student->fishname,
                'password' => $password
            ];
        }
        
        return response()
            ->json($result);
    }
    
    public function getTeacher() {
        return view('myPage.register.teacher');
    }
    
    public function postTeacher() {
        
    }

}