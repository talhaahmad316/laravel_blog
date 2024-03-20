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
                        <h1>All Role</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('role.create') }}" class="btn btn-success">Create Role</a>
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
                            <th>Role Name</th>
                            <th style="padding-left: 45px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role['id'] }}</td>
                                <td>{{ $role['name'] }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        {{-- Role and Permission Button --}}
                                        <a href="{{ url('role/' . $role->id . '/add/permission') }}"
                                            class="btn btn-success mr-2">Add/Edit Role Permission</a>
                                        {{-- Edit Button --}}
                                        <a href="{{ Route('role.edit', $role->id) }}" class="btn btn-info mr-2">Edit</a>
                                        {{-- Delete Button --}}
                                        <form action="{{ route('role.destroy', $role->id) }}" method="POST">
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
