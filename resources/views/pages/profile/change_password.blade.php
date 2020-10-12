
@php
    $language = session()->get('lang');
@endphp
@extends('master')

@section('content')


        <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <!-- /.row -->
        <!-- Main row -->
  
<section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <h2 class="card-title">{{ $language == 'finish' ? 'Vaihda salasana' : 'Change Password'}}</h2>
              <a href="{{ route('profile.view') }}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-eye"> {{ $language == 'finish' ? 'Oma profiili' : 'View Profile'}}</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="" method="POST" id="myform">
                @csrf
             <div class="row">
                



               <div class="col-md-6">
                
                <div class="form-group">
                    <label style="font-weight: normal;" for="new_password">{{ $language == 'finish' ? 'Uusi salasana' : 'New Password'}}</label>
                    <input style="border: 1px solid #35977D;background-color: #f2f2f2;color: #000000" type="password" class="form-control" id="new_password" name="new_password" placeholder="{{ $language == 'finish' ? 'Uusi salasana' : 'New Password'}}">
                </div>

              </div>

              <div class="col-md-6">
                
                <div class="form-group">
                    <label style="font-weight: normal;" for="password_confirmation">{{ $language == 'finish' ? 'Vahvista salasanasi' : 'Confirm Password'}}</label>
                    <input style="border: 1px solid #35977D;background-color: #f2f2f2;color: #000000" type="password" class="form-control" name="password_confirmation" id="confirm_password" placeholder="{{ $language == 'finish' ? 'Vahvista salasanasi' : 'Confirm Password'}}">
                </div>

              </div>



             

            </div>
            <!-- /.card-body -->
            <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary">{{ $language == 'finish' ? 'Vaihda salasana' : 'Change Password'}}</button>
            </div>
            </div>
          </form>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
          <!-- /.Left col -->

        </div>

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  <script type="text/javascript">
      

  $(document).ready(function () {

  $('#myform').validate({
    rules: {

      new_password: {
        required: true,
        minlength: 8
      },
      password_confirmation: {
        required: true,
        equalTo: '#new_password'
      },
    },
    messages: {
      new_password: {
        required: "New Password is required",
        minlength: "Your new password must be at least 8 characters long"
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