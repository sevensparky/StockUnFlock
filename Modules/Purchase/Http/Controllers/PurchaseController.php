<?php

namespace Modules\Purchase\Http\Controllers;

use Modules\Purchase\Models\Purchase;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Modules\Category\Models\Category;
use Modules\Product\Models\Product;
use Modules\Purchase\Http\Requests\PurchaseRequest;
use Modules\Supplier\Models\Supplier;

class PurchaseController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verifyProducts'])->only('create', 'edit');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('purchase::index', ['purchases' => Purchase::query()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('purchase::create', [
            'suppliers' => Supplier::all(),
            // 'categories' => Category::all(),
            // 'products' => Product::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param PurchaseRequest $request
     * @return Renderable
     */
    public function store(PurchaseRequest $request)
    {
        if ($request->category_id == null) {
            return back()->with('somethingWasWrong', '');
        } else {

            $categoryCount = count($request->category_id);
            for ($i=0; $i < $categoryCount; $i++) {

                // Purchase::create(array_merge());

                $purchase = new Purchase();
                $purchase->date = date('Y-m-d', strtotime($request->date([$i])));
                $purchase->purchase_no = $request->purchase_no[$i];
                $purchase->supplier_id = $request->supplier_id[$i];
                $purchase->category_id = $request->category_id[$i];
                $purchase->product_id = $request->product_id[$i];
                $purchase->buying_quantity = $request->buying_quantity[$i];
                $purchase->unit_price = $request->unit_price[$i];
                $purchase->buying_price = $request->buying_price[$i];
                $purchase->description = $request->description[$i];
                $purchase->created_by = auth()->id();
                $purchase->save();
            }
        }

        return to_route('purchases.index')->with('success', '');
    }

    /**
     * Show the specified resource.
     * @param Purchase $purchase
     * @return Renderable
     */
    public function show(Purchase $purchase)
    {
        return view('purchase::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Purchase $purchase
     * @return Renderable
     */
    public function edit(Purchase $purchase)
    {
        return view('purchase::edit', ['purchase' => $purchase]);
    }

    /**
     * Update the specified resource in storage.
     * @param PurchaseRequest $request
     * @param Purchase $purchase
     * @return Renderable
     */
    public function update(PurchaseRequest $request, Purchase $purchase)
    {
        if ($request->hasFile('image')) {
            if (File::exists(storage_path('app/public/'.$purchase->image))) {
                File::delete(storage_path('app/public/'.$purchase->image));
            }

            $file = $request->file('image');
            $fileName = date('Ymdims'). '.' . $file->getClientOriginalExtension();
            $file->move(storage_path('app/public/'), $fileName);
            $purchase->update(array_merge($request->validated(), [
                'updated_by' => auth()->id(),
                'image' => $fileName
            ]));
        }
        else {
            $purchase->update(array_merge($request->validated(), [
                'updated_by' => auth()->id(),
                'image' => $purchase->image
            ]));
        }
        return to_route('purchases.index')->with('success', '');
    }

    /**
     * Remove the specified resource from storage.
     * @param Purchase $purchase
     * @return Renderable
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return back()->with('trash', '');
    }

    /**
     * change of purchase status
     * @param $id
     * @return Renderable
     */
    public function changeStatus($id)
    {
        $purchase = Purchase::query()->findOrFail($id);
        
        if($purchase->status == 'pending'){

            $product = Product::where('id', $purchase->product_id)->first();

            $purchase_quantity = $purchase->buying_quantity + $product->quantity;

            $product->update([
                'quantity' => $purchase_quantity
            ]);

            $purchase->update([
                'status' => 'approved',
                'updated_by' => auth()->id(),
            ]);
        }

        return back()->with('change-status', '');
    }

    /**
     * Display a listing of the trash purchases.
     * @return Renderable
     */
    public function trash()
    {
        return view('purchase::trash',[
            'purchases' => Purchase::onlyTrashed()->get()
        ]);
    }

    /**
     * restore all purchases that have been trashed
     * @return Renderable
     */
    public function restoreAll()
    {
        Purchase::onlyTrashed()->restore();
        return back()->with('restore-all', '');
    }

     /**
     * restore a purchase that has been trashed
     * @param $id
     * @return Renderable
     */
    public function restore($id)
    {
        Purchase::onlyTrashed()->find($id)->restore();
        return back()->with('restore', '');
    }

    /**
     * force delete a purchase
     * @param $id
     * @return Renderable
     */
    public function forceDelete($id)
    {
        $purchase = Purchase::onlyTrashed()->find($id);

        if (File::exists(storage_path('app/public/'.$purchase->image))) {
            File::delete(storage_path('app/public/'.$purchase->image));
        }
        $purchase->forceDelete();
        return back();
    }

    public function getSpecificCategory(Request $request)
    {
        $supplier_id = $request->supplier_id;
        $product = Product::with(['category'])
                ->select('category_id')
                ->where('supplier_id', $supplier_id)
                ->groupBy('category_id')
                ->get();

        return response()->json($product);
    }

    public function getSpecificProduct(Request $request)
    {
        $category_id = $request->category_id;
        $product = Product::where('category_id', $category_id)->get();
        return response()->json($product);
    }
}
