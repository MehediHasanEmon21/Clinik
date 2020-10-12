

@extends('layouts.guest')


@section('guest_content')
<div style="color: #35977D" class="admin_text">{{__('SIGN UP HERE')}}!</div>
<div>
    <form method="POST" action="{{ route('login') }}" id="login-form">
        @csrf
        <div class="form-group">
            <input type="text" name="name" id="name" class="form-control" placeholder="Full Name">
        </div>
        <div class="form-group">
            <input type="text" name="email" id="email" class="form-control" placeholder="Email">
            <font style="color: red">{{ ($errors->has('email')) ? $errors->first('email') : '' }}</font>
        </div>
        <div class="form-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            <font style="color: red">{{ ($errors->has('password')) ? $errors->first('password') : '' }}</font>
        </div>
        <div class="form-group">
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password">
        </div>
        <div class="form-group">
            <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Mobile">
        </div>
        <div class="form-group">
            <input type="text" name="address" id="address" class="form-control" placeholder="Address">
        </div>
         <div class="form-group">
            <select name="gender" class="form-control" style="height: 45px">
                <option  value="" selected="" disabled="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="form-group">
            <input type="file" name="cv" id="cv" class="form-control">
        </div>
    

        <span style="color: #35977D">{{__('Already Have an Account')}}</span>?  <a href="{{ route('login') }}" style="color: #3c4858" class="forgot-password">Click Here</a>

        <button class="btn" style="color: #35977D; border-color: #35977D" type="submit">{{__('Sign Up')}}</button>
    </form>
</div>

  <script type="text/javascript">
      

  $(document).ready(function () {

  $('#login-form').validate({
    rules: {
      name: {
        required: true,
      },
      mobile: {
        required: true,
      },
      address: {
        required: true,
      },
      gender: {
        required: true,
      },
      cv: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 8
      },
      password_confirmation: {
        required: true,
        equalTo: '#password'
      },
    },
    messages: {
      name: {
        required: "Name is required",
      },
      mobile: {
        required: "Mobile no is required",
      },
       address: {
        required: "Address is required",
      },
      cv: {
        required: "CV is required",
      },
      gender: {
        required: "Gender is required",
      },
      email: {
        required: "Email is required",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Password is required",
        minlength: "Your password must be at least 5 characters long"
      },
      password_confirmation: {
        required: "Password confirmation is required",
        equalTo: "Password confirmation does not match"
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});


    </script>



@endsection



{{-- 

<!DOCTYPE html>
<html>
    
<head>
    <title>Signup Form</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{asset('assets/backend')}}/plugins/fontawesome-free/css/all.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
    <style>
        
         body {
      margin: 0;
      padding: 0;
      background-color: #17a2b8;
      height: 100vh;
    }
    #login .container #login-row #login-column #login-box {
      margin-top: 120px;
      max-width: 600px;
      border: 1px solid #9C9C9C;
      background-color: #EAEAEA;
    }
    #login .container #login-row #login-column #login-box #login-form {
      padding: 20px;
    }
    #login .container #login-row #login-column #login-box #login-form #register-link {
      margin-top: -85px;
    }

    </style>


</head>

<body>
<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        
                        <form id="login-form" enctype="multipart/form-data" class="form" action="{{ route('register') }}" method="post">
                            @csrf
                            <h3 class="text-center text-info">SignUp</h3>
                            <div class="form-group">
                                <label for="name" class="text-info">Full name</label><br>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Email</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                                <font style="color: red">{{ ($errors->has('email')) ? $errors->first('email') : '' }}</font>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                                <font style="color: red">{{ ($errors->has('password')) ? $errors->first('password') : '' }}</font>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" class="text-info">Confirm Password:</label><br>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="mobile" class="text-info">Mobile:</label><br>
                                <input type="number" name="mobile" id="mobile" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="address" class="text-info">Address:</label><br>
                                <input type="text" name="address" id="address" class="form-control">
                            </div>
                             <div class="form-group">
                                <label class="text-info">Gender:</label><br>
                                <select name="gender" class="form-control">
                                    <option  value="" selected="" disabled="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="cv" class="text-info">Upload CV:</label><br>
                                <input type="file" name="cv" id="cv" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                                <i class="fa fa-user"> Have you account ? <a href="{{route('login') }}">Login Here</a></i>
                            </div>
                          
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/backend')}}/plugins/jquery/jquery.min.js"></script>
    <script src="{{asset('assets/backend')}}/plugins/jquery-validation/jquery.validate.min.js"></script>
</body>
</html>

  <script type="text/javascript">
      

  $(document).ready(function () {

  $('#login-form').validate({
    rules: {
      name: {
        required: true,
      },
      mobile: {
        required: true,
      },
      address: {
        required: true,
      },
      gender: {
        required: true,
      },
      cv: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 8
      },
      password_confirmation: {
        required: true,
        equalTo: '#password'
      },
    },
    messages: {
      name: {
        required: "Name is required",
      },
      mobile: {
        required: "Mobile no is required",
      },
       address: {
        required: "Address is required",
      },
      cv: {
        required: "CV is required",
      },
      gender: {
        required: "Gender is required",
      },
      email: {
        required: "Email is required",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Password is required",
        minlength: "Your password must be at least 5 characters long"
      },
      password_confirmation: {
        required: "Password confirmation is required",
        equalTo: "Password confirmation does not match"
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});


    </script> --}}







