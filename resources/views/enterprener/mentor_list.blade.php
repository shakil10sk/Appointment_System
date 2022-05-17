@extends('layouts.enterprener.master')

@section('main-content')

        <!-- banner-section start -->
        <section class="inner-banner-section bg-overlay-white banner-section bg_img"
            data-background="{{ asset('assets/images/banner2.jpg') }}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="banner-content">
                            <h2 class="title">Our Mentors</h2>
                            <div class="breadcrumb-area">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Our Mentors</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner-section end -->


        <!-- booking-section start -->
        <section class="booking-section ptb-80">
            <div class="container">
                <div class="booking-search-area">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 text-center">
                            <div class="appoint-content">
                                <form class="appoint-form mt-0 ml-b-20"
                                    action="{{url('user/mentor/list')}}" method="post">
                                    @csrf

                                    <div class="search-location form-group">
                                        <div class="appoint-select">
                                            <select class="chosen-select locations" name="district_id" onchange="getThana(this.value)" id="district_id">
                                                <option value="">Select Your District</option>
                                                @foreach ($district as $district)
                                                    <option value="{{$district->id}}">{{$district->en_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="search-location form-group">
                                        <div class="appoint-select" id="upazilaRender">
                                            <select class="chosen-select locations" name="thana_id" id="thana_id">
                                                <option selected value="">Select Your Upazila</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="search-location form-group">
                                        <div class="appoint-select">
                                            <select class="chosen-select locations" name="category">
                                                <option value="">Category*</option>
                                                @foreach ($category_list as $category)
                                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="search-btn cmn-btn"><i class="icon-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center ml-b-30">
                    @foreach ($mentor_list as $list)
                        <div class="col-lg-3 col-md-6 col-sm-6 mrb-30">
                            <div class="booking-item">
                                <div class="booking-thumb">
                                    <img src="{{ asset('images/mentor/photos/'.$list->image) }}"
                                        alt="booking">
                                    <div class="doc-deg">{{$list->category->category_name}}</div>
                                    <a href="#0" class="fav-btn"><i class="far fa-bookmark"></i></a>
                                </div>
                                <div class="booking-content">
                                    <span class="sub-title"><a
                                            href="#">{{$list->category->category_name}}</a></span>
                                    <h5 class="title">{{$list->full_name}} <i class="fas fa-check-circle"></i></h5>
                                    <p>{{$list->specialist}}</p>
                                    <div class="booking-ratings">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <ul class="booking-list">
                                        <li><i class="icon-direction-alt"></i><a
                                                href="#">{{$list->address}}</a></li>
                                        <li><i class="las la-phone"></i> {{$list->phone}}</li>
                                        <li><i class="las la-phone"></i>
                                            {{-- <ul> --}}
                                                <p>
                                                @foreach ($list->available_days as $day)
                                                    {{-- <li> --}}
                                                        {{$day->day}},
                                                        {{-- -{{$day->from_time}}-{{$day->to_time}} --}}
                                                    {{-- </li> --}}
                                                @endforeach
                                            </p>
                                            </ul>
                                        </li>
                                    </ul>
                                    <div class="booking-btn">
                                        <a href="{{ url("user/mentor/".$list->id) }}" class="cmn-btn">Select Mentor</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- booking-section end -->
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
                                            data-cfemail="9ef7f0f8f1defaf1f3fff7f0b0fdf1f3">[email&#160;protected]</span></a>
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
        function getThana(value){
                $.ajax({
                    url: "{{url('/mentor/getupazila')}}",
                    type:'post',
                    data:{
                        "id": value,
                        "_token": "{{ csrf_token() }}",
                    },
                    success:function(res){
                        let selector = ` <select class="chosen-select locations" name="thana_id" id="thana_id"><option value="" selected>Select Thana</option>`;
                        if(res.status == 'success'){
                            res.data.forEach(function(item){
                                selector += `<option value="${item.id}">${item.en_name}</option>`;
                            })
                            selector += '</select>'
                            $("#upazilaRender").html(selector);
                            // console.log(selector)
                        }
                    }
                })
            }
    </script>

    @endsection

@endsection
