<?php namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;

class LogoutController extends Controller {
    
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function anyIndex() {
        Auth::logout();
        
        return redirect()->action('MyController@index');
    }

}
