<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Class Cors
 * @package App\Http\Middleware
 */
class Cors {
    /**
     * Handle an incoming request.
     *
     * Please add header('Access-Control-Allow-Origin: http://example.com');
     * & header('Access-Control-Allow-Credentials: true');
     * at the top of your route file.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept, Auth-Token, X-XSRF-TOKEN");
    }
}