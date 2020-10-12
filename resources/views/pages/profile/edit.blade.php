
@extends('master')

@section('content')

 <style type="text/css">
   .checkbox_design {
    visibility: visible !important;
   }
 </style>


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
              <h2 class="card-title">Profile Update</h2>
              <a href="{{ route('profile.view') }}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-eye"> View Profile</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{ route('profile.update',$user->id) }}" method="POST" enctype="multipart/form-data" id="myform">
                @csrf
             <div class="row">
                <div class="col-md-6">
                
                <div class="form-group">
                    <label style="font-weight: normal;" for="name">Name<font style="color: red"> *</font></label>
                    <input type="text" style="border: 1px solid #35977D;background-color: #f2f2f2;color: #000000" class="form-control" value="{{ $user->name }}" name="name" id="name" placeholder="Enter name'}}">
                    <font style="color: red">{{ ($errors->has('name')) ? $errors->first('name') : '' }}</font>
                </div>

              </div>


              <div class="col-md-6">
                
                <div class="form-group">
                    <label style="font-weight: normal;" for="email">Email<font style="color: red"> *</font></label>
                    <input type="email" style="border: 1px solid #35977D;background-color: #f2f2f2;color: #000000" class="form-control" id="email" value="{{ $user->email }}" name="email" placeholder=" 'Enter email'}}">
                    <font style="color: red">{{ ($errors->has('email')) ? $errors->first('email') : '' }}</font>
                </div>

              </div>

              <div class="col-md-6">
                
                <div class="form-group">
                    <label style="font-weight: normal;" for="mobile">Mobile<font style="color: red"> *</font></label>
                    <input type="number" style="border: 1px solid #35977D;background-color: #f2f2f2;color: #000000" class="form-control" id="mobile" value="{{ $user->mobile }}" name="mobile" placeholder="umero' : 'Enter mobile'}}">
                </div>

              </div>

              

              <div class="col-md-6">
                
                <div class="form-group">
                    <label style="font-weight: normal;" for="gender">Gender<font style="color: red"> *</font></label>
                    <select style="border: 1px solid #35977D;background-color: #f2f2f2;color: #000000" name="gender" id="gender" class="form-control">
                      <option value="Male" {{ ($user->gender == 'Male' ? 'selected': '')}}>Male</option>
                      <option value="Female" {{ ($user->gender == 'Female' ? 'selected': '')}}>Female</option>
                    </select>
                </div>

              </div>

              <div class="col-md-6">
                
                <div class="form-group">
                    <label style="font-weight: normal;" for="address">Address<font style="color: red"> *</font></label>
                    <input type="text" style="border: 1px solid #35977D;background-color: #f2f2f2;color: #000000" class="form-control" id="address" value="{{ $user->address }}" name="address" placeholder="ter address'}}">
                </div>

              </div>

              <div class="col-md-6">
                
                <div class="form-group">
                    <label style="font-weight: normal;" for="image">Image</label>
                    <input style="border: 1px solid #35977D;background-color: #f2f2f2;color: #000000" type="file" id="image" class="form-control" name="image">
                </div>
                <img id="show-image" src="{{ ($user->image) ? URL::to($user->image) : URL::to('assets/backend/images/no-image.jpeg') }}" style="width: 100px; height: 100px;">

              </div>

              <div class="card-footer text-sm-right">
                  <button type="submit" class="btn btn-info" style="float: right;">Update</button>
            </div>
            </div>
          </form>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
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
      name: {
        required: true,
      },
      mobile: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      address: {
        required: true,
      },

      
    },
    messages: {
      name: {
        required: "Name is required",
      },
      mobile: {
        required: "Mobile is required",
      },
      email: {
        required: "Email is required",
        email: "Please enter a vaild email address"
      },
      address: {
        required: "Address is required",
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