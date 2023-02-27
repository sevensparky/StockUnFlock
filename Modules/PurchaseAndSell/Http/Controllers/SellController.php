<?php

namespace Modules\PurchaseAndSell\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Product\Models\Product;
use Modules\PurchaseAndSell\Models\Sell;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('purchaseandsell::sell.index', [
            'sells' => Sell::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('purchaseandsell::sell.create', [
            'products' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        $calculate = $product->quantity -  $request->quantity;

        if ($request->quantity > $product->quantity){
            return back()->with('outOfRange', '');
        }else{

            if ($product->quantity < 1) {
                return back()->with('emptyStock', '');
            }else {
                $sell = Sell::create(array_merge($request->only('product_id'), [
                    'title' => $product->title,
                    'quantity' => $request->quantity
                ]));
                $product->sells()->attach($sell);
                $product->update(['quantity' => $calculate]);

                if ($product->quantity == 0) {
                    $product->delete();
                }
            }
        }

        return to_route('sell.index')->with('success', '');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Sell $sell
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sell $sell)
    {
        $sell->delete();
        return back()->with('success', '');
    }
}
