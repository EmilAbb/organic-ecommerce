<?php

namespace App\Http\Middleware;

use App\Enums\Guards;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->guard(Guards::ADMIN->value)->check()){
            return redirect()->route('admin.login');
        }
        return $next($request);
    }
}
