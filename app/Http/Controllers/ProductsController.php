<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    /**
     * Display a listing of the Products.
     */
    public function index()
    {
        $products = Products::get();
        return view('products.index', compact('products'));
    }
    /**
     * Show the form for creating a new Products.
     */
    public function create()
    {
        return view('products.create');
    }
    /**
     * Store a newly created Products in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'images.*' => 'required|image',
        ]);
        $products = new Products();
        $products->name = $request->name;
        $products->save();
        $imageNames = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('products'), $imageName);
                $imageNames[] = 'products/' . $imageName;
            }
        }
        $products->images = json_encode($imageNames);
        $products->save();
        return redirect()->route('products.index')->withCreate('Product Inserted Successfully! 🌟');
    }
    /**
     * Show the form for editing the specified Products.
     */
    public function edit(string $id)
    {
        $products = Products::where('id', $id)->first();
        return view('products.edit', [
            'products' => $products,
        ]);
    }
    /**
     * Update the specified Products in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'images.*' => 'required|image',
        ]);
        $products = Products::where('id', $id)->first();
        $imageNames = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('products'), $imageName);
                $imageNames[] = 'products/' . $imageName;
            }
        }
        $products->images = json_encode($imageNames);
        $products->name = $request->name;
        $products->save();
        return redirect()->route('products.index')->withUpdate('Category Updated Successfully! 🎉');
    }
    /**
     * Remove the specified Products from storage.
     */
    public function destroy(string $id)
    {
        $products = Products::where('id', $id)->first();
        $products->delete();
        return back()->withDelete('Products Deleted Successfully! 🗑️');
    }
}
