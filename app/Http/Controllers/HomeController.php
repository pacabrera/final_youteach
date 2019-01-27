<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Klase;
use App\ClassMembers;
use Auth;
use Announce;
use App\User;
use App\UserProfile;
use App\Grade;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['only' => ['index','login']]);
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function redirectToPanel(){
        if (Auth::user()->permissions == 0){
       return redirect()->route('admin-panel');
        }
       elseif(Auth::user()->permissions == 1){
            return redirect()->route('teacher-panel');
        }
        else {
        return redirect()->route('student-panel');
        }
    }

    public function viewProfile($id){
       $user = User::where('id', $id)->first();
       $grades = Grade::where('usr_id', $id)->get();

       return view('profile', compact('user', 'grades'));
        }
    
}
