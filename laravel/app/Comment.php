<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    
    public $timestamps = false;
    
    public function feedback() {
        return $this->belongsTo('App\Feedback', 'fk_feedback');
    }

}
