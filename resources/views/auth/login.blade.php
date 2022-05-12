{{-- @extends('layouts.app') --}}

<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docrib - Login</title>
    <!-- site favicon -->
    <link rel="shortcut icon" type="image/png" href="https://script.viserlab.com/docrib/assets/images/logoIcon/favicon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap">
    <!-- bootstrap 4  -->
    <!-- <link rel="stylesheet" href="https://script.viserlab.com/docrib/assets/staff/css/vendor/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{ asset('assets/staff/css/vendor/bootstrap.min.css') }}">
    <!-- bootstrap toggle css -->
    <!-- <link rel="stylesheet" href="https://script.viserlab.com/docrib/assets/staff/css/vendor/bootstrap-toggle.min.css"> -->
    <link rel="stylesheet" href="{{ asset('assets/staff/css/vendor/bootstrap-toggle.min.css') }}">
    <!-- fontawesome 5  -->
    <!-- <link rel="stylesheet" href="https://script.viserlab.com/docrib/assets/staff/css/all.min.css"> -->
    <!-- <link rel="stylesheet" href="assets/staff/css/all.min.css"> -->
    <link rel="stylesheet" href="{{ asset('assets/templates/basic/css/fontawesome-all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/templates/basic/css/all.min.css') }}">
    <!-- line-awesome webfont -->
    <!-- <link rel="stylesheet" href="https://script.viserlab.com/docrib/assets/staff/css/line-awesome.min.css"> -->
    <link rel="stylesheet" href="{{ asset('assets/staff/css/line-awesome.min.css') }}">


    <!-- custom select box css -->
    <!-- <link rel="stylesheet" href="https://script.viserlab.com/docrib/assets/staff/css/vendor/nice-select.css"> -->
    <link rel="stylesheet" href="{{ asset('assets/staff/css/vendor/nice-select.css') }}">
    <!-- code preview css -->
    <!-- <link rel="stylesheet" href="https://script.viserlab.com/docrib/assets/staff/css/vendor/prism.css"> -->
    <link rel="stylesheet" href="{{ asset('assets/staff/css/vendor/prism.css') }}">
    <!-- select 2 css -->
    <link rel="stylesheet" href="{{ asset('assets/staff/css/vendor/select2.min.css') }}">
    <!-- data table css -->
    <link rel="stylesheet" href="{{ asset('assets/staff/css/vendor/datatables.min.css') }}">
    <!-- jvectormap css -->
    <link rel="stylesheet" href="{{ asset('assets/staff/css/vendor/jquery-jvectormap-2.0.5.css') }}">
    <!-- datepicker css -->
    <link rel="stylesheet" href="{{ asset('assets/staff/css/vendor/datepicker.min.css') }}">
    <!-- timepicky for time picker css -->
    <link rel="stylesheet" href="{{ asset('assets/staff/css/vendor/jquery-timepicky.css') }}">
    <!-- bootstrap-clockpicker css -->
    <link rel="stylesheet" href="{{ asset('assets/staff/css/vendor/bootstrap-clockpicker.min.css') }}">
    <!-- bootstrap-pincode css -->
    <link rel="stylesheet" href="{{ asset('assets/staff/css/vendor/bootstrap-pincode-input.css') }}">
    <!-- dashdoard main css -->
    <link rel="stylesheet" href="{{ asset('assets/staff/css/app.css') }}">


    </head>
<body>

