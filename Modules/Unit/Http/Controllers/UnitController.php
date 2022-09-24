<?php

namespace Modules\Unit\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\Unit\Http\Requests\UnitRequest;
use Modules\Unit\Models\Unit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('unit::index', [
            'units' => Unit::query()->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('unit::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param UnitRequest $request
     * @return Renderable
     */
    public function store(UnitRequest $request)
    {
        Unit::query()->create(array_merge($request->validated(), ['created_by' => auth()->id()]));
        return to_route('units.index')->with('success', '');
    }

    /**
     * Show the specified resource.
     * @param Unit $unit
     * @return Renderable
     */
    public function show(Unit $unit)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Unit $unit
     * @return Renderable
     */
    public function edit(Unit $unit)
    {
        return view('unit::edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     * @param UnitRequest $request
     * @param Unit $unit
     * @return Renderable
     */
    public function update(UnitRequest $request, Unit $unit)
    {
        $unit->update(array_merge($request->validated(), ['updated_by' => auth()->id()]));
        return to_route('units.index')->with('success', '');
    }

    /**
     * Remove the specified resource from storage.
     * @param Unit $unit
     * @return Renderable
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return back()->with('trash', '');
    }

    /**
     * change of unit status
     * @param $id
     * @return Renderable
     */
    public function changeStatus($id)
    {
        $unit = Unit::query()->findOrFail($id);
        if($unit->status == 'inactive')
            $unit->update(['status' => 'active', 'updated_by' => auth()->id()]);
        else
            $unit->update(['status' => 'inactive', 'updated_by' => auth()->id()]);

        return back()->with('change-status', '');
    }

    /**
     * Display a listing of the trash units.
     * @return Renderable
     */
    public function trash()
    {
        return view('unit::trash',[
            'units' => Unit::onlyTrashed()->get()
        ]);
    }

    /**
     * restore all units that have been trashed
     * @return Renderable
     */
    public function restoreAll()
    {
        Unit::onlyTrashed()->restore();
        return back()->with('restore-all', '');
    }

     /**
     * restore a unit that has been trashed
     * @param $id
     * @return Renderable
     */
    public function restore($id)
    {
        Unit::onlyTrashed()->find($id)->restore();
        return back()->with('restore', '');
    }

    /**
     * force delete a unit
     * @param $id
     * @return Renderable
     */
    public function forceDelete($id)
    {
        Unit::onlyTrashed()->find($id)->forceDelete();
        return back();
    }
}
