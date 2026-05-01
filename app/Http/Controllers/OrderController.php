<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Services\ItemService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class OrderController extends Controller
{
    

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $name = $request->query("name","");
  
        $orders = Order::orderBy("name","desc")->whereLike("name","$name%",caseSensitive: true)->cursorPaginate(6);

        $new_order = new Order();

        return view("order.index",["orders"=>$orders,"new_order"=>$new_order]);
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        //

        $validated = $request->validate([
            "name"=> "required|max:255",
            "andress"=>"required|max:255",
            "come_date"=>"required|date_format:d/m/Y"
        ]);

        Carbon::createFromFormat('d/m/Y',$validated['come_date'])->format('Y-m-d');
    
        $new_order = new Order($validated);

        $new_order->save();

        return redirect()->route('orders.create')->with('success','Create succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
        $items = $order->items()->get();

        $products = Product::all();

        return view('order.show',['order'=>$order,'items'=>$items,'products'=>$products]);

    }

    

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
        $validated = $request->validate([
            "name"=>"required|max:255",
            "andress"=>"required|max:255",
            "come_date"=>"required|date_format:d/m/Y"
        ]);

        Carbon::createFromFormat('d/m/Y',$validated['come_date'])->format('Y-m-d');

        $order->update($validated);

        return redirect()->route('orders.show',$order->id)->with("success","updated succesfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
        $order->delete();
        return redirect()->route('orders.index')->with("success","deleted succesfully");
    }
}
