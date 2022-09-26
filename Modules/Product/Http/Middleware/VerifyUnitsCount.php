<?php

namespace Modules\Product\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Unit\Models\Unit;

class VerifyUnitsCount
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
        if (Unit::all()->count() <= 0)
        {
            return redirect(route('units.index'))->with('notFoundItem', 'هیچ واحدی یافت نشد لذا امکان افزودن محصول وجود ندارد');
        }
        return $next($request);
    }
}
