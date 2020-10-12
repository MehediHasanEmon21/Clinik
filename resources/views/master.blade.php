<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard | ABC clinic</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{asset('assets/backend/images/clinic.png')}}" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/backend')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('assets/backend')}}/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('assets/backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('assets/backend')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <link rel="stylesheet" href="{{asset('assets/backend')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/backend')}}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('assets/backend')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('assets/backend')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('assets/backend')}}/plugins/summernote/summernote-bs4.css">

  <link rel="stylesheet" href="{{asset('assets/backend')}}/plugins/timepicker/jquery.timepicker.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/backend')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('assets/backend')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/admin/css/app.css') }}" rel="stylesheet">
  <!-- jQuery -->
<script src="{{asset('assets/backend')}}/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="{{asset('assets/backend')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('assets/backend')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('assets/backend')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('assets/backend')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<link rel="stylesheet" href="{{asset('assets/backend')}}/plugins/select2/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script src="{{asset('assets/backend')}}/plugins/timepicker/jquery.timepicker.min.js"></script>

  <style type="text/css">
    .select2-selection {
      height: 38px !important;
    }
      #loader {
      position: fixed;
      top: 0;
      z-index: 2222222;
      background: #3949ABc2 !important;
      left: 0;
      bottom: 0;
      right: 0;
      justify-content: center;
      vertical-align: middle;
      align-items: center;
      display: none;
    }
    #loader .fa-spinner {
        color: white !important;

    }

     @media (min-width: 300px) and (max-width: 792px){

        #datepicker_start_date {
          margin-bottom: 10px;
        }

        #datepicker_end_date {
          margin-bottom: 10px;
        }

        
      

     }
  }
  </style>
  <style type="text/css">
    
    [class*=sidebar-dark-] {
      background-color: #35977D !important; 
    }

    .main-footer{
      background-color: #0D4B55 !important;
      padding-bottom: 0;
    }

  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
@php
    $language = session()->get('lang');
@endphp
  <nav class="main-header navbar navbar-expand navbar-primary navbar-dark" style="background-color: #35977D">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a @if(Auth::user()->userType == 'admin') href="{{ url('/admin/dashboard') }}" @else href="{{ url('/nurse/dashboard') }}"  @endif class="nav-link">{{ $language == 'finish' ? 'Kotisivu' : 'Home'}}</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <!-- Notifications Dropdown Menu -->
    
    @if(Auth::user()->userType == 'nurse')
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input {{ Auth::user()->status == 0 ? 'disabled' : '' }} id="search_form" class="form-control form-control-navbar"  type="search" placeholder="{{ $language == 'finish' ? 'Haku' : 'Search'}}" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" @if(Auth::user()->status == 1) type="button" @else type="button" @endif>
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    @endif

     {{--  <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> --}}

     {{--   <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-language"></i> {{ $language == 'finish' ? 'Kieli' :  'Language'}}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{ $language == 'finish' ? 'Vaihda kieltä' :  'Change Language'}}</span>
          <div class="dropdown-divider"></div>
          <a href="{{ route('language.english') }}" class="dropdown-item">
             English
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('language.finish') }}" class="dropdown-item">
             Finish
          </a>
          
          
        </div>
      </li> --}}

        <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          @php
            $auth_user = Auth::user();
          @endphp
          <img src="{{ ($auth_user->image) ? URL::to($auth_user->image) : URL::to('assets/admin/images/default_avatar.png') }}" style="height: 30px; width: 32px; margin-right: 6px;" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">{{Auth::user()->name}}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{ $language == 'finish' ? 'Tilin asetukset' : 'Account Setting'}}</span>
          <div class="dropdown-divider"></div>
          <a href="{{ route('profile.view') }}" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> {{ $language == 'finish' ? 'Oma profiili' : 'View Profile'}}
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('profile.edit',Auth::user()->slug) }}" class="dropdown-item">
            <i class="fas fa-edit mr-2"></i> {{ $language == 'finish' ? 'Muokkaa profiili' : 'Edit Profile'}}
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('password.change') }}" class="dropdown-item">
            <i class="fas fa-lock mr-2"></i> {{ $language == 'finish' ? 'Vaihda salasana' : 'Change Password'}}
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> {{ $language == 'finish' ? 'Kirjaudu ulos' : 'Logout'}}
            
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </li>

      
    </ul>
  </nav>



  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a @if(Auth::user()->userType == 'admin') href="{{ url('/admin/dashboard') }}" @endif @if(Auth::user()->userType == 'nurse') href="{{ url('nurse/dashboard') }}" @endif class="brand-link">
      <img src="{{asset('assets/admin')}}/images/favicon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><strong>ABC Clinic</strong></span>
    </a>
    <input type="hidden" name="auth_user_id" value="{{ Auth::user()->id }}" id="auth_user_id">
    <!-- Sidebar -->
    <div class="sidebar">
     

      <!-- Sidebar Menu -->
      @if(Auth::user()->userType == 'admin')
      @include('include.navbar')
      @endif
      @if(Auth::user()->userType == 'nurse')
      @include('include.nurse_navbar')
      @endif
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="main_content">
      @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer" id="footer" style="padding: 0">
    <div class="container-fluid">
        <div class="footer__sortlink">
            <ul>
               {{--  <li style="color: #ffffff" class="copyright"><strong>Hoiwa</strong>&copy; {{now()->year}}</li>
                <li><a style="color: #ffffff" href="{{ route('privacy.policy') }}">@if($language == 'finish') Tietosuojakäytäntö @else {{ __('Privacy Policy')}}@endif</a></li>
                <li><a style="color: #ffffff" href="{{ route('cookie.policy') }}">@if($language == 'finish') Evästekäytäntö @else {{ __('Cookie Policy')}} @endif</a></li>
                <li><a  style="color: #ffffff" href="{{ route('copyright.policy') }}">@if($language == 'finish')Tekijänoikeuskäytäntö @else {{ __('Copyright Policy')}} @endif</a></li>
                <li><a style="color: #ffffff" href="javascript:void(0);">@if($language == 'finish') Lähetä palautetta @else {{ __('Send Feedback')}} @endif</a></li> --}}
                
            </ul>
            {{-- <p style="margin: 0; color: #fffff" class="text-right"><small><span style="color: #ffffff">Developed By</span> <a href="http://decode-lab.com/">Decode Lab</a></small></p> --}}
        </div>
    </div>
    
