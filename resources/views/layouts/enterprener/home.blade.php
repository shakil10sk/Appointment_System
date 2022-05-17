@extends('layouts.enterprener.master')
@section('main-content')

<!-- banner-section start -->
<section class="banner">
    {{-- <div class="banner-social-area">
        <span>Follow Us</span>
        <ul class="banner-social">
            <li><a href="#" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
            <li><a href="#" target="_blank"><i class="lab la-pinterest"></i></a></li>
            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#" target="_blank"><i class="fab fa-youtube"></i></a></li>
            <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
        </ul>
    </div> --}}
    <div class="banner-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="banner-section bg_img" data-background="{{ asset('assets/images/demo_banner.jpg') }}">
                    <div class="custom-container">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-xl-6 text-center">
                                <div class="banner-content">
                                    {{-- <h2 class="title">Where There Is Healing There Is Hope</h2>
                                    <p>Experience the best health service with this site! Our doctors are well expert
                                        and give you the best service.</p> --}}
                                    <div class="banner-btn">
                                        <a href="{{ route('book.mentor.list') }}" class="cmn-btn">Make
                                            Appointment</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="swiper-slide">
                <div class="banner-section bg-overlay-white bg_img"
                    data-background="{{ asset('assets/images/banner2.jpg') }}">
            <div class="custom-container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-6 text-center">
                        <div class="banner-content"> --}}
                            {{-- <h2 class="title">World Class Care Right Where You Need It</h2>
                                    <p>Yes! you are in the right place, We deliver a world-class health service with the
                                        help of world-class doctors.</p> --}}
                            {{-- <div class="banner-btn">
                                        <a href="{{ route('book.mentor.list') }}" class="cmn-btn">Make
                            Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div> --}}
    </div>
    <div class="swiper-pagination"></div>
    </div>
</section>

<!-- banner-section end -->
<!-- choose-section start -->
<section class="choose-section ptb-80">
    <div class="container">
        <div class="row justify-content-center align-items-center ml-b-30">
            <div class="col-lg-6 mrb-30">
                <img src="{{ asset('assets/images/startup_logo.png') }}" alt="">
            </div>
            <div class="col-lg-6 mrb-30">
                <div class="choose-left-content">
                    <h2 class="title">What is StartUp Clinic?</h2>
                    <p>StartUp Clinic is a globally recognized market leader in Business, with leading business
                        professionals
                        represented across each business specialty. StartUp Clinic delivers, enables, and empowers care
                        services
                        that span every state in a person&#039;s health journey -from wellness and prevention to acute
                        care to complex healthcare needs. Our site uses proprietary health signals and personalized
                        interactions to drive better health outcomes across the full continuum of care.</p>

                </div>
            </div>

        </div>
    </div>
</section>

<section class="choose-section " >
    {{-- <div class="container"> --}}
        <div class="card">
            <div class="row justify-content-center align-items-center m-5">
                <div class="col-sm-4  text-center border">
                    <div class="m-5">
                        <h3></h3>
                        <h2>EnterPrener Sign Up</h2>
                        <h6></h6>
                        <button class="btn btn-md " style="border: 1px solid black"> <a href="{{url('login')}}">Sign Up</a></button>
                    </div>
                </div>
                <div class="col-sm-4  text-center" style="background-color: #118b57">
                    <div class="m-5">
                        <h3 class="text-light"></h3>
                        <h2 class="text-light">Mentor Sign Up</h2>
                        <h6 class="text-light"></h6>
                        <button class="btn btn-md text-light border" style="border: 1px solid white"><a href="{{url('mentor')}}">Sign Up</a></button>
                    </div>
                </div>
                {{-- <div class="col-sm-4 text-center border">
                    <div class="m-5">
                        <h3>User Type</h3>
                        <h1>Team</h1>
                        <h6>(Enterprener)</h6>
                        <button class="btn btn-md" style="border: 1px solid black"> Sign Up</button>
                    </div>
                </div> --}}
            </div>
        </div>
    {{-- </div> --}}
</section>


@endsection
