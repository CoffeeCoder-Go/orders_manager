<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ItemService;
use App\Models\Item;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Gate;

class ItemController extends Controller
{
    protected $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    //
    public function insert(Request $request,Order $order){
        

        try {
            $validated = $request->validate([
                'quantity' => 'required|integer',
                'product'=>'required|integer'
            ]);

            $product = Product::findOrFail($validated['product']);

            $this->itemService->insert($order, $product, $validated);

            return redirect()->route('orders.show',$order->id)->with('success','Inserido com sucesso!');
        } catch (\Exception $th) {
            //throw $th;
            return view('errors.error',["error"=>$th->getMessage()]);
        }
    }

    public function delete(Item $item){
        try{
            Gate::authorize("delete",$item);

            $order = $this->itemService->delete($item);

            return redirect()->route('orders.show',$order)->with("success","Delete succesfully!");
        }catch(\Exception $th){
            return view('errors.error',["error"=>$th->getMessage()]);
        }
    }
}
