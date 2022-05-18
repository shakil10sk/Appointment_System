@extends('layouts.enterprener.master')

@section('main-content')

<div id="fb-root"></div>
<script async defer crossorigin="anonymous"
    src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0&appId=----&autoLogAppEvents=1"></script>
<!-- booking-section start -->
<!-- banner-section start -->
<section class="inner-banner-section bg-overlay-white banner-section bg_img"
    data-background="https://script.viserlab.com/docrib/assets/images/frontend/breadcrumb/5fd078f78945f1607497975.jpg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="banner-content">
                    <h2 class="title">{{$mentor_info->full_name}}</h2>
                    <div class="breadcrumb-area">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$mentor_info->full_name}} - Mentor Hire
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner-section end -->
<section class="booking-section booking-section-two pd-t-80 pd-b-40 ">
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="booking-item d-flex flex-wrap align-items-center justify-content-between mb-5">
                    <div class="booking-left d-flex align-items-center">
                        <div class="booking-thumb">
                            <img src="{{asset('images/mentor/photos/'.$mentor_info->image)}}" alt="">

                            <a href="#0" class="fav-btn"><i class="far fa-bookmark"></i></a>
                        </div>
                        <div class="booking-content">
                            <span class="sub-title"><a href="#">{{$mentor_info->category}}</a></span>
                            <h5 class="title">{{$mentor_info->full_name}} <i class="fas fa-check-circle"></i></h5>
                            <p>{{$mentor_info->specialist}}</p>
                            <div class="booking-ratings">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <ul class="booking-list">
                                {{-- <li><i class="icon-direction-alt"></i>{{$mentor_info->address}}</li> --}}
                                {{-- <li><i class="las la-phone"></i> {{$mentor_info->phone}}</li> --}}
                                <li>Available Days
                                    <ul>
                                        @php
                                        $day = [];
                                            foreach ($avilable_days as $item){
                                                array_push($day,$item->day);
                                                echo '<li>'.$item->day.'--'.$item->from_time.'--'.$item->to_time.'</li>';
                                            }
                                        @endphp
                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <div class="booking-right">
                        <div class="booking-content">
                            <ul class="booking-list">
                                <li><i class="fas fa-hourglass-start"></i>Joined us :</li>
                                <li><i class="fas fa-stethoscope"></i>
                                    {{Carbon\Carbon::parse($mentor_info->created_at)->format('Y-m-d')}}
                                     {{-- year ago --}}
                                </li>
                                <li><span><i class="fas fa-wallet"></i>Fees : {{$mentor_info->fee}}<span></li>
                            </ul>
                            {{-- <ul class="booking-tag">
                                <li><a href="https://www.facebook.com/" target="_blank"><i
                                            class="fab fa-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/accounts/login/" target="_blank"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li><a href="https://www.youtube.com/" target="_blank"><i
                                            class="fab fa-youtube"></i></a></li>
                            </ul> --}}
                            @if(in_array(Carbon\Carbon::today()->format('l'),$day))
                                <div class="booking-btn">
                                    <a href="#" class="border-btn active">Appointment Available</a>
                                </div>
                            @else
                                <div class="booking-btn">
                                    <a href="#" class="border-btn text-danger">Appointment Not Available</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- booking-section end -->

