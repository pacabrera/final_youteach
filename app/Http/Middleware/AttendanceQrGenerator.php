<?php

namespace App\Http\Middleware;

use Closure;
use App\AttendanceQr;
use App\Klase;
use Carbon\Carbon;

class AttendanceQrGenerator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        return $next($request);
    }
}
