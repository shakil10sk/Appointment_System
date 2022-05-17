<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>StartUp Clinic | Log in</title>


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

    <style>
        @import url('https://fonts.googleapis.com/css?family=Work+Sans:300,400');

            /* body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
            font-family: 'Work Sans', sans-serif;
            background-color: #1a284f;
            color: white;
            } */

            .wrapper {
                padding: 5px 9px;
                margin: 0;
                /* width: 580px; */
                width: auto;
                background-color: #edeef0;
                border-radius: 30px;
                display: flex;
                align-items: center;
                flex-flow: row wrap;
                border: solid 2px white;
            }

            .wrapper h3 {
                margin: 5px 7px 5px 2px;
                font-weight: 300;
                font-size: 20px;
            }

            .wrapper p {
                margin: 10px 10px;
                font-weight: 300;
                font-size: 12px;
                opacity: 0.8;
                letter-spacing: 1px;
            }

            .wrapper input {
                border: none;
                border-radius: 12px;
                padding: 8px 10px;
                margin: 4px;
                width: 100%;
                color: #666;
                font-family: 'Work Sans', sans-serif;
                font-size: 13px;
                outline: none;
            }

            .tag-container {
            display: flex;
            flex-flow: row wrap;
            }

            .tag{
            pointer-events: none;
            background-color: #242424;
            color: white;
            padding: 6px;
            margin: 5px;
            }

            .tag::before {
            pointer-events: all;
            display: inline-block;
            content: 'x';
            height: 20px;
            width: 20px;
            margin-right: 6px;
            text-align: center;
            color: #ccc;
            background-color: #111;
            cursor: pointer;
            }

    </style>

