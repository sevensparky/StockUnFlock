<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\Category\Models\Category;
use Modules\Product\Http\Requests\ProductRequest;
use Modules\Product\Models\Product;
use Modules\Supplier\Models\Supplier;
use Modules\Unit\Models\Unit;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verifyCategories', 'verifyUnits', 'verifySuppliers'])->only(['create', 'edit']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('product::index', [
            'products' => Product::query()->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('product::create', [
            'suppliers' => Supplier::all(),
            'categories' => Category::all(),
            'units' => Unit::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param ProductRequest $request
     * @return Renderable
     */
    public function store(ProductRequest $request)
    {
        Product::query()->create(array_merge($request->validated(), ['created_by' => auth()->id()]));
        return to_route('products.index')->with('success', '');
    }

    /**
     * Show the specified resource.
     * @param Product $product
     * @return Renderable
     */
    public function show(Product $product)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Product $product
     * @return Renderable
     */
    public function edit(Product $product)
    {
        return view('product::edit', [
            'product' => $product,
            'suppliers' => Supplier::all(),
            'categories' => Category::all(),
            'units' => Unit::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param ProductRequest $request
     * @param Product $product
     * @return Renderable
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update(array_merge($request->validated(), ['updated_by' => auth()->id()]));
        return to_route('products.index')->with('success', '');
    }

    /**
     * Remove the specified resource from storage.
     * @param Product $product
     * @return Renderable
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('trash', '');
    }

    /**
     * change of product status
     * @param Product $product
     * @return Renderable
     */
    public function changeStatus(Product $product)
    {
        if($product->status == 'inactive')
            $product->update(['status' => 'active', 'updated_by' => auth()->id()]);
        else
            $product->update(['status' => 'inactive', 'updated_by' => auth()->id()]);

        return back()->with('change-status', '');
    }

    /**
     * Display a listing of the trash products.
     * @return Renderable
     */
    public function trash()
    {
        return view('product::trash',[
            'products' => Product::onlyTrashed()->get()
        ]);
    }

    /**
     * restore all products that have been trashed
     * @return Renderable
     */
    public function restoreAll()
    {
        Product::onlyTrashed()->restore();
        return back()->with('restore-all', '');
    }

     /**
     * restore a product that has been trashed
     * @param $id
     * @return Renderable
     */
    public function restore($id)
    {
        Product::onlyTrashed()->find($id)->restore();
        return back()->with('restore', '');
    }

    /**
     * force delete a product
     * @param $id
     * @return Renderable
     */
    public function forceDelete($id)
    {
        Product::onlyTrashed()->find($id)->forceDelete();
        return back();
    }
}
