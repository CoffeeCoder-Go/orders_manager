<?php
namespace App\Services;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;

class ItemService{



    public function insert(Order $order,Product $product, array $data){
        if( !isset($data["quantity"])){
            throw new \Exception("Deve ter uma quantidade");
        }

        if($data["quantity"] > $product->quantity){
            throw new \Exception("A quantidade informada deve ser menor do que a qauntidade em estoque!");
        }


        $order->items()->create([
            "product_id" => $product->id,
            "quantity" => $data["quantity"],
            "value"=>$product->price * $data["quantity"],
        ]);

        $product->quantity -= $data['quantity'];
        $product->save();
    }
}