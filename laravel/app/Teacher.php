<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Passwords\CanResetPassword;

class Teacher extends Model, CanResetPasswordContract {
    
    use CanResetPassword;
    
    public $timestamps = false;
    
    public function user() {
        return $this->belongsTo('App\User', 'fk_user');
    }
    
    public function questions() {
        return $this->hasMany('App\Question', 'fk_teacher');
    }
    
    public function feedback() {
        return $this->hasMany('App\Feedback', 'fk_teacher');
    }
    
}
