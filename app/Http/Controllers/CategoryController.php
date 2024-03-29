<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the category.
     */
    public function index()
    {
        // Data Display in Table
        $category = Category::get();
        return view('category.index', compact('category'));
    }
    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('category.create');
    }
    /**
     * Store a newly created cetagory in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'name' => 'required',
        ]);
        // Name Image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('categories'), $imageName);
        // Data Insertion
        $category = new Category;
        $category->image = $imageName;
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.index')->withCreate('Category Inserted Successfully! 🌟');
    }
    /**
     * Display the specified category.
     */
    public function show(string $id)
    {
        $category = Category::where('id', $id)->first();
        return view('category.show', ['category' => $category]);
    }
    /**
     * Show the form for editing the specified category.
     */
    public function edit(string $id)
    {
        $category = Category::where('id', $id)->first();
        return view('category.edit', ['category' => $category]);
    }
    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([

            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
            'name' => 'required',
        ]);

        $category = Category::where('id', $id)->first();
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('categories'), $imageName);
            $category->image = $imageName;
        }
        $category->name = $request->name;
        $category->save();
        // this line $categoryname is just to show the name after edit on alert
        $categoryname = Category::find($id);
        return redirect()->route('category.index')->withUpdate('Category "' . $categoryname->name . '" Updated Successfully! 🎉');
    }
    /**
     * Remove the specified category from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::where('id', $id)->first();
        $category->delete();
        return back()->withDelete('Category Deleted Successfully! 🗑️');
    }
}
