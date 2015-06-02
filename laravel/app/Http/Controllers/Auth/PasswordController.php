<?php namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PasswordController extends Controller {
    
	protected $auth;
	protected $passwords;

	public function __construct(Guard $auth, TeacherPasswordBroker $passwords)
	{
		$this->auth = $auth;
		$this->passwords = $passwords;

		$this->middleware('guest');
	}
    
	public function getEmail() {
		return view('myPage.reset.email');
	}
    
	public function postEmail(Request $request) {
		$this->validate($request, ['email' => 'required|email']);
		$response = $this->passwords->sendResetLink($request->only('email'), function($m) {
			$m->subject('Your Password Reset Link');
		});
		switch ($response) {
			case TeacherPasswordBroker::RESET_LINK_SENT:
				return redirect()->back()->with('status', trans($response));
			case TeacherPasswordBroker::INVALID_USER:
				return redirect()->back()->withErrors(['email' => trans($response)]);
		}
	}
    
	public function getReset($token = null) {
		if (is_null($token)) {
			throw new NotFoundHttpException;
		}
		return view('myPage.reset.reset')->with('token', $token);
	}
    
	public function postReset(Request $request) {
		$this->validate($request, [
			'token' => 'required',
			'email' => 'required|email',
			'password' => 'required|confirmed',
		]);
		$credentials = $request->only(
			'email', 'password', 'password_confirmation', 'token'
		);
		$response = $this->passwords->reset($credentials, function($teacher, $password) {
			$teacher->user->password = \Hash::make($password);
			$teacher->user->save();
			$this->auth->login($teacher->user);
		});
		switch ($response) {
			case TeacherPasswordBroker::PASSWORD_RESET:
				return redirect('/login/teacher');
			default:
				return redirect()->back()
							->withInput($request->only('email'))
							->withErrors(['email' => trans($response)]);
		}
	}
}
