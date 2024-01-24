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
                        <a href="{{ route('category.index') }}" class="btn btn-primary">BACK</a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('category.create') }}" class="btn btn-success mr-2">Create Category</a>
                            <a href="{{ url('/category') }}" class="btn btn-info">All Categories</a>
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
                                <h3 class="card-title">Category Details</h3>
                            </div>
                            <div class="card-body text-center">
                                
                                <div class="text-center mb-3">
                                    <h4 class="text-white bg-secondary p-2 rounded mb-4">Category Image:</h4>
                                    <img src="{{ asset('categories/' . $category->image) }}" class="img-fluid rounded"
                                        style="max-height: 350px;" alt="Category Image">
                                </div>
                                <div class="bg-secondary p-2 rounded">
                                    <h4 class="text-white">Category Name:</h4>
                                </div>
                                <h2 class="text-primary mb-2">{{ $category->name }}</h2>
                                <div class="bg-info p-2 rounded">
                                    <h4>Created AT : {{ $category->created_at }}</h4>
                                    <h4>Updated AT : {{ $category->updated_at }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
