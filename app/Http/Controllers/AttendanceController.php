<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Klase;
use App\AttendanceQr;
use Carbon\Carbon;
use App\Attendance;
use App\ClassMembers;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($class_id)
    {
                $checkIfInClass = ClassMembers::where('class_id', $class_id)->where('student_id', Auth::user()->id);
        $checkIfInstructor = Klase::where('class_id', $class_id)->where('instructor_id', Auth::user()->id);
        
        if($checkIfInClass->count() > 0 or $checkIfInstructor->count()){

    	$today =  Carbon::today();
    	$myClass = Klase::where('class_id', $class_id)->first();
    	$qrcode = AttendanceQr::where('class_id', $class_id)->whereDate('created_at', Carbon::today())->first();
        $attendances = Attendance::where('qr_id', $qrcode->id)->whereDate('created_at', Carbon::today())->get();
        $class_members = ClassMembers::where('class_id', $class_id)->count();
    	return view('teacher.qr-attendace', compact('myClass', 'qrcode','attendances', 'class_members'));
    }
    else {
        abort(403);
    }
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
        $checkIfInClass = ClassMembers::where('class_id', $class_id)->where('student_id', Auth::user()->id);
        $checkIfInstructor = Klase::where('class_id', $class_id)->where('instructor_id', Auth::user()->id);
        
        if($checkIfInClass->count() > 0 or $checkIfInstructor->count()){
    	$myClass = Klase::where('class_id', $class_id)->first();
    	return view('student.qr-attendace', compact('myClass'));
    }
    else{
        abort(403);
    }
    }

    public function getAttendance($id)
    {
        $xd = AttendanceQr::where('id', $id)->first();
        $attendances = Attendance::where('qr_id', $id)->whereDate('created_at', Carbon::today())->get();
        $myClass = Klase::where('class_id', $xd->class_id)->first();
        $result = ClassMembers::whereNotIn('student_id', function($q){
            $q->select('usr_id')->from('attendances')->whereDate('created_at', Carbon::today());
        })->get();
        return view('teacher.attendances', compact('myClass', 'attendances', 'result', 'xd'));
    }

    public function getAllAttendance($class_id)
    {

  $archives = AttendanceQr::all()->where('class_id', $class_id)->groupBy(function($date) {
    return Carbon::parse($date->created_at)->format('Y-m');
    });
        $myClass = Klase::where('class_id', $class_id)->first();

        return view('teacher.all-attendance', compact('myClass', 'archives'));
    }
    public function getSingleAttendance($class_id, $month, $year)
    {
        $xd = AttendanceQr::where('id', $id)->first()->class_id;
        $attendances = Attendance::where('qr_id', $id)->whereDate('created_at', Carbon::today())->get();
        $myClass = Klase::where('class_id', $xd)->first();
        $result = ClassMembers::whereNotIn('student_id', function($q){
            $q->select('usr_id')->from('attendances')->whereDate('created_at', Carbon::today());
        })->get();
        return view('teacher.attendances', compact('myClass', 'attendances', 'result'));
    }
}
