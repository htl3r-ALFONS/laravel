<?php namespace App\Http\Controllers\Auth;

use Auth;
use App\Classroom;
use App\User;
use App\Student;
use App\Teacher;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRegisterRequest;
use App\Http\Requests\TeacherRegisterRequest;

class RegisterController extends Controller {
    
    public function __construct(TeacherPasswordBroker $passwords) {
        $this->passwords = $passwords;
    }
    
    public function getIndex() {
        return view('myPage.register.index', [
            'student_link' => action('Auth\RegisterController@getStudent'),
            'teacher_link' => action('Auth\RegisterController@getTeacher')
        ]);
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

        $results = Student::lists('fishname');
        for ($i = 0; $i < $count; $i += 1) {
            $password = str_random(20);
            
            $user = new User;
            $user->password = \Hash::make($password);
            $user->save();
            
            $student = new Student;
            $student->user()->associate($user);
            
            while(true) {
                $blockfishname = \FishName::blockfish();
                if (!in_array($blockfishname, $results))  {
                    $results[] = $blockfishname;
                    break;
                }
            }

            $student->fishname = $blockfishname;
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
    
    public function postTeacher(TeacherRegisterRequest $request) {
        $teacher_names = $request->input('names');
        $teacher_emails = $request->input('emails');
        
        $teachers_input = array_combine($teacher_names, $teacher_emails);
        
        foreach ($teachers_input as $name => $email) {
            \DB::transaction(function () use ($name, $email) {
                $user = User::create(['password' => null]);

                $teacher = new Teacher;
                $teacher->name = $name;
                $teacher->email = $email;
                $teacher->user()->associate($user);
                $teacher->save();

                $this->passwords->sendResetLink($teacher->toArray());
            });
        }
    }

}
