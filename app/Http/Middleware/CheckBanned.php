<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->banned_until) {
            $user = auth()->user();
            Auth::logout();

            return redirect()->route('login')
                ->withError(trans('Your account was blocked at') . $user->banned_until);
        }

        return $next($request);
    }
}
