<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Cache\Repository;

class StoreCacheableResponse
{
    protected $cache;

    protected $minutes = 10;

    public function __construct(Repository $cache)
    {
        $this->cache = $cache;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cacheKey = $this->getCacheKey($request);

        if($request->method() === 'GET' && $this->cache->has($cacheKey)) {
            return cache($cacheKey);
        }

        return $next($request);
    }

    protected function getCacheKey($request)
    {
        return $request->path();
    }

    protected function isCacheable($response)
    {
        return preg_match('/2\d{2}/', $response->status(), $m);
    }

    public function terminate($request, $response)
    {
        $cacheKey = $this->getCacheKey($request);

        if($this->isCacheable($response)) {
            $this->cache->put($cacheKey, $response->content(), $this->minutes);
        }
    }
}
