@extends('layout.master')
@section('title')
    <title>AdminLTE 3 | Dashboard</title>
@stop
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <a href="{{ route('post.index') }}" class="btn btn-primary">BACK</a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('post.create') }}" class="btn btn-success mr-2">Post Blog</a>
                            <a href="{{ url('/post') }}" class="btn btn-info">All Post</a>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-3">
                    <h4 class="text-white bg-secondary p-2 rounded mb-4">Post Image:</h4>
                    <img src="{{ asset('posts/' . $post->image) }}" class="img-fluid rounded" style="max-height: 350px;"
                        alt="post Image">
                </div>
                {{-- Post Title --}}
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="bg-secondary p-2 rounded text-center">
                            <h4 class="text-white">Post Name:</h4>
                        </div>
                        <h2 class="text-primary mb-2 text-center">{{ $post->name }}</h2>
                    </div>
                    {{-- Author Name --}}
                    <div class="col-md-6 mx-auto">
                        <div class="bg-secondary p-2 rounded text-center">
                            <h4 class="text-white">Author Name:</h4>
                        </div>
                        <h2 class="text-primary mb-2 text-center">{{ $post->author }}</h2>
                    </div>
                </div>
                {{-- Category Name --}}
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="bg-secondary p-2 rounded text-center">
                            <h4 class="text-white">Category Name</h4>
                        </div>
                        <h2 class="text-primary mb-2 text-center">{{ $post->category->name }}</h2>
                    </div>
                    {{-- SubCategory Name --}}
                    <div class="col-md-6 mx-auto">
                        <div class="bg-secondary p-2 rounded text-center">
                            <h4 class="text-white">SubCategory Name</h4>
                        </div>
                        <h2 class="text-primary mb-2 text-center">{{ $post->subcategory->name }}</h2>
                    </div>
                </div>
                {{-- Short Description --}}
                <div class="bg-secondary p-2 rounded text-center">
                    <h4 class="text-white">Short Description</h4>
                </div>
                <p class="text-primary mb-2 text-center">{{ $post->short_detail }}</p>
                {{-- Long Description --}}
                <div class="bg-secondary p-2 rounded text-center">
                    <h4 class="text-white">Long Description</h4>
                </div>
                <p class="text-primary mb-2 text-center">{{ $post->long_detail }}</p>
                {{-- Tags --}}
                <div class="bg-secondary p-2 rounded text-center">
                    <h4 class="text-white">Name Tags</h4>
                </div>
                <h2 class="text-primary mb-2 text-center">{{ $post->tags }}</h2>
                {{-- Created and Updated at div --}}
                <div class="bg-info p-2 rounded text-center">
                    <h4>Created AT : {{ $post->created_at }}</h4>
                    <h4>Updated AT : {{ $post->updated_at }}</h4>
                </div>
            </div>
        </div>
    </div>
@stop
