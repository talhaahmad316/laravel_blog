@extends('layout.master')
@section('content')
<style>
  .w-5{
    display: none;
  
  }
</style>
<div class="content-wrapper">
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Registered Users</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">DataTables</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="card">
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Created AT</th>
        <th>Updated AT</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($users as $item)
        <tr>
          <td>{{$item['id']}}</td>
          <td>{{$item['name']}}</td>
          <td>{{$item['email']}}</td>
          <td>{{$item['password']}}</td>
          <td>{{$item['created_at']}}</td>
          <td>{{$item['updated_at']}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{-- {{ $users->links() }} --}}
    {{ $users->links('pagination::simple-bootstrap-4') }}
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

@stop