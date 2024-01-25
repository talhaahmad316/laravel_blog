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
                            <a href="{{url('post')}}" class="btn btn-info">All Posts</a>
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
                                    {{-- title label --}}
                                    <div class="form-group">
                                        <label for="CategoryName">Post Title</label>
                                        <input type="text" name="name" class="form-control" id="PostName"
                                               placeholder="Enter Post Title" value="{{old('name')}}">
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                    {{-- author label --}}
                                    <div class="form-group">
                                        <label for="CategoryName">Author Name</label>
                                        <input type="text" name="author" class="form-control" id="AuthorName"
                                               placeholder="Enter Author Name" value="{{old('author')}}">
                                    </div>
                                    @if ($errors->has('author'))
                                        <span class="text-danger">{{ $errors->first('author') }}</span>
                                    @endif
                                    {{-- category label --}}
                                    <div class="form-group">
                                        <label for="CategoryName">Select Category</label>
                                        <select class="form-control" name="category_id" value="{{old('category_id')}}">
                                            <option selected disabled>Select Category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id ?? ''}}">{{ $category->name ?? '' }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('category_id'))
                                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                    @endif
                                    {{-- subcategory label --}}
                                    <div class="form-group">
                                        <label for="CategoryName">Select Subcategory</label>
                                        <select class="form-control" name="subcategory_id" value="{{old('subcategory_id')}}">
                                            <option selected disabled>Select Subcategory</option>
                                            @foreach ($subcategories as $subcategory)
                                            {{-- <option value="{{ $subcategory->id ?? ''}}">{{ $subcategory->name ?? '' }}</option> --}}
                                            @if (old('category_id') == $subcategory->category_id)
                                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('subcategory_id'))
                                        <span class="text-danger">{{ $errors->first('subcategory_id') }}</span>
                                    @endif
                                    {{-- Short Description label --}}
                                    <div class="form-group">
                                        <label for="exampleInputFile">Short Description</label>
                                        <div class="form-floating">
                                            <textarea class="form-control" name="short_detail"
                                                      placeholder="Add Short Description" id="floatingTextarea2"
                                                      style="height: 100px" value="{{old('short_detail')}}"></textarea>
                                        </div>
                                    </div>
                                    @if ($errors->has('short_detail'))
                                        <span class="text-danger">{{ $errors->first('short_detail') }}</span>
                                    @endif
                                    {{-- Long Discription label --}}
                                    <div class="form-group">
                                        <label for="exampleInputFile">Long Description</label>
                                        <div class="form-floating">
                                            <textarea class="form-control" name="long_detail"
                                                      placeholder="Add Long Description" id="floatingTextarea2"
                                                      style="height: 100px" value="{{old('long_detail')}}"></textarea>
                                        </div>
                                    </div>
                                    @if ($errors->has('long_detail'))
                                        <span class="text-danger">{{ $errors->first('long_detail') }}</span>
                                    @endif
                                    {{-- tags Label --}}
                                    <div class="form-group">
                                        <label for="CategoryName">Post Tags</label>
                                        <input type="text" name="tags" class="form-control" id="PostName"
                                               placeholder="Enter Post Title" value="{{old('tags')}}">
                                    </div>
                                    @if ($errors->has('tags'))
                                        <span class="text-danger">{{ $errors->first('tags') }}</span>
                                    @endif
                                    {{-- Image Label --}}
                                    <div class="form-group">
                                        <label for="exampleInputFile">Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input"
                                                    id="exampleInputFile" value="{{old('image')}}">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Post</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
