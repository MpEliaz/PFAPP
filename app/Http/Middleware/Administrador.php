<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class Administrador
{
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        switch($this->auth->user()->rol){

            case 1:
                #Administrador
                return redirect()->to('admin');
                break;
            default:
                return redirect()->to('/');
                break;

        }
        return $next($request);
    }
}