<!-- overview-section start -->
<section class="overview-section pd-b-80">
    <div class="container">
        <div class="overview-area mrb-40">
            <div class="row">
                <div class="col-lg-12">
                    <div class="overview-tab-wrapper">
                        <ul class="tab-menu">
                            <li>Overview</li>
                            <li class="active">Hire</li>
                            {{-- <li>Review</li> --}}
                        </ul>
                        <div class="tab-cont">
                            <div class="tab-item">
                                <div class="overview-tab-content ml-b-30">
                                    {{-- <div class="overview-content">
                                        <h5 class="title">About Me</h5>
                                        <p>{{$mentor_info->details}}</p>
                                    </div> --}}
                                    <div class="overview-content">
                                        <h5 class="title">Specialist</h5>
                                        <div class="overview-box">
                                            <ul class="overview-list">
                                                <li>
                                                    <div class="overview-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="overview-details">
                                                        <h6 class="title">{{$mentor_info->specialist}}</h6>
                                                        {{-- <div>MBBS</div>
                                                        <span>2005 - 2007 (2 years)</span> --}}
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="overview-content">
                                        <h5 class="title">Department</h5>
                                        <div class="overview-box">
                                            <ul class="overview-list">
                                                <li>
                                                    <div class="overview-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="overview-details">
                                                        <h6 class="title">
                                                            {{$mentor_info->category}}</h6>
                                                        {{-- <div>Professor &amp; Head</div> --}}
                                                        {{-- <span>{{$mentor_info->expirenced}} years</span> --}}
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    {{-- <div class="overview-content">
                                        <h5 class="title">Specializations</h5>
                                        <div class="overview-footer-area d-flex flex-wrap justify-content-between">
                                            <ul class="overview-footer-list">
                                            </ul>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="tab-item">
                                <div class="overview-tab-content">
                                    {{-- <div
                                        class="overview-booking-header d-flex flex-wrap justify-content-between ml-b-10">
                                        <div class="overview-booking-header-left mrb-10">
                                            <h4 class="title">Available Schedule</h4>
                                            <ul class="overview-booking-list">
                                                <li class="available">Available</li>
                                                <li class="booked">Booked</li>
                                                <li class="selected">Selected</li>
                                            </ul>
                                        </div>

                                    </div> --}}

                                    <form action="{{ route('appointment') }}" class="appointment-from" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="mentor_id" value="{{$mentor_info->id}}">
                                        <div class="overview-booking-area">
                                            <div class="overview-booking-header-right mrb-10">
                                                <div
                                                    class="overview-date-area d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="overview-date-header">
                                                        <h5 class="title">Choose Your Date</h5>
                                                    </div>

                                                    <div class="overview-date-select">
                                                        <input type="date" id="appointment_date" style="background-color: #118b57;color:aliceblue" class="form-control @error('appointment_date') is-invalid @enderror" name="appointment_date" onchange="confirmBookingData()" id="appointment_date" required>

                                                        @error('appointment_date')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        {{-- <select class="form-control date-select" name="booking_date"
                                                            required>
                                                            <option value="2022-05-10">2022-05-10</option>
                                                            <option value="2022-05-11">2022-05-11</option>
                                                            <option value="2022-05-12">2022-05-12</option>
                                                            <option value="2022-05-13">2022-05-13</option>
                                                            <option value="2022-05-14">2022-05-14</option>
                                                            <option value="2022-05-15">2022-05-15</option>
                                                            <option value="2022-05-16">2022-05-16</option>
                                                        </select> --}}

                                                    </div>

                                                </div>
                                            </div>
                                            {{-- <ul class="clearfix">
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item1" data-value="1">
                                                        <span>1</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item2" data-value="2">
                                                        <span>2</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item3" data-value="3">
                                                        <span>3</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item4" data-value="4">
                                                        <span>4</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item5" data-value="5">
                                                        <span>5</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item6" data-value="6">
                                                        <span>6</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item7" data-value="7">
                                                        <span>7</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item8" data-value="8">
                                                        <span>8</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item9" data-value="9">
                                                        <span>9</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item10" data-value="10">
                                                        <span>10</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item11" data-value="11">
                                                        <span>11</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item12" data-value="12">
                                                        <span>12</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item13" data-value="13">
                                                        <span>13</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item14" data-value="14">
                                                        <span>14</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item15" data-value="15">
                                                        <span>15</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item16" data-value="16">
                                                        <span>16</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item17" data-value="17">
                                                        <span>17</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item18" data-value="18">
                                                        <span>18</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item19" data-value="19">
                                                        <span>19</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item20" data-value="20">
                                                        <span>20</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item21" data-value="21">
                                                        <span>21</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item22" data-value="22">
                                                        <span>22</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item23" data-value="23">
                                                        <span>23</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item24" data-value="24">
                                                        <span>24</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item25" data-value="25">
                                                        <span>25</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item26" data-value="26">
                                                        <span>26</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item27" data-value="27">
                                                        <span>27</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item28" data-value="28">
                                                        <span>28</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item29" data-value="29">
                                                        <span>29</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item30" data-value="30">
                                                        <span>30</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item31" data-value="31">
                                                        <span>31</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item32" data-value="32">
                                                        <span>32</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item33" data-value="33">
                                                        <span>33</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item34" data-value="34">
                                                        <span>34</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item35" data-value="35">
                                                        <span>35</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item36" data-value="36">
                                                        <span>36</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item37" data-value="37">
                                                        <span>37</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item38" data-value="38">
                                                        <span>38</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item39" data-value="39">
                                                        <span>39</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item40" data-value="40">
                                                        <span>40</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item41" data-value="41">
                                                        <span>41</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item42" data-value="42">
                                                        <span>42</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item43" data-value="43">
                                                        <span>43</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item44" data-value="44">
                                                        <span>44</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item45" data-value="45">
                                                        <span>45</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item46" data-value="46">
                                                        <span>46</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item47" data-value="47">
                                                        <span>47</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item48" data-value="48">
                                                        <span>48</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item49" data-value="49">
                                                        <span>49</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                        class="available-time active-time item50" data-value="50">
                                                        <span>50</span>
                                                    </a>
                                                </li>
                                                <input type="hidden" name="time_serial" class="time" required>
                                            </ul> --}}
                                        </div>
                                        <div class="booking-appoint-area">
                                            <div class="row justify-content-center ml-b-30">
                                                <div class="col-lg-6 mrb-30">
                                                    <div class="booking-appoint-form-area">
                                                        <h4 class="title">Get An Appointment</h4>
                                                        <form class="booking-appoint-form">
                                                            <div class="row">
                                                                <div class="col-lg-12 form-group">
                                                                    <textarea name="reason"
                                                                        placeholder="Appontment Reason*"></textarea>
                                                                </div>
                                                                <div class="col-lg-12 form-group">
                                                                    <label for="document">Necessary Documents</label>
                                                                    <input type="file" name="document" id="document">
                                                                </div>
                                                                
                                                                
                                                                <div class="col-lg-12 form-group">
                                                                    <div class="form-group">
                                                                        <label for="methode">Comunication Phase <span class="text-danger">*</span> </label>
                                                                      <select class="form-control @error('methode') is-invalid @enderror" name="methode" onchange="confirmBookingData()" id="methode">
                                                                        <option selected value="">How You want to Comunicate</option>
                                                                        <option value="0">OffLine</option>
                                                                        <option value="1">OnLine</option>
                                                                      </select>
                                                                      @error('methode')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 form-group" id="medium_select">
                                                                    <div class="form-group">
                                                                        <label for="">Select Medium<span class="text-danger">*</span>  </label>
                                                                        <select class="form-control" name="medium" id="medium">
                                                                          <option selected value="">Select Comunicate Medium</option>
                                                                          <option value="0">Audio</option>
                                                                          <option value="1">Video</option>
                                                                          <option value="2">Text</option>
                                                                        </select>
                                                                      </div>
                                                                      <div class="form-group">
                                                                        <input type="text" name="details" placeholder="Enter Your phone or email to connect mentor*" class="form-control" id="details">
                                                                      </div>
                                                                </div>
                                                                {{-- <div
                                                                    class="col-lg-12 form-group d-flex flex-wrap justify-content-between">
                                                                    <button type="submit" class="cmn-btn payment-system"
                                                                        data-value="2">Pay In Cash</button>

                                                                    <button type="submit" class="cmn-btn payment-system"
                                                                        data-value="1">Pay Online</button>
                                                                    <input type="hidden" name="payment_system"
                                                                        class="payment" required>
                                                                </div> --}}

                                                                    <div
                                                                        class="col-lg-12 form-group d-flex flex-wrap">
                                                                        <button type="submit" @if(!isset(Auth::user()->id)) disabled style="background-color: #cccccc"  @endif class="cmn-btn payment-system"
                                                                        >Apply For Appointment</button>
                                                                    </div>
                                                                    @if(!isset(Auth::user()->id))
                                                                        <div
                                                                            class="col-lg-12 form-group d-flex flex-wrap">
                                                                            <p class="text-danger">Please Login First to Get An Appointment</p>
                                                                        </div>
                                                                    @endif
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mrb-30">
                                                    <div class="booking-confirm-area">
                                                        <h4 class="title">Confirm Your Hire</h4>
                                                        <ul class="booking-confirm-list">
                                                            <li><span>Date & Time</span> : <span class="custom-color"
                                                                    id="date"></span></li>
                                                            <li><span>Fees</span> : {{$mentor_info->fee}}</li>
                                                        </ul>
                                                        <div class="booking-confirm-btn">
                                                            <a href="javascript:void(0)"
                                                                class="cmn-btn-active reset">Reset</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-item">
                                <div class="fb-comments" data-href=""
                                    data-numposts="5"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- overview-section end -->
</div>
<!-- call-to-action section start -->
<section class="call-to-action-section">
    <div class="container">
        <div class="row justify-content-center align-self-center">
            <div class="col-lg-8 text-center">
                <div class="call-to-action-area">
                    <div class="call-info">
                        <div class="call-info-thumb">
                            <img src="https://script.viserlab.com/docrib/assets/images/frontend/footer/5fc4bbd9ae3d01606728665.png"
                                alt="call">
                        </div>
                        <div class="call-info-content">
                            <h4 class="title">
                                <span>Emergency Call</span>
                                <a href="#">+12345-678-9</a>
                            </h4>
                        </div>
                    </div>
                    <div class="mail-info">
                        <div class="mail-info-thumb">
                            <img src="https://script.viserlab.com/docrib/assets/images/frontend/footer/5fc4bbd9b073d1606728665.png"
                                alt="email">
                        </div>
                        <div class="mail-info-content">
                            <h4 class="title">
                                <span>24/7 Email Support</span>
                                <a href="#"><span class="__cf_email__"
                                        data-cfemail="98f1f6fef7d8fcf7f5f9f1f6b6fbf7f5">[email&#160;protected]</span></a>
                            </h4>
                        </div>
                    </div>
                    <span class="dc-or-text">- OR -</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- call-to-action section end -->

@section('script')
<script>
    $(document).ready(function(){

        $("#medium_select").hide();
    })
    function confirmBookingData(){
        $("#date").text($("#appointment_date").val());
        var methode = $("#methode").val();


        if(methode == 1){
            $("#medium_select").show();
        }else{
            $("#medium_select").hide();
        }
    }

    // $( function() {

    // } );

</script>

@endsection

@endsection
