<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ApiAdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('api')->check())
            return response()->json(['message' => 'احراز هویت نشده'], 401);

        if (!Auth::guard('api')->user()->isAdmin())
            return response()->json(['message' => trans('خطای دسترسی')], 403);

        return $next($request);
    }
}
