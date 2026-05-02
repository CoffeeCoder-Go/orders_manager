<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name("home");

Route::prefix("users")->name("users.")->group(function (){
    Route::get("/login", fn () => view('users.login'))->name("login");
    Route::get("/signup", fn () => view('users.signup'))->name("signup");
})->middleware("guest");

Route::prefix("auth")->name("auth.")->group(function (){
    Route::post("/login",[UserController::class,'login'])->name('login');
    Route::post("/signup",[UserController::class,'signup'])->name('signup');
    Route::delete("/logout",[UserController::class,"logout"])->name('logout');
})->middleware("guest");

Route::prefix("orders")->name("orders.")->group(function(){
    Route::get("/",[OrderController::class,"index"])->name("index");

    Route::post("/",[OrderController::class,"store"])->name("create");

    Route::get("/{order}",[OrderController::class,"show"])->name("show");

    Route::put("/{order}",[OrderController::class,"update"])->name("update");

    Route::delete("/{order}",[OrderController::class,"destroy"])->name("delete");
})->middleware("auth");

Route::prefix("products")->name("products.")->group(function(){
    Route::get("/",[ProductController::class,'index'])->name("index");
    
    Route::get("/search",[ProductController::class,"search"])->name("search");

    Route::post("/",[ProductController::class,"store"])->name("create");
    
    Route::get("/{product}",[ProductController::class,"show"])->name("show");
    
    Route::put("/{product}",[ProductController::class,"update"])->name("update");

    Route::delete("/{product}",[ProductController::class,"destroy"])->name("delete");
})->middleware("auth");

Route::prefix("items")->name("items.")->group(function (){
    Route::post("/{order}",[ItemController::class,"insert"])->name("insert");
    Route::delete("/{item}",[ItemController::class,"delete"])->name("delete");
})->middleware("auth");
