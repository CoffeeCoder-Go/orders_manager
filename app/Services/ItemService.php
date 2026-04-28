<?php
namespace App\Services;

use App\Events\OrderValue;
use App\Events\ProductQuantity;
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


        $item = new Item([
            "product_id" => $product->id,
            "quantity" => $data["quantity"],
            "value"=>$product->price * $data["quantity"],
        ]);

        $order->items()->save($item);

        event(new ProductQuantity($product,$item));
        event(new OrderValue($order,$item));

    }
}