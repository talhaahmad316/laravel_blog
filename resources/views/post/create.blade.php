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
                        <h1 class="m-0">Post Blogs</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ url('post') }}" class="btn btn-info">All Posts</a>
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
                                <h3 class="card-title">Post Blogs</h3>
                            </div>
                            <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="CategoryName">Title</label>
                                        <input type="text" name="name" class="form-control" id="PostName"
                                            placeholder="Enter Post Title" value="{{old('name')}}">
                                    </div>
                                    @if($errors->has('name'))
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                    <div class="form-group">
                                        <label for="CategoryName">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Enter Your Email" value="{{old('email')}}">
                                    </div>
                                    @if($errors->has('email'))
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                    @endif
                                    <div class="form-group">
                                        <label for="exampleInputFile">Discription</label>
                                        <div class="form-floating">
                                            <textarea class="form-control" name="detail" placeholder="Add Discription" id="floatingTextarea2" style="height: 100px" value="{{old('detail')}}"></textarea>
                                          </div>
                                          @if($errors->has('detail'))
                                         <span class="text-danger">{{$errors->first('detail')}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Post</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@stop
