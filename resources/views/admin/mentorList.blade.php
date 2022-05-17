@extends('layouts.admin_layouts.admin_layout')

@section('mainContent')

<div class="container">
  <div class="row">
    <div class="col-lg-12">


    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Mentors Request List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email </th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Category</th>
                    <th>Spacialist</th>
                    
                    <th>Experience</th>
                    <th>Document</th>
                    <th>Image</th>
                    <th>Available Day</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    @foreach($mentors as $mentor)
                    <td>{{$mentor->id}}</td>
                    <td>{{$mentor->name}}</td>
                    <td>{{$mentor->email}}</td>
                    <td>{{$mentor->address}}</td>
                    <td>{{$mentor->phone}}</td>
                    <td>{{$mentor->category}}</td>
                    <td>{{$mentor->spacialist}}</td>
                    
                    <td>{{$mentor->expirenced}}</td>
                    <td>{{$mentor->documents}}</td>
                    <td>{{$mentor->image}}</td>
                    <td>{{$mentor->available_day}}</td>
                    <td>{{$mentor->created_at->format('d/m/Y')}}</td>
                    <td>{{$mentor->updated_at->format('d/m/Y')}}</td>
                    <td>
                      @if($mentor->status ==1)
                      <a href="" class="btn btn-sm btn-success">Accepted</a>
                      @elseif($mentor->status==0)
                      <a href="" class="btn btn-sm btn-danger">Rejected</a>
                      @else
                      <a href="" class="btn btn-sm btn-primary">Pending</a>
                      @endif
                    </td>
                    <td>
                      @if($mentor->status==1)
                      <a href="{{url('admin/reject-status/'.$mentor->id)}}" type="button" class="btn btn-sm btn-danger">Reject</a>
                      @elseif($mentor->status==0)
                      <a href="{{url('/admin/accept-status/'.$mentor->id)}}" type="button" class="btn btn-success">Accept</a>
                      @else
                      <a href="{{url('admin/accept-status/'.$mentor->id)}}" type="button" class="btn btn-sm btn-success">Accept</a>
                      <a href="{{url('admin/reject-status/'.$mentor->id)}}" type="button" class="btn btn-sm btn-danger">Reject</a>
                      @endif
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
           
@endsection