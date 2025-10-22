<?php

namespace App\Http\Middleware;

use Closure;
use http\Exception\RuntimeException;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;
use phpDocumentor\Reflection\Exception;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class HasPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->header('sebi-key') != 'test') {
            throw new HttpException(403, "You don't have the sebi's key!");
        }

        return $next($request);
    }
}
