<?php

namespace Modules\Common\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Common\Http\Requests\FaqRequest;
use Modules\Common\Models\Faq;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('common::faq.index',[
            'faq' => Faq::query()->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('common::faq.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param FaqRequest $request
     * @return Renderable
     */
    public function store(FaqRequest $request)
    {
        Faq::query()->create($request->validated());
        return to_route('faq.index');
    }

    /**
     * Show the specified resource.
     * @param Faq $faq
     * @return Renderable
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Faq $faq
     * @return Renderable
     */
    public function edit(Faq $faq)
    {
        return view('common::faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     * @param FaqRequest $request
     * @param Faq $faq
     * @return Renderable
     */
    public function update(FaqRequest $request, Faq $faq)
    {
        $faq->update($request->validated());
        return to_route('faq.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param Faq $faq
     * @return Renderable
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return back();
    }

    public function changeStatus($id)
    {
        $faq = Faq::query()->findOrFail($id);
        if($faq->status == 'inactive')
            $faq->update(['status' => 'active']);
        else
            $faq->update(['status' => 'inactive']);

        return back();
    }

    public function trash()
    {
        return view('common::faq.trash',[
            'faq' => Faq::onlyTrashed()->get()
        ]);
    }

    public function restoreAll()
    {
        Faq::onlyTrashed()->restore();

        return back();
    }

    public function restore($id)
    {
        Faq::onlyTrashed()->find($id)->restore();
        return back();
    }

    public function forceDelete($id)
    {
        Faq::onlyTrashed()->find($id)->forceDelete();
        return back();
    }
}
