<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view("products.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "price" => "required|numeric",
            'description' => 'nullable|string',
            'quantity' => 'required|integer',
            "image" => "image|mimes:jpg,jpeg,png|max:2048",


        ]);
        $image = $request->file("image")->store("uploads", "public");
        Product::create([
            "name" => $request->name,
            "price" => $request->price,
            "description" => $request->description,
            "quantity" => $request->quantity,
            "image" => $image,
        ]);

        session()->flash("res", "Product Added Successfully");
        return redirect("/index");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view("products.view", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view("products.edit", compact("product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "price" => "required|numeric",
            "price" => "required|numeric",
            "image" => "file|max:1048|mimes:jpg,png,jpeg",
        ]);
        $product = Product::findOrFail($id);

        //   handle image updating

        Storage::disk("public")->delete($product->image);
        $NewImage = $request->file("image")->store("uploads", "public");
        $product->update(
            [
                "name" => $request->name,
                "price" => $request->price,
                "quantity" => $request->quantity,
                "description" => $request->description,
                "image" => $NewImage,
            ]

        );

        session()->flash("upd", "Product Updated Successfully");
        return redirect("/index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        Storage::disk("public")->delete($product->image);
        $product->delete();
        session()->flash("del", "Product deleted successfully");
        return redirect("/index");
    }
}
