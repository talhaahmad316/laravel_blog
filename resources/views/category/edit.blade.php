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
                        <h1 class="m-0">Edit Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('category.create') }}" class="btn btn-success mr-2">Create Cetagory</a>
                            <a href="{{ url('/category') }}" class="btn btn-info">All Categories</a>
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
                                <h3 class="card-title">Edit Category : {{ $category->name }}</h3>
                            </div>
                            <form action="{{ url('category/' . $category->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="CategoryName">Category Name</label>
                                        <input type="text" name="name" class="form-control" id="CategoryName"
                                            placeholder="Category Name" value="{{ old('name', $category->name) }}">
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input"
                                                    id="exampleInputFile" value="{{ old('image', $category->image) }}">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                    <!-- Display the existing image -->
                                    @if ($category->image)
                                        <img src="{{ asset('categories/' . $category->image) }}" alt="Existing Image"
                                            class="img-fluid mt-3" width="200px">
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn   btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@stop
