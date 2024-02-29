<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WebGurd
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        echo "Don";
        // if($request->age < 18){
        //     echo 'your not access this site';
        // }

        if(session()->has('user_id')){
            return  $next($request);
        }
        else {
            return response('You are not authorized to access this page.', 403);
        } 
    }
}
