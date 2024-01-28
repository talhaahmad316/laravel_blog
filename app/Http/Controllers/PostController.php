<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::get();
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('post.create', compact('categories','subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate
        ([
            'name' => 'required',
            'author' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'short_detail' => 'required',
            'long_detail' => 'required',
            'tags' => 'required',
            'image' => 'required',
        ]);
        $imageName = time().'.'.$request -> image -> extension();
        $request -> image -> move(public_path('posts'),$imageName);
        $post = new Post();
        $post -> name = $request -> name;
        $post -> author = $request -> author;
        $post -> category_id = $request -> category_id;
        $post -> subcategory_id = $request -> subcategory_id;
        $post -> short_detail = $request -> short_detail;
        $post -> long_detail = $request -> long_detail;
        $post -> tags = $request -> tags;
        $post -> image = $imageName;
        $post -> save();
        return redirect() -> route('post.index') -> withCreate('Blog Posted Successfully! 🌟');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Post::where('id',$id)->first();
        return view('post.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $post = Post::where('id', $id) -> first();
        return view('post.edit', compact('post','subcategories', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate
        ([
            'name'=>'required',
            'author'=>'required',
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'short_detail'=>'required',
            'long_detail'=>'required',
            'tags'=>'required',
            'image'=>'nullable|mimes:jpeg,jpg,png,gif|max:10000',
        ]);
        $post=Post::where('id',$id)->first();
        if($request->hasFile('image'))
        {
            $imageName=time().'.'.$request->image->extension();
            $request->image->move(public_path('posts'),$imageName);
            $post->image = $imageName;
        }
        $post->name=$request->name;
        $post->author=$request->author;
        $post->category_id=$request->category_id;
        $post->subcategory_id=$request->subcategory_id;
        $post->short_detail=$request->short_detail;
        $post->long_detail=$request->long_detail;
        $post->tags=$request->tags;
        $post->save();
        return redirect()->route('post.index')->withUpdate('Blog Updated Successfully! 🌟');
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Post::where('id',$id)->first();
        $post->delete();
        return back()->withDelete('post Deleted Successfully! 🗑️');
    }
}
