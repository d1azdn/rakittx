<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        if (Auth::check()){
            $isAdmin = Auth::user()->isAdmin;
            if($isAdmin == 1){
                return $next($request);
            }
        }
        
        return redirect('/')->with('error',"You don't have admin access.");
    }
}