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
                            <a href="{{ route('subcategory.create') }}" class="btn btn-success mr-2">Create SubCetagory</a>
                            <a href="{{ url('/subcategory') }}" class="btn btn-info">All SubCategories</a>
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
                                <h3 class="card-title">Edit SubCategory : {{ $subcategory->name }}</h3>
                            </div>
                            <form action="{{ url('subcategory/' . $subcategory->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="CategoryName">SubCategory Name</label>
                                        <input type="text" name="name" class="form-control" id="CategoryName"
                                            placeholder="Category Name" value="{{ old('name', $subcategory->name) }}">
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                    <div class="form-group">
                                        <label for="CategoryName">Select Category</label>
                                        <select class="form-control" name="category_id">
                                            <option selected disabled>Open this select menu</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id ?? ''}}" {{ ( $category->id == $subcategory->category_id ? 'selected' : '') }}>{{ $category->name ?? ''}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('category_id'))
                                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                    @endif
                                    <div class="form-group">
                                        <label for="exampleInputFile">File input</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input"
                                                    id="exampleInputFile" value="{{ old('image', $subcategory->image) }}">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                        @if ($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                        <!-- Display the existing image -->
                                        @if ($subcategory->image)
                                        <img src="{{ asset('subcategories/' . $subcategory->image) }}" alt="Existing Image" class="img-fluid mt-3" width="200px">
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
