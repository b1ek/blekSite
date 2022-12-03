<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CloseAdHandler
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
        $session = request()->session();

        if ($session->get('noad', time()) > time() + (3600 * 24 * 2)) {
            $session->forget('noad');
        }

        if (!isset($_GET['close_ad'])) return $next($request);


        $session->put('noad', time() + (3600 * 24 * 2));
        unset($_GET['close_ad']);
        return redirect()->to(request()->url() . (
            count($_GET) != 0 ?
            '?' . http_build_query($_GET) :
            ''
        ));
        
    }
}
