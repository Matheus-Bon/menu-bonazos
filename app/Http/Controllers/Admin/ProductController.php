<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Price;
use App\Models\Product;
use Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Sendo renderizado em CategoryAdminController
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['string', 'max:100', 'required'],
            'price' => ['numeric', 'required'],
            'description' => ['string'],
            'server_people' =>  ['required']
        ]);

        $category = Category::find($request->category);
        $priceNumeric = floatval($request->price);

        $admin = Auth::user();
        $unit = $admin->unit_id;

        $product = Product::create([
            'unit_id' => $unit,
            'name' => $request->name,
            'available' => true,
            'description'=> $request->description,
            'server_people' => $request->server_people
        ]);

        $price = new Price([
            'price' => $priceNumeric,
        ]);

        $category->products()->attach($product);

        $product->save();
        $product->price()->save($price);


        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
