@extends('layouts.admin_layouts.admin_layout')

@section('page-title','Category List')

@section('mainContent')

<div class="container">
    <div class="row">
        <div class="col-md-4 text-right float-right">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session()->get('error') }}
            </div>
        @endif
        </div>
    </div>
  <div class="row">
    <div class="col-lg-12">


    <div class="card">

              <div class="card-header">
                <h3 class="card-title">Category List</h3>
                <div class="text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                       Add New Category
                    </button>
                  </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    @foreach($category_list as $item)
                    <td>{{$item->id}}</td>
                    <td>{{$item->category_name}}</td>

                    <td>
                        <a href="{{url('admin/category/'.$item->id. '/edit')}}" type="button" class="btn btn-sm btn-danger">Edit</a>

                        <a href="{{url('admin/category/'.$item->id. '/delete')}}"class="btn btn-sm btn-success">Delete</a>

                    </td>
                  </tr>
                  @endforeach

                  </tbody>

                </table>
              </div>
              <!-- Button trigger modal -->



                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <form action="{{url('admin/category/store')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Enter New Category Name" aria-describedby="helpId">
                                    <small id="helpId" class="text-muted">New Category Name</small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
              <!-- /.card-body -->
            </div>

    </div>
  </div>
</div>

@endsection
