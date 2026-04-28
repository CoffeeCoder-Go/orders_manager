<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name("home");


Route::prefix("orders")->name("orders.")->group(function(){
    Route::get("/",[OrderController::class,"index"])->name("index");

    Route::post("/",[OrderController::class,"store"])->name("create");

    Route::get("/{order}",[OrderController::class,"show"])->name("show");

    Route::put("/{order}",[OrderController::class,"update"])->name("update");

    Route::delete("/{order}",[OrderController::class,"destroy"])->name("delete");
});

Route::prefix("products")->name("products.")->group(function(){
    Route::get("/",[ProductController::class,'index'])->name("index");
    
    Route::get("/search",[ProductController::class,"search"])->name("search");

    Route::post("/",[ProductController::class,"store"])->name("create");
    
    Route::get("/{product}",[ProductController::class,"show"])->name("show");
    
    Route::put("/{product}",[ProductController::class,"update"])->name("update");

    Route::delete("/{product}",[ProductController::class,"destroy"])->name("delete");
});

Route::prefix("items")->name("items.")->group(function (){
    Route::post("/{order}",[OrderController::class,"insertItem"])->name("insert");
});
