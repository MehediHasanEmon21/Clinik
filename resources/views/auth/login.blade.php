



@extends('layouts.guest')


@section('guest_content')

<div style="color: #35977D" class="admin_text">WELCOME!</div>
<div>
    <form method="POST" action="{{ route('login') }}" id="login-form">
        @csrf
        <div class="form-group">
            <input id="email" type="email" class="form-control"  name="email" placeholder="Email">
            
        </div>
    
        <div class="form-group">
            <input id="password" type="password" class="form-control" name="password"
                 placeholder="Password">

        </div>

        <a href="{{ route('password.request') }}" class="forgot-password" style="color: #35977D"> {{__('Forgot Password')}}? </a>

        <button class="btn" style="color: #35977D; border-color: #35977D" type="submit"> Login </button>
        
    </form>
</div>





  <script type="text/javascript">
      

  $(document).ready(function () {

  $('#login-form').validate({
    rules: {
      
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
      },
      
    },
    messages: {
      email: {
        required: "Email is required",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Password is required",
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


