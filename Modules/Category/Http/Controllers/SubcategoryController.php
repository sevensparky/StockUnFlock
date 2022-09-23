<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\Category\Http\Requests\SubcategoryRequest;
use Modules\Category\Models\Category;
use Modules\Category\Models\Subcategory;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('category::subcategory.index', [
            'subcategories' => Subcategory::query()->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('category::subcategory.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param SubcategoryRequest $request
     * @return Renderable
     */
    public function store(SubcategoryRequest $request)
    {
        Subcategory::query()->create($request->only(['title', 'category_id', 'slug', 'link', 'status']));
        return to_route('subcategories.index');
    }

    /**
     * Show the specified resource.
     * @param Subcategory $subcategory
     * @return Renderable
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Subcategory $subcategory
     * @return Renderable
     */
    public function edit(Subcategory $subcategory)
    {
        return view('category::subcategory.edit', [
            'subcategory' => $subcategory,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param SubcategoryRequest $request
     * @param Subcategory $subcategory
     * @return Renderable
     */
    public function update(SubcategoryRequest $request, Subcategory $subcategory)
    {
        $subcategory->update($request->only(['category_id' ,'title', 'slug', 'link', 'status']));
        return to_route('subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param Subcategory $subcategory
     * @return Renderable
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return back();
    }

    public function changeStatus($id)
    {
        $category = Subcategory::query()->findOrFail($id);
        if($category->status == 'inactive')
            $category->update(['status' => 'active']);
        else
            $category->update(['status' => 'inactive']);

        return back();
    }

    public function trash()
    {
        return view('category::subcategory.trash',[
            'subcategories' => Subcategory::onlyTrashed()->get()
        ]);
    }

    public function restoreAll()
    {
        Subcategory::onlyTrashed()->restore();

        return back();
    }

    public function restore($id)
    {
        Subcategory::onlyTrashed()->find($id)->restore();
        return back();
    }

    public function forceDelete($id)
    {
        Subcategory::onlyTrashed()->find($id)->forceDelete();
        return back();
    }
}
