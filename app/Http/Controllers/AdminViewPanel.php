<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use OwenIt\Auditing\Models\Audit;

class AdminViewPanel extends Controller
{
    public function __construct()
    {
        $this->middleware('checkIfAdmin:permissions');

    }

    public function index()
    {
        return view('admin.panel');
    }

    public function audits()
    {

$audits = Post::find(1)->audits;

        return view('admin.audits', compact('audits'));
    }
}
