<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccessCheck
{
    public function handle(Request $request, Closure $next)
    {
        $actual_password = '4999';
        $received_password = $request->session()->get('pwd');

        if ($actual_password != $received_password) {
            $request->session()->flash('status', '🙈');
            return redirect('/');
        } else {
            return $next($request);
        }
    }
}
