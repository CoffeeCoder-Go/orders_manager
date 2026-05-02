<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $products = $request->user()->products()->orderBy("name","asc")->cursorPaginate(6);

        $new_product = new Product();

        return view('products.index', ["products"=>$products,"new_product"=>$new_product]);
    }

    public function search(Request $request){
        $query = $request->query("q","");

        $products = $request->user()->products()->orderBy("name","asc")->whereLike("name","$query%")->get();

        $html = view("components.products-list",compact("products"))->render();

        return [
            "html"=>$html
        ];
    } 


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validated = $request->validate([
            "name"=>"required|string",
            "quantity"=>"required|integer",
            "value"=>"required|decimal:2",
            "price"=>"required|decimal:2"
        ]);



        $new_product = new Product($validated);

        $request->user()->products()->save($new_product);

        return redirect()->route('products.index')->with('success','Create succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //

        $validated = $request->validate([
            "name"=>"required|string",
            "quantity"=>"required|integer",
            "value"=>"required|decimal:2",
            "price"=>"required|decimal:2"
        ]);

        $product->update($validated);

        return redirect()->route('products.show',$product->id)->with('success','Updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();

        return redirect(status: 200)->route('products.index')->with('success','Deletado com sucesso!');
    }


}
