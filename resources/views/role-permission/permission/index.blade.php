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
                        <h1>All Permission</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('permission.create') }}" class="btn btn-success">Create Permission</a>
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
                            <th>ID</th>
                            <th>Permission Name</th>
                            <th style="padding-left: 45px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission['id'] }}</td>
                                <td>{{ $permission['name'] }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        {{-- Edit Button --}}
                                        <a href="{{ Route('permission.edit', $permission->id) }}"
                                            class="btn btn-info mr-2">Edit</a>
                                        {{-- Delete Button --}}
                                        <form action="{{ route('permission.destroy', $permission->id) }}" method="POST">
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
