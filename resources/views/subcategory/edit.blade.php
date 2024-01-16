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
                <h1 class="m-0">Update SubCategory</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{ route('subcategory.create') }}" class="btn btn-primary mr-2">Create Sub Cetagory</a>
                        <a href="{{ url('/subcategory') }}" class="btn btn-primary">All Sub Categories</a>
                     </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Category</h3>
                    </div>
                    <form action="{{ url('subcategory/' . $subcategory->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="CategoryName">Sub Category Name</label>
                                <input type="text" name="name" class="form-control" id="CategoryName" placeholder="Category Name">
                            </div>
                            @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                            <div class="form-group">
                                <label for="CategoryName">Select Category</label>
                                <select class="form-control" name="category_id">
                                    <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                </select>
                            </div>
                            @if($errors->has('category_id'))
                            <span class="text-danger">{{$errors->first('category_id')}}</span>
                            @endif
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                                @if($errors->has('image'))
                            <span class="text-danger">{{$errors->first('image')}}</span>
                            @endif
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@stop