<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Klase;
use App\AttendanceQr;
use Carbon\Carbon;
use App\Attendance;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($class_id)
    {
    	$today =  Carbon::today();
    	$myClass = Klase::where('class_id', $class_id)->first();
    	$qrcode = AttendanceQr::where('class_id', $class_id)->whereDate('created_at', Carbon::today())->first();
    	return view('teacher.qr-attendace', compact('myClass', 'qrcode'));
    }

    public function attendance(Request $request)
    {
    	    $code = $request->input('code');
   $qrcode = AttendanceQr::where('qrcode', $code)->whereDate('created_at', Carbon::today())->first();
        $attendance = new Attendance;
        $attendance->usr_id = Auth::user()->id;
        $attendance->qr_id = $qrcode->id;
        $attendance->string = $request->input('code');
        $attendance->save();

        swal()->success('Attendance Recorded!',[]);

    }

    public function student($class_id)
    {
    	$myClass = Klase::where('class_id', $class_id)->first();
    	return view('student.qr-attendace', compact('myClass'));
    }
}
