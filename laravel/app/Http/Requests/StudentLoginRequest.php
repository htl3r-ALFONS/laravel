<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class StudentLoginRequest extends FormRequest {
    public function rules() {
        return [
            'fishname' => 'required',
            'password' => 'required'
        ];
    }

    public function authorize() {
        // Only allow logged in users
        // return \Auth::check();
        // Allows all users in
        return true;
    }
}