<?php

namespace Celysium\Authenticate\Middlewares;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use SzkCompany\Logger\Facades\Logger;

class Authenticate
{
    /**
     * @throws AuthenticationException
     */
    public function handle(Request $request, Closure $next)
    {
        if(config('szk-service-manager.is_gateway', false))
            return $next($request);

        Logger::logRequest($request, 'auth');
        if (!$request->header('actor') || !$request->hasHeader('target-user')) {
            throw new AuthenticationException(
                'Unauthenticated.'
            );
        }

        return $next($request);
    }
}
