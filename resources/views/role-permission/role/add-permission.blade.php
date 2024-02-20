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
                        <h1 class="m-0">Role : {{ $role->name }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ url('/role') }}" class="btn btn-danger">Back</a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            @include('partials.alerts')
                            <div class="card-header">
                                <h4>
                                    Role : {{ $role->name }}
                                </h4>
                                <div class="card-body">
                                    <form action="{{ url('role/' . $role->id . '/give/permission') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputName1" class="form-label">Permission Name</label>
                                            <div class="row">
                                                @foreach ($permissions as $permission)
                                                    <div class="col-md-5">
                                                        <label for="">
                                                            <input type="checkbox" name="permission[]"
                                                                value="{{ $permission->name }}"
                                                                {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>
                                                            {{ $permission->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @if ($errors->has('permission'))
                                            <span class="text-danger">{{ $errors->first('permission') }}</span>
                                        @endif
                                        <div>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@stop
