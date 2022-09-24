<?php

namespace Modules\Product\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Category\Models\Category;

class verifyCategoriesCount
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
        if (count(Category::all()) <= 0)
        {
            return to_route('categories.index')->with('notFoundItem', 'هیچ دسته بندی یافت نشد لذا امکان افزودن محصول وجود ندارد');
        }
        return $next($request);
    }
}
