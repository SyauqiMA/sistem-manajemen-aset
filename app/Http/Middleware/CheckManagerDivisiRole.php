<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckManagerDivisiRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // check if user's role is "Manager Divisi"
        // $userRole = $request->user()->id_level;
        $userRole = session('user_level');

        if($userRole !== "Manager Divisi") {
            return back();
        }

        return $next($request);
    }
}
