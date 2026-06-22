<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogAfterResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }

    public function terminate(Request $request, Response $response): void
    {
        //
        // Log::info('Request Details', [
        //     'date_time' => now()->toDateTimeString(),
        //     'ip_address' => $request->ip(),
        //     'url' => $request->fullUrl(),
        //     'method' => $request->method(),
        //     'user_agent' => $request->userAgent(),
        //     'user_id' => Auth::check() ? Auth::user()->id : '',
        // ]);



        Log::info('from Terminable middleware');
    }
}
