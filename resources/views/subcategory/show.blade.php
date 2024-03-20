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
                        <a href="{{ route('subcategory.index') }}" class="btn btn-primary">BACK</a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('subcategory.create') }}" class="btn btn-success mr-2">CreateSub Category</a>
                            <a href="{{ url('/subcategory') }}" class="btn btn-info">All SubCategories</a>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <div class="card bg-light mb-3">
                        <div class="card bg-light m-3 border-5 shadow text-center">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">SubCategory Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <h4 class="text-white bg-secondary p-2 rounded mb-4">SubCategory Image:</h4>
                                    <img src="{{ asset('subcategories/' . $subcategory->image) }}" class="img-fluid rounded"
                                        style="max-height: 350px;" alt="SUbCategory Image">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="bg-secondary p-2 rounded mb-4">
                                            <h4 class="text-white">SubCategory Name:</h4>
                                        </div>
                                        <h2 class="text-primary mb-4">{{ $subcategory->name }}</h2>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="bg-secondary p-2 rounded mb-4">
                                            <h4 class="text-white mb-2">Category Name:</h4>
                                        </div>

                                        <h2 class="text-primary mb-2">{{ $subcategory->category->name }}</h2>
                                    </div>
                                </div>
                                <div class="bg-info p-2 rounded">
                                    <h4>Created AT : {{ $subcategory->created_at }}</h4>
                                    <h4>Updated AT : {{ $subcategory->updated_at }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
