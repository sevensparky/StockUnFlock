<?php

namespace Modules\Invoice\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Category\Models\Category;
use Modules\Customer\Models\Customer;
use Modules\Invoice\Models\Invoice;
use Modules\Invoice\Models\InvoiceDetail;
use Modules\Invoice\Models\Payment;
use Modules\Invoice\Models\PaymentDetail;
use Modules\Product\Models\Product;

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
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $invoice = new Invoice();
        $invoice->invoice_no = $request->invoice_no[0];
        $invoice->date = date('Y-m-d', strtotime($request->date[0]));
        $invoice->description = $request->description;
        $invoice->status = '0';
        $invoice->created_by = auth()->id();
        // dd($invoice->getAttributes());

        DB::transaction(function () use ($request, $invoice) {
            if ($invoice->save()) {
                $count_category = count($request->category_id);
                for ($i = 0; $i < $count_category; $i++) {

                    $invoice_details = new InvoiceDetail();
                    $invoice_details->date = date('Y-m-d', strtotime($request->date[0]));
                    $invoice_details->invoice_id = $invoice->id;
                    $invoice_details->category_id = $request->category_id[$i];
                    // $invoice_details->product_id = $request->product_id[$i];
                    $invoice_details->product_id = '2';
                    // $invoice_details->selling_quantity = $request->selling_quantity[$i];
                    $invoice_details->selling_quantity = '2';
                    // $invoice_details->unit_price = $request->unit_price[$i];
                    $invoice_details->unit_price = '2';
                    // $invoice_details->selling_price = $request->selling_price[$i];
                    $invoice_details->selling_price = '2';
                    $invoice_details->status = '0';
                    $invoice_details->save();
                }

                if ($request->customer_id == '0') {
                    $customer = new Customer();
                    $customer->name = $request->name;
                    $customer->mobile_no = $request->mobile_no;
                    $customer->email = $request->email;
                    $customer->save();
                    $customer_id = $customer->id;
                } else {
                    $customer_id = $request->customer_id;
                }

                $payment = new Payment();
                $payment_details = new PaymentDetail();

                $payment->invoice_id = $invoice->id;
                $payment->customer_id = $customer_id;
                $payment->paid_status = $request->paid_status;
                $payment->discount_amount = $request->discount_amount;
                $payment->total_amount = $request->estimated_amount;

                if ($request->paid_status == 'full_paid') {
                    $payment->paid_amount = $request->estimated_amount;
                    $payment->due_amount = '0';
                    $payment_details->current_paid_amount = $request->estimated_amount;
                } elseif ($request->paid_status == 'full_due') {
                    $payment->paid_amount = '0';
                    $payment->due_amount = $request->estimated_amount;
                    $payment_details->current_paid_amount = '0';
                } elseif ($request->paid_status == 'partial_paid') {
                    $payment->paid_amount = $request->paid_amount;
                    $payment->due_amount = $request->estimated_amount - $request->paid_amount;
                    $payment_details->current_paid_amount = $request->paid_amount;
                }
                $payment->save();

                $payment_details->invoice_id = $invoice->id;
                $payment_details->date = date('Y-m-d', strtotime($request->date[0]));
                $payment_details->save();
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
}
