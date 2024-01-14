@extends('layout.master')

@section('content')
<div class="content-wrapper">
 <div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
     <div class="col-sm-6">
      <h1 class="m-0">Create Category</h1>
        </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="./..indexphp">Home</a></li>
           <li class="breadcrumb-item active">Categories</li>
         </ol>
      </div>
    </div>
  </div>
</div>
<section class="content">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-12">
    <div class="card card-primary">
     <div class="card-header">
    <h3 class="card-title">Create Category</h3>
</div>
<form action="{{Route('category.store')}}" method="POST" enctype="multipart/form-data">
@csrf
  <div class="card-body">
    <div class="form-group">
      <label for="CategoryName">Category Name</label>
        <input type="text" name="name" required class="form-control" id="CategoryName" placeholder="Category Name">
        </div>
  <div class="form-group">
       <label for="exampleInputFile">File input</label>
        <div class="input-group">
         <div class="custom-file">
        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
       <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
          </div>
        </div>
       </div>
        <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
 </section>
</div>
@stop