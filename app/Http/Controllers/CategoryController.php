<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
    /**
     * Display a listing of the category.
     */
    public function index()
    {
        $category=Categories::paginate(10);
        return view('category.index',compact('category'));
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
        $request->validate([

            'image'=>'required|mimes:jpeg,jpg,png,gif|max:10000',
            'name'=>'required',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('categories'),$imageName);

        $category = new Categories;
        $category->image = $imageName;
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.index')->withSuccess('Category Inserted Successfully');
    }
    

    /**
     * Display the specified category.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(string $id)
    {
        $category=Categories::where('id',$id)->first();
        return view('category.edit',['category'=>$category]);
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, string $id)
    {
       
        $request->validate([

            'image'=>'nullable|mimes:jpeg,jpg,png,gif|max:10000',
            'name'=>'required',
        ]);

        $category=Categories::where('id',$id)->first();
        if($request->hasFile('image'))
        {
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('categories'),$imageName);
            $category->image = $imageName;
        }
        $category->name = $request->name;
        $category->save();
        
        return redirect()->route('category.index')->withSuccess('Category Inserted Successfully');
 }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(string $id)
    {
        $category=Categories::where('id',$id)->first();
        $category->delete();
        return back()->withDelete('Category Deleted Successfully');

    }
}