</footer>

<div class="text-center" id="loader">
        <p style="position: absolute;top: 50%;left: 50%;">
        <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
      </p>
</div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@if(session()->has('success'))
<script type="text/javascript">
  $(function(){
    $.notify("{{ session()->get('success') }}",{globalPosition: 'top right', className: 'success'})
  })


</script>
@endif

@if(session()->has('error'))
<script type="text/javascript">
  $(function(){
    $.notify("{{ session()->get('error') }}",{globalPosition: 'top right', className: 'error'})
  })


</script>
@endif

<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets/backend')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/backend')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/backend')}}/plugins/select2/select2.full.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('assets/backend')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('assets/backend')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('assets/backend')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('assets/backend')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('assets/backend')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('assets/backend')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('assets/backend')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets/backend')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('assets/backend')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets/backend')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/backend')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('assets/backend')}}/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/backend')}}/dist/js/demo.js"></script>
<script src="{{asset('assets/backend')}}/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{asset('assets/backend')}}/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>
<script src="{{asset('assets/backend')}}/plugins/select2/js/select2.full.min.js"></script>

<script>
  $(function () {
  
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

     $('.select2').select2()
  });
</script>


    <script type="text/javascript">
      
      $(document).on('click','#delete',function(e){
        e.preventDefault()
        var link = $(this).attr('href')
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
              window.location.href = link
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
          })

      })

    </script>

        <script>

        $('#image').on('change',function(e){
              console.log(e)
        
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#show-image')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            };


              reader.readAsDataURL(e.target.files[0]);



        })
      

    </script>

    <script>
      
      $(document).ready(function(){

        $(document).on('keyup','#search_form',function(){
          var search = $(this).val();
          var auth_user_id = $('#auth_user_id').val();
          $.ajax({
            method: 'POST',
            data: {
              search: search,
              auth_user_id: auth_user_id,
            },
            url: '/api/gig/search',
            beforeSend: function(){

            },
            success: function(data){
              $('#gig_content').html(data)
            }
          })
        })

      })

    </script>

    <script>
      
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    </script>

   
  
</body>
</html>

