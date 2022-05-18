@extends('layouts.enterprener.master')

@section('main-content')

<div class="container">
    <div class="row justify-content-center ml-b-30">
        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="col-xl-12 col-lg-12 col-md-12 mrb-30">
            
            
            <div class="team-item d-flex flex-wrap align-items-center justify-content-left">
                <h4>Team Member List</h4>

                <table class="table  table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Sl</th>
                          <th scope="col">Member Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($members as $data)
                              
                          
                        <tr>
                          <th scope="row">{{$data->id}}</th>
                          <td>{{$data->name}}</td>
                          <td>{{$data->email}}</td>
                          <td>{{$data->phone}}</td>
                          <td>
                              <a href="{{route('deleteMember',[$data->id])}}" class="btn btn-danger rounded">Delete</a>
                          </td>
                        </tr>
                        @endforeach
                        
                        
                      </tbody>

                </table>
                
                
                <div class="justify-content-right mt-2 mb-3" style="text-align: right;float:right">
                    <a href="" class="btn btn-success btn-sm rounded"  data-toggle="modal" data-target="#modal-member">Add new member</a>
            
                </div>
                

            </div>
            
            

                    

                      <div class="modal fade" id="modal-member">
                        <div class="modal-dialog">
                            
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Add Team Member</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{route('member.save')}}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control" name="name">

                                  </div>

                                  <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email">

                                  </div>

                                  <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" name="phone">

                                  </div>

                                  <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" name="image" accept="image/*">

                                  </div>


                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Add Member</button>
                                  </div>
                                  
                              </form>
                            </div>
                            
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                    
                    


            {{-- add member modal --}}
            
              {{-- modal end add member --}}

                <!-- Modal -->
                <div class="modal fade" id="PaymentModal" tabindex="-1" role="dialog" aria-labelledby="PaymentModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Payment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url('user/payment')}}" method="POST">
                        {{-- <form action="javascript:void(0)" id="PaymnetSystem" method="POST" onsubmit="PaymnetSystem(event)"> --}}
                        {{-- <form action="javascript:void(0)" id="PaymnetSystem" method="POST"> --}}
                            @csrf
                            <input type="hidden" name="mentor_id" value="{{$mentor_info->id ?? ""}}">
                            <div class="modal-body">
                                <div class="form-group">
                                  <select class="form-control" required name="payment_system" id="payment_system">
                                    <option value="" selected>Select Payment System *</option>
                                    <option value="0">Bkash</option>
                                    <option value="1">Nogod</option>
                                    <option value="2">Dutch-Bangla</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <input type="number" name="acc_no" id="acc_no" required class="form-control" placeholder="Enter Your payment Account number" aria-describedby="helpId">
                                  {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                                </div>
                                <div class="form-group">
                                  <input type="text" name="details" id="details" required class="form-control" placeholder="Enter TXN Number or more details" aria-describedby="helpdetails">
                                  <small id="helpdetails" class="text-muted">enter your payment details to verify payment</small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>

        </div>
        
    </div>
    
    
</div>

@endsection

{{-- @section('script')
<script src="{{asset('assets/js/swal.min.js')}}"></script>
    <script>

        function PaymnetSystem(event){
            event.preventDefault();

            $.ajax({
                type: "POST",
                url: '/user/payment',
                processData: false,
                contentType: false,
                data: new FormData($("#PaymnetSystem")[0]),
                success: function(res) {

                    if(res.status == 'success'){
                        $("#payment_system").val("");
                        $("#acc_no").val("");
                        $("#details").val("");

                        swal({
                            title: res.status,
                            text: res.msg,
                            type: res.status,
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                        })
                        location.reload(true);

                    }else{
                        swal({
                            title: res.status,
                            text: res.msg,
                            type: res.status,
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                        })

                    }

                }
            });
        }


    </script>
@endsection --}}
