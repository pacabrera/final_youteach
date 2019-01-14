<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserProfile;
use App\Klase;
use App\ClassMembers;
use Auth;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkIfAdmin:permissions');
    }
    
    /**
     * Display a listing of teachers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $teachers = User::with('user_profile', 'klase')
            ->where('permissions', 1)
            ->get();
        // return $teachers;
        // 
        
        return view('admin.teachers', compact('teachers'));
    }
}
