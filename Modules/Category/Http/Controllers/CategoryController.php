<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\Category\Http\Requests\CategoryRequest;
use Modules\Category\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('category::category.index', [
            'categories' => Category::query()->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('category::category.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CategoryRequest $request
     * @return Renderable
     */
    public function store(CategoryRequest $request)
    {
        Category::query()->create($request->only(['title', 'slug', 'link', 'status']));
        return to_route('categories.index');
    }

    /**
     * Show the specified resource.
     * @param Category $category
     * @return Renderable
     */
    public function show(Category $category)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Category $category
     * @return Renderable
     */
    public function edit(Category $category)
    {
        return view('category::category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param CategoryRequest $request
     * @param Category $category
     * @return Renderable
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->only(['title', 'slug', 'link', 'status']));
        return to_route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param Category $category
     * @return Renderable
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }


    public function changeStatus($id)
    {
        $category = Category::query()->findOrFail($id);
        if($category->status == 'inactive')
            $category->update(['status' => 'active']);
        else
            $category->update(['status' => 'inactive']);

        return back();
    }

    public function trash()
    {
        return view('category::category.trash',[
            'categories' => Category::onlyTrashed()->get()
        ]);
    }

    public function restoreAll()
    {
        Category::onlyTrashed()->restore();

        return back();
    }

    public function restore($id)
    {
        Category::onlyTrashed()->find($id)->restore();
        return back();
    }

    public function forceDelete($id)
    {
        Category::onlyTrashed()->find($id)->forceDelete();
        return back();
    }
}
