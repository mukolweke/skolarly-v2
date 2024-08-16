<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CustomAuthentication
 */
class CustomAuthentication
{
    public function handle(Request $request, Closure $next): Response
    {
        // if (auth()->check()) {
        //     return $next($request);
        // }

        return redirect()->route('admin.login.index');
    }
}