<div class="page-wrapper default-version">
    <div class="form-area bg_img" data-background="https://script.viserlab.com/docrib/assets/staff/images/1.jpg">
        <div class="form-wrapper">
            <a href="{{url('/')}}">
                <img src="{{asset('assets/images/logo.png')}}" alt="" srcset=""></a>
                <br>
            <h4 class="logo-text mb-15">Welcome to <strong>Docrib</strong></h4>
            <p>Login to Dashboard</p>
            <form method="POST" action="{{ route('login') }}" class="cmn-form mt-30 route">
                @csrf
                <div class="form-group">
                    <input id="username" type="email" class="form-control b-radius--capsule @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control b-radius--capsule @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">

                </div>

                <div class="form-group d-flex justify-content-between align-items-center">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                </div>
                <div class="form-group d-flex justify-content-between align-items-center">
                    <a class="text-muted text--small forget"></i>
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    </a>
                </div>
                <div class="form-group">
                    <button type="submit" class="submit-btn mt-25 b-radius--capsule">Login <i
                            class="las la-sign-in-alt"></i></button>
                </div>
            </form>
        </div>
    </div><!-- login-area end -->
</div>



<!-- jQuery library -->
<script src="https://script.viserlab.com/docrib/assets/staff/js/vendor/jquery-3.5.1.min.js"></script>
<!-- bootstrap js -->
<script src="https://script.viserlab.com/docrib/assets/staff/js/vendor/bootstrap.bundle.min.js"></script>
<!-- bootstrap-toggle js -->
<script src="https://script.viserlab.com/docrib/assets/staff/js/vendor/bootstrap-toggle.min.js"></script>

<!-- slimscroll js for custom scrollbar -->
<script src="https://script.viserlab.com/docrib/assets/staff/js/vendor/jquery.slimscroll.min.js"></script>
<!-- custom select box js -->
<script src="https://script.viserlab.com/docrib/assets/staff/js/vendor/jquery.nice-select.min.js"></script>


<link rel="stylesheet" href="https://script.viserlab.com/docrib/assets/staff/css/iziToast.min.css">
<script src="https://script.viserlab.com/docrib/assets/staff/js/iziToast.min.js"></script>


<script>
    "use strict";

    function notify(status,message) {
        iziToast[status]({
            message: message,
            position: "topRight"
        });
    }
</script>

<script src="https://script.viserlab.com/docrib/assets/staff/js/nicEdit.js"></script>

<!-- code preview js -->
<script src="https://script.viserlab.com/docrib/assets/staff/js/vendor/prism.js"></script>
<!-- seldct 2 js -->
<script src="https://script.viserlab.com/docrib/assets/staff/js/vendor/select2.min.js"></script>
<!-- data-table js -->
<script src="https://script.viserlab.com/docrib/assets/staff/js/vendor/datatables.min.js"></script>
<!-- main js -->
<script src="https://script.viserlab.com/docrib/assets/staff/js/app.js"></script>


<script type="text/javascript">
    'use strict';
    bkLib.onDomLoaded(function() {
        $( ".nicEdit" ).each(function( index ) {
            $(this).attr("id","nicEditor"+index);
            new nicEditor({fullPanel : true}).panelInstance('nicEditor'+index,{hasPanel : true});
        });
    });
</script>

    <script>
        'use strict';
        $(document).ready(function(){

            var elemData = $( "#access" );
            var elem = elemData.find('option:selected');
            var resourse = elemData.find('option:selected').data('route');
            var forget = elemData.find('option:selected').data('forget');
            $('.route').attr('action',resourse);
            $(".forget").attr("href", forget);

            $('input[name=username]').val(elem.data('username'));
            $('input[name=password]').val(elem.data('password'));

            $( "#access" ).on('change',function() {
                var elem = $(this).find('option:selected');
                var resourse = $(this).find('option:selected').data('route');
                var forget = $(this).find('option:selected').data('forget');
                $('.route').attr('action',resourse);
                $(".forget").attr("href", forget);

                $('input[name=username]').val(elem.data('username'));
                $('input[name=password]').val(elem.data('password'));
            });

            function submitUserForm() {
                var response = grecaptcha.getResponse();
                if (response.length == 0) {
                    document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">Captcha field is required.</span>';
                    return false;
                }
                return true;
            }
            function verifyCaptcha() {
                document.getElementById('g-recaptcha-error').innerHTML = '';
            }
        });
    </script>


</body>
</html>



{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
