<?php namespace App\Http\Controllers\Auth;

use App\Teacher;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

class TeacherProvider implements UserProvider {
    public function retrieveById($id) {
        return Teacher::find($id);
    }
    
    public function retrieveByToken($identifier, $token) {
        throw new Exception();
    }
    
	public function updateRememberToken(Authenticatable $user, $token) {
        throw new Exception();
    }
    
	public function retrieveByCredentials(array $credentials) {
        return Teacher::where('email', $credentials['email'])->first();
    }
    
	public function validateCredentials(Authenticatable $user, array $credentials) {
        $teacher = retrieveByCredentials($credentials);
        
        return Auth::validate(['pk_id' => $teacher->user()->id, 'password' => $credentials['password']]);
    }

}