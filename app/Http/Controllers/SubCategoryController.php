<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('subcategory.index');
        $subcategory=SubCategory::paginate(10);
        return view('subcategory.index',compact('subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('subcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
          'name'=>'required',
          'category_id' => 'required',
          'image'=>'required|mimes:jpeg,jpg,png,gif|max:10000',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('subcategories'),$imageName);

        $subcategory = new SubCategory();
        $subcategory->name= $request->name;
        $subcategory->category_id=$request->category_id;
        $subcategory->image = $imageName;
        $subcategory->save();
        return redirect()->route('subcategory.index')->withSuccess('Sub Category Inserted Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subcategory=SubCategory::where('id',$id)->first();
        return view('subcategory.edit',['subcategory'=>$subcategory]);
    }

    /**
     * Update the specified resource in storage.
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
            $request->image->move(public_path('categories'),$imageName);
            $subcategory->image = $imageName;
        }
        $subcategory->name = $request->name;
        $subcategory->category_id=$request->category_id;
        $subcategory->save();
        
        return redirect()->route('subcategory.index')->withSuccess('Sub Category Updated Successfull');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory=SubCategory::where('id',$id)->first();
        $subcategory->delete();
        return back()->withDelete('Deleted Successfully');
    }
}
