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
                        <h1>All SubCategories</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('subcategory.create') }}" class="btn btn-success">Create SubCategory</a>
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
                            <th>SubCategory Name</th>
                            <th>Category Name</th>
                            <th>SubCategory Image</th>
                            <th>Created AT</th>
                            <th>Updated AT</th>
                            <th style="padding-left: 45px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategories as $subcategory)
                            <tr>
                                {{-- <td>{{ $subcategory['name'] }}</td> --}}
                                <td>
                                    <a href="{{ Route('subcategory.show', $subcategory->id) }}" style="color: black; text-decoration: none;">
                                        {{ $subcategory['name'] ?? '' }}
                                    </a>
                                </td>

                                <td>{{ $subcategory->category->name ?? '' }}</td>
                                <td>
                                    <img src="{{ asset('subcategories/' . $subcategory->image) }}" alt=""
                                        class="rounded-circle" width="50px" height="50px">
                                </td>
                                <td>{{ $subcategory['created_at'] ?? '' }}</td>
                                <td>{{ $subcategory['updated_at'] ?? '' }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        {{-- Edit Button --}}
                                        <a href="{{ Route('subcategory.edit', $subcategory->id) }}"
                                            class="btn btn-info mr-2">Edit</a>
                                        {{-- Delete Button --}}
                                        <form action="{{ route('subcategory.destroy', $subcategory->id) }}" method="POST">
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
    </div>
    </section>
    </div>
@stop
