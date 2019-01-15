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
        $result =0;

        $code = $request->data;
        if ($code) {
        $qrcode = AttendanceQr::where('qrcode', $code)->whereDate('created_at', Carbon::today())->first();
        $checkQr = AttendanceQr::where('qrcode', $code)->first();
        $check = Attendance::where('usr_id', Auth::user()->id)->where('qr_id', $qrcode->id)->count();
        if($check == 0){
            $attendance = new Attendance;
            $attendance->usr_id = Auth::user()->id;
            $attendance->qr_id = $qrcode->id;
            $attendance->save();
             swal()->success('Attendance Recorded!',[]);
             $result =1;
        }
 
        else {
            swal()->warning('You Already take Attendance!',[]);
            
        }
    }

 return $result;

       


    }

    public function student($class_id)
    {
    	$myClass = Klase::where('class_id', $class_id)->first();
    	return view('student.qr-attendace', compact('myClass'));
    }

    public function getAttendance($id)
    {
        $xd = AttendanceQr::where('id', $id)->first()->class_id;
        $attendances = Attendance::where('qr_id', $id)->whereDate('created_at', Carbon::today())->get();
        $myClass = Klase::where('class_id', $xd)->first();
        return view('teacher.attendances', compact('myClass', 'attendances'));
    }
}
