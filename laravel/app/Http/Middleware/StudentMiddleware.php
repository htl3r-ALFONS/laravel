<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class StudentMiddleware {
    
    protected $auth;
    
    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if ($this->auth->check() && !is_null($this->auth->user()->student)) {
		    return $next($request);
        }
        
        return redirect()->action('MyController@index');
	}

}
