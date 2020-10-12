@extends('master')

@section('content')

<style type="text/css">
  
  .label_design {
    font-weight: normal !important;
  }

  .input_design{
    border: 1px solid #35977D important;
    background-color: #f2f2f2 !important;
    color: #000000!important;
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
              <h2 class="card-title">Add patient</h2>
              <a href="{{ route('patient.view') }}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-list"> All Patient</i></h4></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="{{ route('patient.store') }}" method="POST" id="myform" enctype="multipart/form-data">
                @csrf
             <div class="row">
                <div class="col-md-4">
                  
                  <div class="form-group">
                      <label for="name" class="label_design">Name <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm input_design" name="name" id="name" placeholder="Name">
                      
                  </div>

                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label class="label_design" for="email">Email<font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm input_design" name="email" id="email" placeholder="Email">
                      <font style="color: red">{{ ($errors->has('email')) ? $errors->first('email') : '' }}</font>
                      
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                      <label class="label_design" for="mobile">Mobile No<font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm input_design" name="mobile" id="mobile" placeholder="Mobile">
                      
                  </div>
                </div>

                 <div class="col-md-4">
                  <div class="form-group">
                      <label class="label_design" for="address">Gender <font color="red">*</font></label>
                      <select name="gender" class="form-control form-control-sm input_design">
                      <option value="" selected="">Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      <option value="Others">Others</option>
                      </select>
                  </div>
                </div>

                 <div class="col-md-4">
                  <div class="form-group">
                      <label class="label_design" for="dob">Birth Date<font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm datepicker input_design" name="dob" id="dob" placeholder="yyyy-mm-dd">
                      
                  </div>
                </div>

                 

                


                <div class="col-md-4">
                 <div class="form-group">
                      <label class="label_design" for="age">Age<font color="red">*</font></label>
                      <input type="number" class="form-control form-control-sm input_design" name="age" id="age" placeholder="Age">
                      
                  </div>
                </div>

                   <div class="col-md-6">
                  <div class="form-group">
                      <label class="label_design" for="address">Address<font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm input_design" name="address" id="address" placeholder="Address">
                      
                  </div>
                </div>

               


                <div class="col-md-6">
                  <div class="form-group">

                      <label class="label_design" for="address">Blood Group </label>
                      <select name="blood_group" class="form-control form-control-sm input_design">
                      <option value="" selected="">Select Blood Group</option>
                      <option value="A+">A+</option>
                      <option value="A-">A-</option>
                      <option value="B+">B+</option>
                      <option value="B-">B-</option>
                      <option value="O+">O+</option>
                      <option value="O-">O-</option>
                      <option value="AB+">AB+</option>
                      <option value="AB-">AB-</option>
                      </select>
                      
                  </div>
                </div>

               

                
               

            




                <div class="col-md-4">
                
                  <div class="form-group">
                      <label for="password_confirmation">Picture</label>
                      <input type="file" id="image" class="form-control" name="image">
                  </div>
                

                </div>
                <div class="col-md-4">

                  <img id="show-image" src="{{ URL::to('assets/backend/dist/img/unnamed.jpg') }}" style="width: 60px; height: 60px;">
                  
                </div>

                




             

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-sm">Submit</button>
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
      name: {
        required: true,
      },
      email: {
        required: true,
        email: true,
      },
      dob: {
        required: true,
      },
      age: {
        required: true,
      },
      address: {
        required: true,
      },
      gender: {
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
      dob: {
        required: "Birth day is required",
      },
      age: {
        required: "Age is required",
      },
     
      address: {
        required: "Address is required",
      },
      gender: {
        required: "Gender is required",
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

    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
        });
    </script>

@endsection