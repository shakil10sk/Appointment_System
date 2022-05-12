<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#">Mentor</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign Up to start your session</p>

      <form action="{{ url('/mentor/registration-store') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <div class="mb-3">
          <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required>
        </div>
        <div class="mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>
        <div class="mb-3">
            <input type="number" class="form-control" name="phone" placeholder="Enter Your Phone" required>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" name="address" placeholder="Enter Your Address" required>
        </div>

        <div class="mb-3">
            <select class="form-control" name="category" required>
                <option value="">Select Your Category</option>
                <option value="1">Demo1 Category</option>
                <option value="2">Demo2 Category</option>
                <option value="3">Demo3 Category</option>
            </select>
        </div>



        <div class="mb-3">
            <select class="selectpicker form-control" name="spacialist[]" multiple data-live-search="true" required>
                <option>Spacialist1</option>
                <option>Spacialist2</option>
                <option>Spacialist3</option>
                <option>Spacialist4</option>
              </select>
        </div>
        <div class="mb-3">
            <select class="selectpicker form-control" name="available_day[]" multiple data-live-search="true" required>
                <option>Saturday</option>
                <option>Sunday</option>
                <option>Monday</option>
                <option>Tuesday</option>
                <option>Wednesday</option>
                <option>Thusday</option>
                <option>Friday</option>
              </select>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" name="expirenced" placeholder="Enter Your Experienced" required>
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>
        <div class="mb-3">
            <input type="file" class="form-control" name="document" accept="application/pdf, application/vnd.ms-excel" required>
        </div>
        <div class="mb-3">
            <input type="file" class="form-control" name="image" accept="image/png, image/gif, image/jpeg" required>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary float-right">Sign Up</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <!-- /.social-auth-links -->


      <p class="mb-0">

      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })

        //select box
        $('select').selectpicker();


    }
</script>
</body>
</html>
