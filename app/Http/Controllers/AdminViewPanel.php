<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\User;
use App\Event;
use OwenIt\Auditing\Models\Audit;

class AdminViewPanel extends Controller
{
    public function __construct()
    {
        $this->middleware('checkIfAdmin:permissions');

    }

    public function index()
    {
    	$students = User::where('permissions', '2')->get();
        $events = Event::get();
        return view('admin.panel', compact('students', 'events'));
    }

    public function audits()
    {

$audits = Post::find(1)->audits;

        return view('admin.audits', compact('audits'));
    }
}
