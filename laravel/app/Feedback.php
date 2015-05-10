<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model {
    
    public $timestamps = false;
    
    public function student() {
        return $this->belongsTo('App\Student', 'fk_student');
    }
    
    public function teacher() {
        return $this->belongsTo('App\Teacher', 'fk_teacher');
    }
    
    public function question() {
        return $this->belongsTo('App\Question', 'fk_question');
    }
    
    public function comments() {
        return $this->hasMany('App\Comments', 'fk_feedback');
    }

}
