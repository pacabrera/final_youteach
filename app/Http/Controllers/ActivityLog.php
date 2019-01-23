<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivityLog extends Controller
{
   public function getAudits($id)
   {
   		$audits = Activity::where('causer_id', $id)->get();
   		return view('audits', compact('audits'));

   }
}
