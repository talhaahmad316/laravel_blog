@extends('layout.master')
@section('title')
    <title>AdminLTE 3 | Dashboard</title>
@stop
@section('content')
    <style>
        .w-5 {
            display: none;
        }

        .table-hover tbody tr:hover {
            cursor: pointer;
        }
    </style>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>All Products</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('products.create') }}" class="btn btn-success">Create Products</a>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="card">
            <div class="card-body">
                @include('partials.alerts')
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products Name</th>
                            <th>Products Images</th>
                            <th style="padding-left: 45px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product['name'] }}</td>
                                <td>
                                    @php
                                        $images = json_decode($product->images, true);
                                    @endphp
                                    @foreach ($images as $image)
                                        <img src="{{ asset('/' . $image) }}" alt="" width="50px" height="50px"
                                            class="rounded-circle">
                                    @endforeach
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        {{-- Edit Button --}}
                                        <a href="{{ Route('products.edit', $product->id) }}"
                                            class="btn btn-info mr-2">Edit</a>
                                        {{-- Delete Button --}}
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@stop
