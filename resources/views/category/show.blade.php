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
                        <a href="{{route('category.index')}}" class="btn btn-primary">BACK</a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('category.create') }}" class="btn btn-primary mr-2">Add Category</a>
                            <a href="{{ url('/category') }}" class="btn btn-primary">All Categories</a>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="bg-secondary">
                                <h4 class="text-white">Category Name:</h4>
                            </div>
                            <h2 class="text-primary">{{$category->name}}</h2>
                            <div class="bg-secondary">
                            <h4 class="text-white">Category Image:</h4>
                            </div>
                            <div class="text-center mb-3">
                                <img src="{{ asset('categories/' . $category->image) }}" class="img-fluid rounded"
                                    style="max-height: 350px;" alt="Category Image">
                            </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
