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
                            <a href="{{ url('/post') }}" class="btn btn-info">All Blogs</a>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card bg-light mb-3">
                        <div class="card bg-light m-3 border-5 shadow text-center">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">Post</h3>
                            </div>
                            <div class="card-body text-left">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="bg-secondary p-2 rounded">
                                            <h4 class="text-white text-center">Post Title:</h4>
                                        </div>
                                        <h3 class="text-primary mb-4 text-center">{{ $post->name }}</h3>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="bg-secondary p-2 rounded">
                                            <h4 class="text-white text-center">Email:</h4>
                                        </div>
                                        <h3 class="text-primary mb-4 text-center">{{ $post->email }}</h3>
                                    </div>
                                </div>
                                <div class="bg-secondary p-2 rounded mb-4">
                                    <h4 class="text-white text-center">Post Detail:</h4>
                                </div>
                                <p class="mb-4" style="color: #750080;">{{ $post->detail }}</p>
                                <div class="bg-info p-2 rounded text-center">
                                    <h4>Created AT : {{ $post->created_at }}</h4>
                                    <h4>Updated AT : {{ $post->updated_at }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
