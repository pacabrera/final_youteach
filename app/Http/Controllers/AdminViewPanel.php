<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
}
