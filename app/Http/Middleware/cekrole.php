<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class cekrole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $roles = array_slice(func_get_args(),2);
        foreach ($roles as $role){
            if ($request->user()->role == $role){
                return $next($request);
            }    
        }
        return redirect('/')->with('forbidden', 'Anda Tidak Memiliki Akses');
    }
}
