@extends('layouts.admin_layouts.admin_layout')

@section('mainContent')

<div class="container">
  <div class="row">
    <div class="col-lg-12">


    <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    
                    <th>ID</th>
                    <th>Name</th>
                    <th>Startup Name</th>
                    <th>Email </th>
                    <th>Address</th>
                    <th>Phone</th>
                    
                    <th>Image</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>status</th>
                    <th>Action</th>

                    
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    @foreach($users as $user)
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->startup_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->phone}}</td>
                    <!-- <td>
                      @if($user->status ==1)
                      <a href="" class="btn btn-sm btn-success">Accepted</a>
                      @elseif($user->status==0)
                      <a href="" class="btn btn-sm btn-danger">Rejected</a>
                      @else
                      <a href="" class="btn btn-sm btn-primary">Pending</a>

                      @endif
                    </td> -->
                    
                    <td>{{$user->image}}</td>
                    
                    <td>{{$user->created_at->format('d/m/Y')}}</td>
                    <td>{{$user->updated_at->format('d/m/Y')}}</td>
                    <td>
                        @if($user->status==1)
                        <a href="" class="btn btn-sm btn-success">Enabled</a>
                        @else
                        <a href="" class="btn btn-sm btn-danger">Disabled</a>
                        @endif


                    </td>
                    <td>
                        @if($user->status==1)
                        <a href="{{url('admin/disable-status/'.$user->id)}}" type="button" class="btn btn-sm btn-danger">Disable</a>
                        
                        @else
                        <a href="{{url('admin/enable-status/'.$user->id)}}"class="btn btn-sm btn-success">Enable</a>
                       @endif
                        
                    </td>
                    

                    
                    
                  </tr>
                  @endforeach
                 
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>

    </div>
  </div>
</div>
           
@endsection