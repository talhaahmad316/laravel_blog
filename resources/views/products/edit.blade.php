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
                        <h1 class="m-0">Edit Products</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ url('/products') }}" class="btn btn-info">All Products</a>
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
                                <h3 class="card-title">Edit Products</h3>
                            </div>
                            <form action="{{ Route('products.update', $products->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="ProductsName">Products Name</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" id="ProductsName"
                                            placeholder="Product Name" value="{{ $products->name }}">
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Products Images</label>
                                        <input class="form-control @error('images') is-invalid @enderror" name="images[]"
                                            multiple type="file" id="formFile">
                                    </div>
                                    @if ($errors->has('images'))
                                        <span class="text-danger">{{ $errors->first('images') }}</span>
                                    @endif
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
