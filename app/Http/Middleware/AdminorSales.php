<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminorSales
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
        if(auth()->user()->User_Type == 'Admin' || auth()->user()->User_Type == 'Sales and Marketing')
        {
            return $next($request);
        }
        else
        {
            //return redirect()->route('login')->with('Error', 'Access Denied.');
            abort(404);
        }
        
        
    }
}
