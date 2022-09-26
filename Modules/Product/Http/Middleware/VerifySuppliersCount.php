<?php

namespace Modules\Product\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Supplier\Models\Supplier;

class VerifySuppliersCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Supplier::all()->count() <= 0) {
            return to_route('suppliers.index')->with('notFoundItem', 'هیچ فروشنده ایی یافت نشد لذا امکان افزودن محصول وجود ندارد');
        }
        return $next($request);
    }
}
