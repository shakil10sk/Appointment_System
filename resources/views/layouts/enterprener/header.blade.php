<header class="header-section header-section-two">
    <div class="header">
        <div class="header-bottom-area">
            <div class="container-fluid">
                <div class="header-menu-content">
                    <nav class="navbar navbar-expand-lg p-0">
                        <a class="site-logo site-title" href="{{url('/')}}"><img
                                src="{{ asset('assets/images/logo.png') }}" alt="site-logo"></a>
                        <div class="language-select d-block d-lg-none ml-auto">
                            <select class="nice-select langSel language-select">
                                <option value="en" selected>English</option>
                                <option value="bn">Bangla</option>
                                <option value="hn">Hindi</option>
                            </select>
                        </div>
                        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fas fa-bars"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav main-menu ml-auto mr-auto">
                                <li class="@if(Request::url() === url('/')) active @endif"><a
                                        href="{{url('/')}}">Home</a></li>
                                <li class="@if(Request::url() === route('mentor.list')) active @endif"><a
                                        href="{{ route('mentor.list') }}">Doctors</a></li>
                                <li class=""><a href="#Blog">Blog</a></li>
                                <li class=""><a href="#Contact">Contact</a></li>
                            </ul>
                            <div class="language-select d-none d-lg-block">
                                <select class="nice-select langSel language-select">
                                    <option value="en" selected>English</option>
                                    <option value="bn">Bangla</option>
                                    <option value="hn">Hindi</option>
                                </select>
                            </div>
                            <div class="header-bottom-action">
                                <a href="#Book" class="cmn-btn">Book Now</a>
                            </div>

                            @guest
                            <div class="header-bottom-action">
                                <a href="{{url('login')}}" class="cmn-btn">Login Now</a>
                            </div>
                            <div class="header-bottom-action">
                                <a href="{{url('register')}}" class="cmn-btn">Register Now</a>
                            </div>
                            @else
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle cmn-btn" type="button"
                                    id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

                                    <button class="dropdown-item" type="button"><a
                                            href="{{url('user/profile/'.Auth::user()->id)}}">Profile</a></button>

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    {{-- <button class="dropdown-item" type="button">Another action</button>
                              <button class="dropdown-item" type="button">Something else here</button> --}}
                                </div>
                            </div>
                            @endguest
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
