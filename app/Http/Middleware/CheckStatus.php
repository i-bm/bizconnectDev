<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class CheckStatus
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
        $hash = sha1(Auth::user()->verify);
        if(Auth::user()->status == 0){
            return redirect()->route('user_verify',[Auth::user()->id,$hash]);
        }
        return $next($request);
    }
}