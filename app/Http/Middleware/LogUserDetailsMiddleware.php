<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogUserDetailsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Log::info('Request Details', [
        //     'date_time' => now()->toDateTimeString(),
        //     'ip_address' => $request->ip(),
        //     'url' => $request->fullUrl(),
        //     'method' => $request->method(),
        //     'user_agent' => $request->userAgent(),
        //     'user_id' => Auth::check() ? Auth::user()->id : '',
        // ]);
        Log::info('from global middleware');
        return $next($request);
    }
}
