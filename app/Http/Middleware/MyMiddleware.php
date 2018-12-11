<?php

namespace App\Http\Middleware;

use Closure;

class MyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Kiểm tra route có chứa tham số "diem" và tham số "diem" >= 5
        if ($request->has("diem") && $request["diem"] >= 5) {
            return $next($request);
        } else {
            return redirect()->route("loi");
        }

        // Đăng kí middleware tại file kernel
    }
}
