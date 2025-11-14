<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/index",[ProductController::class, "index"]);
Route::get("/create",[ProductController::class, "create"]);
Route::post("/store",[ProductController::class, "store"]);
Route::get("/show/{id}",[ProductController::class, "show"]);
Route::get("/edit/{id}",[ProductController::class, "edit"]);
Route::put("/update/{id}",[ProductController::class, "update"]);
Route::delete("/delete/{id}",[ProductController::class, "destroy"]);
