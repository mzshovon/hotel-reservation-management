<?php

namespace App\Http\Middleware;

use App\Http\CacheOps\VisitorManageFromCache;
use Closure;
use Illuminate\Http\Request;

class VisitorMonitorMiddleware
{
    public function __construct(private VisitorManageFromCache $visitorManageFromCache)
    {

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $featureName)
    {
        $this->visitorManageFromCache->storeVisitorInfo($request->ip(), $featureName);
        return $next($request);
    }
}
