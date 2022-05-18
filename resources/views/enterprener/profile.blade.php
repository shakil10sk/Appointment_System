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
                <div class="team-thumb">
                    <img class="img img-fluid" src="{{ asset('assets/images/user/'.$profile_info->image) }}"
                        alt="doctor-image">
                    <div class="team-thumb-overlay">
                        <ul class="social-icon">
                            <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a>
                            </li>
                            <li><a href="https://www.instagram.com/accounts/login/" target="_blank"><i
                                        class="fab fa-instagram"></i></a></li>
                            <li><a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="team-content">
                    <h5 class="title">{{ $profile_info->name }}</h5>
                    <h5 class="title">Start-Up Name: {{ $profile_info->startup_name }}</h5>
                    <h6 class="title">Phone</h6>
                    <p>{{ $profile_info->phone }}</p>
                    <h6 class="title">Address</h6>
                    <p>{{ $profile_info->address }}</p>

                    @if(!is_null($appointment))
                       <h4> Appointment To : {{$mentor_info->full_name}}</h2>
                        {{-- <br>
                       <h4> Fee : {{$mentor_info->fee}}</h3> --}}
                    @endif

                    @if(!is_null($appointment) &&  $appointment->is_paid == 0)
                    <h4> Fee : {{$mentor_info->fee}}</h3>
                    <div class="row">
                        <div class="col-md-4 mx-auto">
                         <div class="" style="text-align: right">
                             <button class="btn btn-md btn-danger" data-toggle="modal" data-target="#PaymentModal" type="button">Pay Now</button>
                         </div>
                        </div>
                    </div>
                    @endif
                    @if(isset($appointment->is_paid) && $appointment->is_paid == 1)
                        <h4> Comunicate Link :</h3>
                            <a  href="{{$appointment->details}}" class="btn btn-info btn-md">Click To Talk</a>
                        <h4> Appointment Date :</h3>
                            {{$appointment->date}}
                            {{-- {{\Carbon\Carbon::parse($appointment->date)->format('d/m/Y')}} --}}

                    @endif
                    
                    <br>
                    
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
