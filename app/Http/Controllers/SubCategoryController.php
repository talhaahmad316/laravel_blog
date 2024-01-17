<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the Sub Category.
     */
    public function index()
    {
        $subcategory=SubCategory::paginate(10);
        return view('subcategory.index',compact('subcategory'));
    }

    /**
     * Show the form for creating a new Sub Category.
     */
    public function create()
    {
    //    return view('subcategory.create');
    $category = Category::all();
    return view('subcategory.create', compact('category'));
    }

    /**
     * Store a newly created Sub Category in storage.
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([
          'name'=>'required',
          'category_id' => 'required',
          'image'=>'required|mimes:jpeg,jpg,png,gif|max:10000',
        ]);
        // Name Image
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('subcategories'),$imageName);
        // Data Insertion
        $subcategory = new SubCategory();
        $subcategory->name= $request->name;
        $subcategory->category_id=$request->category_id;
        $subcategory->image = $imageName;
        $subcategory->save();
        return redirect()->route('subcategory.index')->withSuccess('Sub Category Inserted Successfully');
    }

    /**
     * Display the specified Sub Category.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified Sub Category.
     */
    public function edit(string $id)
    {
        $category = Category::all();
        $subcategory = SubCategory::where('id', $id)->first();
        return view('subcategory.edit', compact('subcategory', 'category'));
    }

    /**
     * Update the specified Sub Category in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'category_id' => 'required',
            'image'=>'nullable|mimes:jpeg,jpg,png,gif|max:10000',
        ]);
        $subcategory=subCategory::where('id',$id)->first();
        if($request->hasFile('image'))
        {
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('subcategories'),$imageName);
            $subcategory->image = $imageName;
        }
        $subcategory->name = $request->name;
        $subcategory->category_id=$request->category_id;
        $subcategory->save();
        return redirect()->route('subcategory.index')->withSuccess('Sub Category Updated Successfull');
    }

    /**
     * Remove the specified Sub Category from storage.
     */
    public function destroy(string $id)
    {
        $subcategory=SubCategory::where('id',$id)->first();
        $subcategory->delete();
        return back()->withDelete('Deleted Successfully');
    }
}
