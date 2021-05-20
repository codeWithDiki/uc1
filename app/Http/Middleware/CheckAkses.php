<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$akses)
    {
        if(in_array($request->user()->akses,$akses)){
            return $next($request);
        }
        switch ($request->user()->akses) {
            case 'admin':
                return redirect('/admin');
                break;
            case 'client':
                return redirect('/client');
                break;
            case 'cs':
                return redirect('/cs');
                break;
        }
        
    }
}
