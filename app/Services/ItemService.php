<?php
namespace App\Services;

use App\Events\OrderValue;
use App\Events\ProductQuantity;
use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

class ItemService{



    public function insert(Order $order,Product $product, array $data){
        if( !isset($data["quantity"])){
            throw new \Exception("Deve ter uma quantidade");
        }

        if($data["quantity"] > $product->quantity){
            throw new \Exception("A quantidade informada deve ser menor do que a qauntidade em estoque!");
        }


        $item = new Item([
            "product_id" => $product->id,
            "user_id"=>$order->user_id,
            "quantity" => $data["quantity"],
            "value"=>$product->price * $data["quantity"],
        ]);

        DB::transaction(function() use ($item, $order,$product){
            $order->items()->save($item);
            $product->update(["quantity"=>$product->quantity - $item->quantity]);
            $order->update(["value"=>$order->value + $item->value]);
        });

        

    }

    public function delete(Item $item): int{
        $order = $item->order;
        $product = $item->product;

        DB::transaction(function () use($item,$order,$product){

            $order->decrement("value",$item->value);
            $product->increment("quantity",$item->quantity);
            $item->delete();
        });

        return $order->id;
    } 

    public function deleteAllFrom(Order $order){
        

        foreach($order->items as $item){
            $item->product->increment('quantity',$item->quantity);

        }

        $order->items()->delete();

        return true;
    }
}