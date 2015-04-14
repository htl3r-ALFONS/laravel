<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model {
    
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
