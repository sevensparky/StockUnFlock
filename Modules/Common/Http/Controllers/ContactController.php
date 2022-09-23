<?php

namespace Modules\Common\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Common\Http\Requests\ContactRequest;
use Modules\Common\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('common::contact.index',[
            'contact' => Contact::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('common::contact.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param ContactRequest $request
     * @return Renderable
     */
    public function store(ContactRequest $request)
    {
        Contact::query()->create($request->validated());
        return  to_route('contact.index');
    }

    /**
     * Show the specified resource.
     * @return Renderable
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @return Renderable
     */
    public function edit()
    {
        $contact = Contact::query()->first();
        return view('common::contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     * @param ContactRequest $request
     * @return Renderable
     */
    public function update(ContactRequest $request)
    {
        Contact::query()->first()->update($request->validated());
        return to_route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
