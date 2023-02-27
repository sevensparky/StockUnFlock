<?php

namespace Modules\Customer\Http\Controllers;

use Modules\Customer\Models\Customer;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Modules\Customer\Http\Requests\CustomerRequest;

class CustomerController extends Controller
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
        return view('customer::index', ['customers' => Customer::query()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('customer::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param CustomerRequest $request
     * @return Renderable
     */
    public function store(CustomerRequest $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = date('Ymdims'). '.' . $file->getClientOriginalExtension();
            $file->move(storage_path('app/public/'), $fileName);
            Customer::create(array_merge($request->validated(), [
                'created_by' => auth()->id(),
                'image' => $fileName
            ]));
        }
        return to_route('customers.index')->with('success', '');
    }

    /**
     * Show the specified resource.
     * @param Customer $customer
     * @return Renderable
     */
    public function show(Customer $customer)
    {
        return view('customer::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Customer $customer
     * @return Renderable
     */
    public function edit(Customer $customer)
    {
        return view('customer::edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     * @param CustomerRequest $request
     * @param Customer $customer
     * @return Renderable
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        if ($request->hasFile('image')) {
            if (File::exists(storage_path('app/public/'.$customer->image))) {
                File::delete(storage_path('app/public/'.$customer->image));
            }

            $file = $request->file('image');
            $fileName = date('Ymdims'). '.' . $file->getClientOriginalExtension();
            $file->move(storage_path('app/public/'), $fileName);
            $customer->update(array_merge($request->validated(), [
                'updated_by' => auth()->id(),
                'image' => $fileName
            ]));
        }
        else {
            $customer->update(array_merge($request->validated(), [
                'updated_by' => auth()->id(),
                'image' => $customer->image
            ]));
        }
        return to_route('customers.index')->with('success', '');
    }

    /**
     * Remove the specified resource from storage.
     * @param Customer $customer
     * @return Renderable
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return back()->with('trash', '');
    }

    /**
     * change of customer status
     * @param $id
     * @return Renderable
     */
    public function changeStatus($id)
    {
        $customer = Customer::query()->findOrFail($id);
        if($customer->status == 'inactive')
            $customer->update(['status' => 'active', 'updated_by' => auth()->id()]);
        else
            $customer->update(['status' => 'inactive', 'updated_by' => auth()->id()]);

        return back()->with('change-status', '');
    }

    /**
     * Display a listing of the trash customers.
     * @return Renderable
     */
    public function trash()
    {
        return view('customer::trash',[
            'customers' => Customer::onlyTrashed()->get()
        ]);
    }

    /**
     * restore all customers that have been trashed
     * @return Renderable
     */
    public function restoreAll()
    {
        Customer::onlyTrashed()->restore();
        return back()->with('restore-all', '');
    }

     /**
     * restore a customer that has been trashed
     * @param $id
     * @return Renderable
     */
    public function restore($id)
    {
        Customer::onlyTrashed()->find($id)->restore();
        return back()->with('restore', '');
    }

    /**
     * force delete a customer
     * @param $id
     * @return Renderable
     */
    public function forceDelete($id)
    {
        $customer = Customer::onlyTrashed()->find($id);

        if (File::exists(storage_path('app/public/'.$customer->image))) {
            File::delete(storage_path('app/public/'.$customer->image));
        }
        $customer->forceDelete();
        return back();
    }
}
