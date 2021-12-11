<?php

namespace App\Http\Middleware;

use Closure;

class AcceptHeader
{
    /**
     * 中间件
     * 请求头
     */
    public function handle($request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');

        return $next($request);
    }
}
