<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Response;

class TeacherRegisterRequest extends FormRequest {
    public function rules() {
        $rules = [
            'names' => 'required|array',
            'emails' => 'required|array'
        ];
        
        $names_length = count($this->request->get('names'));
        
        $rules['emails'] .= "|size:{$names_length}";
        
        return $rules;
    }

    public function authorize() {
        // Only allow logged in users
        // return \Auth::check();
        // Allows all users in
        return true;
    }
}