<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Class extends Model {
    
    public function students() {
        return $this->hasMany('App\Student', 'fk_class');
    }

	public function questions() {
        return $this->belongsToMany(
            'App\QuestionsAskedTo',
            'question_asked_to',
            'pk_fk_class',
            'pk_fk_questions'
        );
    }

}
