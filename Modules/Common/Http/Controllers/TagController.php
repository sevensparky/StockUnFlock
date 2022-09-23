<?php

namespace Modules\Common\Http\Controllers;

use Modules\Common\Http\Requests\TagRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\Common\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('common::tags.index',[
            'tags' => Tag::query()->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('common::tags.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param TagRequest $request
     * @return Renderable
     */
    public function store(TagRequest $request)
    {
        Tag::query()->create($request->only(['title', 'slug', 'status']));
        return to_route('tags.index');
    }

    /**
     * Show the specified resource.
     * @param Tag $tag
     * @return Renderable
     */
    public function show($tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Tag $tag
     * @return Renderable
     */
    public function edit(Tag $tag)
    {
        return view('common::tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     * @param TagRequest $request
     * @param Tag $tag
     * @return Renderable
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->only(['title', 'slug', 'status']));
        return to_route('tags.index')->with('success', 'toast');
//        return redirect()->route('tags.index')->with('kali','ds');
    }

    /**
     * Remove the specified resource from storage.
     * @param Tag $tag
     * @return Renderable
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return back();
    }

    public function changeStatus($id)
    {
        $tag = Tag::query()->findOrFail($id);
        if($tag->status == 'inactive')
            $tag->update(['status' => 'active']);
        else
            $tag->update(['status' => 'inactive']);

        return back();
    }

    public function trash()
    {
        return view('common::tags.trash',[
            'tags' => Tag::onlyTrashed()->get()
        ]);
    }

    public function restoreAll()
    {
        Tag::onlyTrashed()->restore();

        return back();
    }

    public function restore($id)
    {
        Tag::onlyTrashed()->find($id)->restore();
        return back();
    }

    public function forceDelete($id)
    {
        Tag::onlyTrashed()->find($id)->forceDelete();
        return back();
    }
}
