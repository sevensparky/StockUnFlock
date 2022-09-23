<?php

namespace Modules\Supplier\Http\Controllers;

use Modules\Supplier\Models\Supplier;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\Supplier\Http\Requests\SupplierRequest;

class SupplierController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('supplier::index', ['suppliers' => Supplier::query()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('supplier::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param SupplierRequest $request
     * @return Renderable
     */
    public function store(SupplierRequest $request)
    {
        Supplier::create(array_merge($request->validated(), ['created_by' => auth()->id()]));
        return to_route('suppliers.index')->with('success', '');
    }

    /**
     * Show the specified resource.
     * @param Supplier $supplier
     * @return Renderable
     */
    public function show(Supplier $supplier)
    {
        return view('supplier::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Supplier $supplier
     * @return Renderable
     */
    public function edit(Supplier $supplier)
    {
        return view('supplier::edit', ['supplier' => $supplier]);
    }

    /**
     * Update the specified resource in storage.
     * @param SupplierRequest $request
     * @param Supplier $supplier
     * @return Renderable
     */
    public function update(SupplierRequest $request, Supplier $supplier)
    {
        $supplier->update(array_merge($request->validated(), ['updated_by' => auth()->id()]));
        return to_route('suppliers.index')->with('success', '');
    }

    /**
     * Remove the specified resource from storage.
     * @param Supplier $supplier
     * @return Renderable
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return back()->with('trash', '');
    }

    /**
     * change of supplier status
     * @param $id
     * @return Renderable
     */
    public function changeStatus($id)
    {
        $supplier = Supplier::query()->findOrFail($id);
        if($supplier->status == 'inactive')
            $supplier->update(['status' => 'active', 'updated_by' => auth()->id()]);
        else
            $supplier->update(['status' => 'inactive', 'updated_by' => auth()->id()]);

        return back()->with('change-status', '');
    }

    /**
     * Display a listing of the trash suppliers.
     * @return Renderable
     */
    public function trash()
    {
        return view('supplier::trash',[
            'suppliers' => Supplier::onlyTrashed()->get()
        ]);
    }

    /**
     * restore all suppliers that have been trashed
     * @return Renderable
     */
    public function restoreAll()
    {
        Supplier::onlyTrashed()->restore();
        return back()->with('restore-all', '');
    }

     /**
     * restore a supplier that has been trashed
     * @param $id
     * @return Renderable
     */
    public function restore($id)
    {
        Supplier::onlyTrashed()->find($id)->restore();
        return back()->with('restore', '');
    }

    /**
     * force delete a supplier
     * @param $id
     * @return Renderable
     */
    public function forceDelete($id)
    {
        Supplier::onlyTrashed()->find($id)->forceDelete();
        return back();
    }
}
