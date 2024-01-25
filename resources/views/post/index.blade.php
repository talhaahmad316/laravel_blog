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
                        <h1>All Blogs</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{route('post.create')}}" class="btn btn-success">Post Blogs</a>
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
                            <th>Post Title</th>
                            <th>Auther Name</th>
                            <th>Category Name</th>
                            <th>SubCategory Name</th>
                            <th>Short Discription</th>
                            <th>Long Discription</th>
                            <th>Tags</th>
                            <th>Image</th>
                            <th style="padding-left: 45px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{$post['name']}}</td>
                                <td>{{$post['author']}}</td>
                                <td>{{ $post->category->name ?? '' }}</td>
                                <td>{{ $post->subcategory->name ?? '' }}</td>
                                <td>{{ Str::limit($post['short_detail'], 20) }}</td>
                                <td>{{ Str::limit($post['long_detail'], 20) }}</td>
                                <td>{{$post['tags']}}</td>
                                <td>
                                    <img src="{{ asset('posts/' . $post->image) }}" alt=""
                                        class="rounded-circle" width="50px" height="50px">
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        {{-- Edit Button --}}
                                        <a href="{{ Route('post.edit', $post->id) }}" class="btn btn-info mr-2">Edit</a>
                                        {{-- Delete Button --}}
                                        <form action="{{route('post.destroy', $post->id) }}" method="POST">
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
            </div>
        </div>
    </div>
    </div>
    </div>
    </section>
    </div>
@stop
