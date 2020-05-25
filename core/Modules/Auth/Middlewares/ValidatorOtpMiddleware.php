<?php


namespace Core\Modules\Auth\Middlewares;

use Closure;
use Illuminate\Support\Facades\Cookie;

class ValidatorOtpMiddleware
{
    public function handle($request,Closure $next){
        if(Cookie::get('email') !== null){
            return $next($request);
        }
        return redirect()->route('login');
    }
}
