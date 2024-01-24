<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate
        ([
            'name'=>'required',
            'email'=>'required',
            'detail'=>'required',
        ]);
        $post=new Post;
        $post->name=$request->name;
        $post->email=$request->email;
        $post->detail=$request->detail;
        $post->save();
        return redirect('post')->withCreate('Blog Post Created Successfully! 🌟');

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
        $post=Post::where('id',$id)->first();
        return view('post.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate
        ([
            'name'=>'required',
            'email'=>'required',
            'detail'=>'required',
        ]);
        $post=Post::where('id',$id,)->first();
        $post->name = $request->name;
        $post->email = $request->email;
        $post->detail = $request->detail;
        $post->save(); 
        // this line postname is just to show the name afte edit on alert
        $postname = Post::find($id);
        return redirect('post')->withUpdate('Post "' . $postname->name . '" Updated Successfully! 🎉');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Post::where('id',$id)->first();
        $post->delete();
        return back()->withDelete('Post Deleted Successfully! 🗑️');
    }
}
