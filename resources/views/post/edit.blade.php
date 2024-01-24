@extends('layout.master')
@section('title')
<title>AdminLTE 3 | Dashboard</title>
@stop
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Post</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('post.create') }}" class="btn btn-success mr-2">Post Blog</a>
                            <a href="{{ url('/post') }}" class="btn btn-info">All Blogs</a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Post : {{ $post->name }}</h3>
                            </div>
                            <form action="{{ url('post/' . $post->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="CategoryName">Title</label>
                                        <input type="text" name="name" class="form-control" id="PsotName"
                                            placeholder="Enter Post Title" value="{{ old('name', $post->name) }}">
                                    </div>
                                    @if($errors->has('name'))
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                    <div class="form-group">
                                        <label for="CategoryName">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Enter Your Email" value="{{ old('email', $post->email) }}">
                                    </div>
                                    @if($errors->has('email'))
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                    @endif
                                    <div class="form-group">
                                        <label for="exampleInputFile">Discription</label>
                                        <div class="form-floating">
                                            <textarea class="form-control" name="detail" placeholder="Add Description" id="floatingTextarea2" style="height: 100px">{{ old('detail', $post->detail) }}</textarea>
                                        </div>
                                        @if($errors->has('detail'))
                                        <span class="text-danger">{{$errors->first('detail')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@stop
