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
              <h2 class="card-title">Add Setting</h2>
              {{-- <a href="{{ route('service.view') }}"><h4 class="btn btn-sm btn-success float-right"><i class="fa fa-list"> All Test</i></h4></a> --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="width: 50%;margin: 0 auto;">
              <form action="{{ route('setting.store') }}" method="POST" id="myform" enctype="multipart/form-data">
                @csrf
             <div class="row">
                <div class="col-md-12 col-offset-2">
                  
                  <div class="form-group">
                      <label for="name" class="label_design"> Name <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm input_design" name="name" value="{{ @$setting->name }}" id="name" placeholder="Name">
                      
                  </div>

                </div>

                <div class="col-md-12 col-offset-2">
                  <div class="form-group">
                      <label class="label_design" for="email">Email <font color="red">*</font></label>
                      <input type="email" class="form-control form-control-sm input_design" name="email" id="email" value="{{ @$setting->email }}" placeholder="Email">
                      
                  </div>
                </div>

                <div class="col-md-12 col-offset-2">
                  <div class="form-group">
                      <label class="label_design" for="phone">Phone <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm input_design" name="phone" id="phone" value="{{ @$setting->phone }}" placeholder="Phone">
                      
                  </div>
                </div>

                <div class="col-md-12 col-offset-2">
                  <div class="form-group">
                      <label class="label_design" for="address">Address <font color="red">*</font></label>
                      <input type="text" class="form-control form-control-sm input_design" name="address" id="address" value="{{ @$setting->address }}" placeholder="Address">
                      
                  </div>
                </div>

                <div class="col-md-12 col-offset-2">
                  <div class="form-group">
                      <label class="label_design" for="address">Logo</label>
                     <input type="file" id="image" class="form-control" name="image">
                     <img id="show-image" src="{{ @$setting->image ? URL::to($setting->image) : URL::to('assets/backend/images/no-image.jpeg') }}" style="width: 100px; height: 100px;">
                      
                  </div>
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
      },
      address: {
        required: true,
      },
      phone: {
        required: true,
      },
     
    },
    messages: {

      name: {
        required: "Name is required",
      },
      email: {
        required: "Email is required",
      },
      address: {
        required: "Address is required",
      },
      phone: {
        required: "Phone is required",
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