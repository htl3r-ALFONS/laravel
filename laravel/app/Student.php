<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    
    public $timestamps = false;
    
    public function user() {
        return $this->belongsTo('App\User', 'fk_user');
    }
    
    public function classroom() {
        return $this->belongsTo('App\Classroom', 'fk_classroom');
    }
    
    public function feedback() {
        return $this->hasMany('App\Feedback', 'fk_student');
    }
    
}
