<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckWords
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $words = ['stupid','hate','idiot'];
        foreach($words as $word){

            if (str_contains($request->input('content'), $word)){
                return response()->view('auth.forbidden-page');
            }
        }
        
        return $next($request);
    }
}
