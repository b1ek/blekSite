<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockRussia
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (geoip($request->ip())->iso_code == 'RU') {
            return view('no_russia');
        }
        return $next($request);
    }
}
