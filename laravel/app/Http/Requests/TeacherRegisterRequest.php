<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class TeacherRegisterRequest extends FormRequest {
    public function rules() {
        return [
            'teachers' => 'required'
        ];
    }

    public function authorize() {
        // Only allow logged in users
        // return \Auth::check();
        // Allows all users in
        return true;
    }
}