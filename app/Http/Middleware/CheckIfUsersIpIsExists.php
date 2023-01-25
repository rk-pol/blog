<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIfUsersIpIsExists
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
        $users_ip = filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP);

        if(! \App\Models\User::where('ip' ,'=' , $users_ip)->first()) {
            \App\Models\User::create([
                    'ip' => $users_ip,
                    'created_at' => NOW(),
            ]);
        };

        return $next($request);
    }
}
