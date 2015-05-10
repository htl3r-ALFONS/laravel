<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class StudentRegisterRequest extends FormRequest {
    public function rules() {
        return [
            'count' => 'required|integer',
            'classroom' => [
                'required',
                'regex:/[1-9][A-Z]{2}/'
            ]
        ];
    }

    public function authorize() {
        // Only allow logged in users
        // return \Auth::check();
        // Allows all users in
        return true;
    }
}