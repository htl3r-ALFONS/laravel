<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model {
    
    public $timestamps = false;
    
    public function students() {
        return $this->hasMany('App\Student', 'fk_classroom');
    }

	public function questions() {
        return $this->belongsToMany(
            'App\QuestionsAskedTo',
            'question_asked_to',
            'pk_fk_classroom',
            'pk_fk_questions'
        );
    }

}
