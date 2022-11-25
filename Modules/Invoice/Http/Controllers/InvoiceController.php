<?php

namespace Modules\Invoice\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Category\Models\Category;
use Modules\Customer\Models\Customer;
use Modules\Invoice\Http\Requests\InvoiceRequest;
use Modules\Invoice\Models\Invoice;
use Modules\Invoice\Models\InvoiceDetail;
use Modules\Invoice\Models\Payment;
use Modules\Invoice\Models\PaymentDetail;
use Modules\Product\Models\Product;
use Modules\Supplier\Models\Supplier;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('invoice::index', ['invoices' => Invoice::all()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('invoice::create', [
            'categories' => Category::all(),
            'products' => Product::all(),
            'customers' => Customer::all(),
            'suppliers' => Supplier::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        dd($request->all());
        Invoice::create(array_merge($request->validated(), [
            'created_by' => auth()->id()
        ]));

        DB::transaction(function () use ($request) {
            $count_category = count($request->category_id);
            for ($i = 0; $i < $count_category; $i++) {

                $invoice_details = new InvoiceDetail();
                $invoice_details->category_id = $request->category_id[$i];
                $invoice_details->product_id = $request->product_id[$i];
                $invoice_details->unit = $request->unit[$i];
                $invoice_details->unit_price = $request->unit_price[$i];
                $invoice_details->last_price = $request->last_price[$i];
                $invoice_details->save();
            }
        });

        return to_route('invoices.index')->with('success', '');
    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('invoice::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('invoice::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
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

    public function getQuantityOfProduct(Request $request)
    {
        $category_id = $request->category_id;
        $product = Product::where('category_id', $category_id)->get();

        return response()->json($product);
    }

    public function getProductStock(Request $request)
    {
        $productId = $request->product_id;
        $stock = Product::where('id', $productId)->first()->quantity;
        return response()->json($stock);
    }

    public function invoicePrint(Invoice $invoice)
    {
        return view('invoice::invoice-pdf', compact('invoice'));
    }
}
