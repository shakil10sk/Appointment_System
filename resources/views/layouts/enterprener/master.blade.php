
@include('layouts.enterprener.style')

<div class="loader">
    <div class="heartbeatloader">
        <svg class="svgdraw" width="100%" height="100%" viewBox="0 0 150 400">
            <path class="path" d="M 0 200 l 40 0 l 5 -40 l 5 40 l 10 0 l 5 15 l 10 -140 l 10 220 l 5 -95 l 10 0 l 5 20 l 5 -20 l 30 0" fill="transparent" stroke-width="4" stroke="black"/>
        </svg>
        <div class="innercircle"></div>
        <div class="outercircle"></div>
    </div>
</div>

<!-- header-section start -->
@include('layouts.enterprener.header')
<!-- header-section end -->

<a href="#" class="scrollToTop" style="background-color: #118b57;border:1 px solid #118b57"><i class="fa fa-angle-up"></i></a>
    <div class="all-sections">

@yield('main-content')


@include('layouts.enterprener.footer')
@include('layouts.enterprener.script')
