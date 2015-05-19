<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
//use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract {

	use Authenticatable;
    
    public $timestamps = false;

	protected $fillable = ['password'];

	protected $hidden = ['password'];
    
    public function student() {
        return $this->hasOne('App\Student', 'fk_user');
    }
    
    public function teacher() {
        return $this->hasOne('App\Teacher', 'fk_user');
    }

}
