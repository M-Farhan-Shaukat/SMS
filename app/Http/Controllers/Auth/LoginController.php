<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    public function showLoginForm ()
    {
        $users = User::all();
        return view('auth.login',compact('users'));
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/';
    protected function authenticated()
    {
       if(Auth::user()->role == 1){
        return redirect('/');
       }
       elseif(Auth::user()->role == 2){
        return redirect('/');
       }
       else{
        return redirect('/');
       }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        $loginValue = request('username');
        if(is_numeric($loginValue)){
            $this->username = 'contact';
        } elseif (filter_var($loginValue, FILTER_VALIDATE_EMAIL)) {
            $this->username = 'email';
        } else {
            $this->username = 'username';
        }
        request()->merge([$this->username => $loginValue]);
        return property_exists($this, 'username') ? $this->username : 'email';
    }
}
