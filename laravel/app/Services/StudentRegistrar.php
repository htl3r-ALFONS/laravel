<?php namespace App\Services;

use App\User;
use App\Student;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class StudentRegistrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'fishname' => 'required|max:255',
			'password' => 'required|confirmed|min:6'
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data) {
        $user = User::create([
            'password' => Hash::make($data['password'])
        ]);
        $student = Student::create([
            'fishname' => $data['fishname']
        ]);
        $class = Class::find($data['class']);
        
        $student->user()->associate($user);
        $student->classroom()->associate($class);
        $student->save();
	}

}
