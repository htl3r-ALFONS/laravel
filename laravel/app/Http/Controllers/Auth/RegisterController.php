<?php namespace App\Http\Controllers\Auth;

use Auth;
use App\Classroom;
use App\User;
use App\Student;
use App\Teacher;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRegisterRequest;
use App\Http\Requests\TeacherRegisterRequest;
use Illuminate\Routing\UrlGenerator;

class RegisterController extends Controller {
    
    private $passwords;
    
    private $urls;
    
    public function __construct(TeacherPasswordBroker $passwords, UrlGenerator $urls) {
        $this->passwords = $passwords;
        $this->urls = $urls;
    }
    
    public function getIndex() {
        return view('myPage.register.index')
            ->with('student_link', $this->urls->secure($this->urls->action('Auth\RegisterController@getStudent', [], false)))
            ->with('teacher_link', $this->urls->secure($this->urls->action('Auth\RegisterController@getTeacher', [], false)));
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
        $teachers_input = json_decode($request->input('teachers'));
        
        foreach ($teachers_input as $teacher_input) {
            foreach (['name', 'email'] as $field) {
                if (!isset($teacher_input[$field])) {
                    return redirect()->back();
                }
            }
        }
        
        foreach ($teachers_input as $teachers_input) {
            $user = User::create();
            
            $teacher = new Teacher;
            $teacher->name = $teacher_input['name'];
            $teacher->user()->associate($user);
            $teacher->save();
            
            $passwords->sendResetLink($teacher->toArray());
        }
    }

}