</head>
<body class="hold-transition">
<div class="row">
    <div class="col-md-8 mx-auto">
        <br>
        <div class="login-logo">
            <a href="{{url('/mentor')}}" class="btn btn-info">Sign In</a>
          </div>
          <!-- /.login-logo -->
          @if ($errors->has('error'))
            <span class="error text-danger">{{ $errors->first('error') }}</span>
         @endif

          <div class="card card-warning">
            <div class="card-header">
              <h4 class="">Mentor Registration</h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{ url('/mentor/registration-store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                      <label>Full Name<span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="full_name" required name="full_name" placeholder="Enter Your Full Name">
                    </div>
                  </div>

                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                      </div>
                  <div class="col-sm-6">
                    <!-- textarea -->
                    <div class="form-group">
                      <label>Phone<span class="text-danger">*</span></label>
                      <input type="number" class="form-control" name="phone" placeholder="Enter Your Phone" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                          <label>Address<span class="text-danger">*</span></label>
                          <textarea class="form-control" rows="3" name="address" required placeholder="Enter Your Full Address"></textarea>
                        </div>
                      </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                          <label>District <span class="text-danger">*</span></label>
                          <select required class="form-control" id="district" name="district_id" onchange="getThana(this.value)">
                            <option selected value="">Select District</option>
                            @foreach ($district_location as $district)
                                <option value="{{$district->id}}">{{$district->en_name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                          <label>Thana <span class="text-danger">*</span></label>
                          <select required class="form-control" name="thana_id" id="thana">
                            <option selected value="">Select Thana</option>
                          </select>
                        </div>
                      </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- select -->
                        <div class="form-group">
                            <label>Category <span class="text-danger">*</span></label>
                            <select required class="form-control" name="category_id" >
                              <option selected value="">Select Category</option>
                              @foreach ($category as $cat_item)
                                  <option value="{{$cat_item->id}}">{{$cat_item->category_name}}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="wrapper">
                                <h3>Specialist</h3>
                                <p class="info">Type your Specialist hashtag & click enter.</p>
                                <input type="text" id="hashtags"  autocomplete="off">
                                <div class="tag-container">
                                </div>
                                <input type="hidden" name="specialist[]" id="specialist">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card p-5 input_fields_wrap">
                    <div class="row">
                        <div class="col-sm-3">
                            <!-- select -->
                            <div class="form-group">
                                <select required class="form-control" name="avilable_day[]" id="avilable_day" >
                                  <option selected value="">Select Day <span class="text-danger">*</span></option>
                                  <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                </select>
                              </div>
                          </div>
                        <div class="col-sm-3">
                            <!-- select -->
                            <div class="form-group">
                                <label>Start Time <span class="text-danger">*</span></label>
                                <input type="time" required name="start_time[]" id="start_time">
                              </div>
                          </div>
                        <div class="col-sm-3">
                            <!-- select -->
                            <div class="form-group">
                                <label>End Time <span class="text-danger">*</span></label>
                                <input type="time" required name="end_time[]" id="end_time">
                              </div>
                          </div>

                          <button style="background-color:green;" class="add_field_button btn btn-sm m-2 btn-info active"><i class="fa fa-plus"></i></button>
                          <span class="text-danger" id="avilable_day_error"></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label class="col-form-label" for="time_limit">Time Limit <span class="text-danger">*</span></label>
                        <input type="text" required name="time_limit" id="time_limit"class="form-control is-valid" placeholder="Enter Time Limit For a Appointment">
                    </div>
                    <div class="col-sm-6">
                        <label class="col-form-label" for="inputSuccess">Fee <span class="text-danger">*</span></label>
                          <input type="number" name="fee" required class="form-control is-valid" id="inputSuccess" placeholder="Enter Per Appointment Fee. Ex.- 150">
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-sm-6">
                        <label class="col-form-label" for="image">Profile Picture <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="image" accept="image/*" required>

                    </div>
                    <div class="col-sm-6">
                        <label class="col-form-label" for="document">Document If Have (pdf,excel)<span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="document" accept="application/pdf, application/vnd.ms-excel" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="password" class="col-form-label">Password:</label>
                            <input type="password" class="form-control" id="password" >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="pwd" class="col-form-label">Confirm Password:</label>
                            <input type="password" class="form-control" id="confirm_password" onkeyup="checkConfirmPassword(this.value)" name="password">
                        </div>
                    </div>
                    <div id="errorPassword"></div>
                </div>

                <div class="row p-5">
                     <!-- /.col -->
                    <div class="col-12">
                        <div class=" float-right">
                            <button type="submit" class="btn btn-primary btn-md">Sign Up</button>
                        </div>
                    </div>
                </div>

              </form>
            </div>
            <!-- /.card-body -->
          </div>




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


    })

    function getThana(value){

        $.ajax({
            url: "{{url('/mentor/getupazila')}}",
            type:'post',
            data:{
                "id": value,
                "_token": "{{ csrf_token() }}",
            },
            success:function(res){
                let selector = `<option value="" selected>Select Thana</option>`;
                if(res.status == 'success'){
                    res.data.forEach(function(item){
                        selector += `<option value="${item.id}">${item.en_name}</option>`;
                    })
                    $("#thana").html(selector);
                }
            }
        })
    }

    $(document).ready(function () {
            var max_fields = 15;
            var wrapper = $(".input_fields_wrap");
            var add_button = $(".add_field_button");
            var x = 1; //initlal text box count



            $(add_button).click(function (e) {
                e.preventDefault();
                if($("#avilable_day").val() == ""){
                    $("#avilable_day_error").text("Pleaes Select Day, start time and end time");
                    return
                }
                if (x < max_fields) {
                    x++;
                    $(wrapper).append(`
                            <div class="row">
                                <div class="col-sm-3">
                                    <!-- select -->
                                    <div class="form-group">
                                        <select required class="form-control" name="avilable_day[]" id="avilable_day" >
                                        <option selected value="">Select Day <span class="text-danger">*</span></option>
                                        <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
                                            <option value="Sunday">Sunday</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Start Time <span class="text-danger">*</span></label>
                                        <input type="time" name="start_time[]" id="start_time">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>End Time <span class="text-danger">*</span></label>
                                        <input type="time" name="end_time[]" id="end_time">
                                    </div>
                                </div>

                                {{-- <div class="col-sm-3">
                                    <button type="button" class="btn btn-md btn-info" onclick="setAvialbleDay()">Add More Day</button>
                                </div> --}}

                                <div style="cursor:pointer;background-color:red;" class="remove_field btn btn-info">Remove</div>

                            </div>
                        `
                        );
                }
            });
            $(wrapper).on("click", ".remove_field", function (e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });
</script>

<script>
    let input, hashtagArray, container, t;

    input = document.querySelector('#hashtags');
    container = document.querySelector('.tag-container');

    hashtagArray = [];
    let inputValue = [];
    input.addEventListener('keyup', () => {
        if (event.which == 13 && input.value.length > 0) {
        var text = document.createTextNode(input.value);
        // var inputValue = inputValue.push(document.createTextNode(input.value));
        var p = document.createElement('p');
        container.appendChild(p);
        p.appendChild(text);
        p.classList.add('tag');

        inputValue.push(input.value);

        input.value = '';


        let deleteTags = document.querySelectorAll('.tag');

        for(let i = 0; i < deleteTags.length; i++) {
            deleteTags[i].addEventListener('click', () => {
            container.removeChild(deleteTags[i]);
            });
        }
    }
    $("#specialist").val(inputValue);

});

function checkConfirmPassword(value){
    var password = $("#password").val() || 0;
    if(value !== password){
        $("#errorPassword").text('<span class="text-danger">password did not match </span>');
    }else{
        $("#errorPassword").text(`<span class="text-success">password Match </span>`);
    }
}
</script>
</body>
</html>
