@extends('layouts.enterprener.master')

@section('main-content')

        <!-- banner-section start -->
        <section class="inner-banner-section bg-overlay-white banner-section bg_img"
            data-background="https://script.viserlab.com/docrib/assets/images/frontend/breadcrumb/5fd078f78945f1607497975.jpg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="banner-content">
                            <h2 class="title">Our Doctors</h2>
                            <div class="breadcrumb-area">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="https://script.viserlab.com/docrib">Home</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Our Doctors</li>
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
                                    action="#" method="get">
                                    <input type="hidden" name="_token" value="8ukAIkzAblPKHWeFleQaZmEKzBYgrU7bcvLdSXCC">

                                    <div class="search-location form-group">
                                        <div class="appoint-select">
                                            <select class="chosen-select locations" name="category">
                                                <option value="">Category*</option>
                                                @foreach ($category_list as $category)
                                                    <option value="{{$category->category}}">{{$category->category}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="search-info form-group">
                                        <div class="appoint-select">
                                            <select class="chosen-select locations" name="doctor">
                                                <option value="">Doctor*</option>
                                                <option value="16">Dr. Dina Elijah</option>
                                                <option value="15">Dr. Noah Benjamin</option>
                                                <option value="14">Dr. Emma Olivia</option>
                                                <option value="13">Dr. Mary Edwards</option>
                                                <option value="12">Sherrinford William</option>
                                                <option value="11">Dr. Royal Matthew</option>
                                                <option value="10">Dr. Elizabeth Blackwell</option>
                                                <option value="9">Dr. Danneal Walker</option>
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
                                    <img src="{{ asset('assets/images/doctorDemo.jpg') }}"
                                        alt="booking">
                                    <div class="doc-deg">{{$list->category}}</div>
                                    <a href="#0" class="fav-btn"><i class="far fa-bookmark"></i></a>
                                </div>
                                <div class="booking-content">
                                    <span class="sub-title"><a
                                            href="#">{{$list->category}}</a></span>
                                    <h5 class="title">{{$list->name}} <i class="fas fa-check-circle"></i></h5>
                                    <p>{{$list->spacialist}}</p>
                                    <div class="booking-ratings">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <ul class="booking-list">
                                        <li><i class="icon-direction-alt"></i><a
                                                href="https://script.viserlab.com/docrib/doctors-all/location/3">{{$list->address}}</a></li>
                                        <li><i class="las la-phone"></i> {{$list->phone}}</li>
                                        <li><i class="las la-phone"></i> {{$list->available_day}}</li>
                                    </ul>
                                    <div class="booking-btn">
                                        <a href="{{ url("mentor/".$list->id) }}" class="cmn-btn">Select Mentor</a>
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

@endsection
