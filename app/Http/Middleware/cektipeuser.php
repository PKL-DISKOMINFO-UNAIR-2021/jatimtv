<?php

namespace App\Http\Middleware;

use Closure;

class cektipeuser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$tipe)
    {
        if (in_array($request->user()->tipe,$tipe)){
            return $next($request);
        }
        return redirect("/home");
    }
}
