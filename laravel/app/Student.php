<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {
    
    public function user() {
        return $this->belongsTo('App\User', 'fk_user');
    }
    
    public function classroom() {
        return $this->belongsTo('App\Class', 'fk_class');
    }
    
    public function feedback() {
        return $this->hasMany('App\Feedback', 'fk_student');
    }
    
}
