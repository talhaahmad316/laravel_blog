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
                        <h1>All Sub Categories</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('subcategory.create') }}" class="btn btn-primary">Add Sub Category</a>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="card">
            <div class="card-body">
                {{-- Insert Alert  --}}
                @if ($messege = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $messege }}</strong>
                    </div>
                @endif
                {{-- Upadate Alert --}}
                @if ($messege = Session::get('update'))
                    <div class="alert alert-warning alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $messege }}</strong>
                    </div>
                @endif
                {{-- Delete Alert --}}
                @if ($messege = Session::get('delete'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $messege }}</strong>
                    </div>
                @endif
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sub Category Name</th>
                            <th>Category Name</th>
                            <th>Sub Category Image</th>
                            <th>Created AT</th>
                            <th>Updated AT</th>
                            <th style="padding-left: 45px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategory as $item)
                            <tr>
                                {{-- <td>{{ $item['name'] }}</td> --}}
                                <td><a href="{{ Route('subcategory.show', $item->id) }}" style="color: black; text-decoration: none;">{{ $item['name'] }}</a></td>

                                <td>{{ $item['category_id'] }}</td>
                                <td>
                                    <img src="{{ asset('subcategories/' . $item->image) }}" alt=""
                                        class="rounded-circle" width="50px" height="50px">
                                </td>
                                <td>{{ $item['created_at'] }}</td>
                                <td>{{ $item['updated_at'] }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        {{-- Edit Button --}}
                                        <a href="{{ Route('subcategory.edit', $item->id) }}"
                                            class="btn btn-info mr-2">Edit</a>
                                        {{-- Delete Button --}}
                                        <form action="{{ route('subcategory.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">DELETE</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $subcategory->links('pagination::simple-bootstrap-4') }}
            </div>
        </div>
    </div>
    </div>
    </div>
    </section>
    </div>
@stop
