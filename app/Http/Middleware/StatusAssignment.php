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

        return $next($request);
    }
}
