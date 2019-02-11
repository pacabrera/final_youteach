<?php

namespace App\Http\Middleware;

use Closure;
use App\Assignment;
use Carbon\Carbon;

class StatusAssignment
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
        $assignments = Assignment::where('deadline', '<=', Carbon::now())->update(['status' => 1]);
        $late = Assignment::where('allow_late', 1)->where('deadline', '<=', Carbon::now()->addDay())->update(['allow_late' => 0]);

        return $next($request);
    }
}
