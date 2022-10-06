<?php

namespace Modules\Warehouse\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\Warehouse\Http\Requests\WarehouseRequest;
use Modules\Warehouse\Models\Warehouse;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('warehouse::index', [
            'warehouses' => Warehouse::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('warehouse::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param WarehouseRequest $request
     * @return Renderable
     */
    public function store(WarehouseRequest $request)
    {
        Warehouse::create($request->validated());
        return to_route('warehouses.index')->with('success', '');
    }

    /**
     * Show the specified resource.
     * @param Warehouse $warehouse
     * @return Renderable
     */
    public function show()
    {
        return view('warehouse::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Warehouse $warehouse
     * @return Renderable
     */
    public function edit(Warehouse $warehouse)
    {
        return view('warehouse::edit', [
            'warehouse' => $warehouse
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param WarehouseRequest $request
     * @param Warehouse $warehouse
     * @return Renderable
     */
    public function update(WarehouseRequest $request, Warehouse $warehouse)
    {
        $warehouse->update($request->validated());
        return to_route('warehouses.index')->with('success', '');
    }

    /**
     * Remove the specified resource from storage.
     * @param Warehouse $warehouse
     * @return Renderable
     */
    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();
        return back()->with('trash', '');
    }

    /**
     * change of warehouse status
     * @param $id
     * @return Renderable
     */
    public function changeStatus($id)
    {
        $warehouse = Warehouse::query()->findOrFail($id);
        if($warehouse->status == 'inactive')
            $warehouse->update(['status' => 'active']);
        else
            $warehouse->update(['status' => 'inactive']);

        return back()->with('change-status', '');
    }

    /**
     * Display a listing of the trash warehouses.
     * @return Renderable
     */
    public function trash()
    {
        return view('warehouse::trash',[
            'warehouses' => Warehouse::onlyTrashed()->get()
        ]);
    }

    /**
     * restore all warehouses that have been trashed
     * @return Renderable
     */
    public function restoreAll()
    {
        Warehouse::onlyTrashed()->restore();
        return back()->with('restore-all', '');
    }

     /**
     * restore a warehouse that has been trashed
     * @param $id
     * @return Renderable
     */
    public function restore($id)
    {
        Warehouse::onlyTrashed()->find($id)->restore();
        return back()->with('restore', '');
    }

    /**
     * force delete a warehouse
     * @param $id
     * @return Renderable
     */
    public function forceDelete($id)
    {
        Warehouse::onlyTrashed()->find($id)->forceDelete();
        return back();
    }
}
