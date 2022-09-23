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
        return view('category::index', [
            'categories' => Category::query()->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('category::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CategoryRequest $request
     * @return Renderable
     */
    public function store(CategoryRequest $request)
    {
        Category::query()->create(array_merge($request->validated(), ['created_by' => auth()->id()]));
        return to_route('categories.index')->with('success', '');
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
        return view('category::edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param CategoryRequest $request
     * @param Category $category
     * @return Renderable
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update(array_merge($request->validated(), ['updated_by' => auth()->id()]));
        return to_route('categories.index')->with('success', '');
    }

    /**
     * Remove the specified resource from storage.
     * @param Category $category
     * @return Renderable
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('trash', '');
    }

    /**
     * change of category status
     * @param $id
     * @return Renderable
     */
    public function changeStatus($id)
    {
        $category = Category::query()->findOrFail($id);
        if($category->status == 'inactive')
            $category->update(['status' => 'active', 'updated_by' => auth()->id()]);
        else
            $category->update(['status' => 'inactive', 'updated_by' => auth()->id()]);

        return back()->with('change-status', '');
    }

    /**
     * Display a listing of the trash categories.
     * @return Renderable
     */
    public function trash()
    {
        return view('category::trash',[
            'categories' => Category::onlyTrashed()->get()
        ]);
    }

    /**
     * restore all categories that have been trashed
     * @return Renderable
     */
    public function restoreAll()
    {
        Category::onlyTrashed()->restore();
        return back()->with('restore-all', '');
    }

     /**
     * restore a category that has been trashed
     * @param $id
     * @return Renderable
     */
    public function restore($id)
    {
        Category::onlyTrashed()->find($id)->restore();
        return back()->with('restore', '');
    }

    /**
     * force delete a category
     * @param $id
     * @return Renderable
     */
    public function forceDelete($id)
    {
        Category::onlyTrashed()->find($id)->forceDelete();
        return back();
    }
}
