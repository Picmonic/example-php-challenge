<?php


namespace App\Http\Middleware;

use Closure;

class GithubMiddleware
{
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
