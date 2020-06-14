<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        $admin = str_limit($request->route()->getName(), 5);
        if($admin == "admin..."){
            return '/admin/login';
        }elseif (! $request->expectsJson()) {
            return route('login');
        }
    }
}
