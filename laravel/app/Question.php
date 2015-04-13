<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {
    
    public function classes() {
        return $this->belongsToMany('App\Class', 'question_asked_to', 'pk_fk_question', 'pk_fk_class');
    }
    
    public function teacher() {
        return $this->belongsTo('App\Teacher', 'fk_teacher');
    }
    
    public function feedback() {
        return $this->hasMany('App\Feedback', 'fk_question');
    }

}
