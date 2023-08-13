<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// use App\Models\Article;

class CheckExistenceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $model)
    {
        
        $instance = "\\App\\Models\\".$model;
        $instance::findOrFail($request->id);
        $request['model'] = $instance;
        return $next($request);
    }
}
