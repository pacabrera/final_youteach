<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function authenticated($request , $user){
        if($user->permissions=='1'){
            swal()->autoclose(2000)->message('Good Job','You have successfully logged In!','info'); 
            return redirect()->route('teacher-panel') ;
        }elseif($user->permissions=='2'){
            swal()->autoclose(2000)->message('Good Job','You have successfully logged In!','info'); 
            return redirect()->route('student-panel') ;
        }
        elseif($user->permissions=='0'){
            swal()->autoclose(2000)->message('Good Job','You have successfully logged In!','info'); 
            return redirect()->route('admin-panel') ;
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
        return 'usr';
    }
}
