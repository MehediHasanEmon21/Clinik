<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login | ABC Clinic</title>

    <!-- Favicon -->
   <link rel="shortcut icon" href="{{asset('assets/backend/images/clinic.png')}}" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- Styles -->
    <link href="{{ asset('assets/admin/css/app.css') }}" rel="stylesheet">
 {{--    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css')}}"> --}}
   
    <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/message.css')}}">
    {{-- <link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> --}}
    <link href="{{ asset('assets/admin/admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/admin_custom.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/admin/css/admin_style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/admin/css/custom.css') }}" rel="stylesheet">

    
    <link rel="stylesheet" href="{{asset('assets/backend')}}/plugins/fontawesome-free/css/all.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>
    <script src="{{asset('assets/backend')}}/plugins/jquery-validation/jquery.validate.min.js"></script>

{{--     <script src="{{ asset('assets/admin/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.js')}}"></script>
    <script src="{{ asset('assets/admin/js/app.js') }}"></script> --}}
</head>

<body>


<main class="mainContent signup-page" id="mainContent">

    <div class="sign_up">
        <div class="sign_up_left">
            <div class="sign_up_left_inner">
                <a href="/">
                    <img src="{{ URL::to('assets/backend/images/clinic1.png') }}" style="width: 150px; width: 150px" class="boma_logo">
                    <h2 style="color: #35977D" class="chta">
                    
                    </h2>
                </a>
            </div>
        </div>

        <div class="sign_up_right">
            <div class="sign_up_frm common__form">
                @yield('guest_content')
            </div>
        </div>

    </div>
</main>

<footer class="footer" id="footer">
    <div class="container-fluid">
        <div class="footer__sortlink">

            <ul>
                {{-- <li class="copyright"><strong>Hoiwa</strong>&copy; {{now()->year}}</li>
                <li><a href="{{ route('privacy.policy') }}">@if($language == 'finish') Tietosuojakäytäntö @else {{ __('Privacy Policy')}}@endif</a></li>
                <li><a href="{{ route('cookie.policy') }}">@if($language == 'finish') Evästekäytäntö @else {{ __('Cookie Policy')}} @endif</a></li>
                <li><a href="{{ route('copyright.policy') }}">@if($language == 'finish')Tekijänoikeuskäytäntö @else {{ __('Copyright Policy')}} @endif</a></li>
                <li><a href="javascript:void(0);">@if($language == 'finish') Lähetä palautetta @else {{ __('Send Feedback')}} @endif</a></li>

                @if($language == 'english')
                <li><a href="{{ route('language.finish') }}">Finish</a></li>
                @else
                <li><a href="{{ route('language.english') }}">English</a></li>
                @endif --}}
                
                
            </ul>

        </div>
    </div>
</footer>

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

<script>
    function contentHeight() {
        var footerHeight, windowHeight, totalHeight;
        footerHeight = $('#footer').innerHeight();
        windowHeight = $(window).innerHeight();
        totalHeight = windowHeight - + footerHeight;
        $('#mainContent').css('min-height', totalHeight);
    }

    contentHeight();

    $(window).resize(function () {
        contentHeight();
    })
</script>
  {{-- <script src="{{ asset('assets/admin/admin/js/jquery.min.js') }}"></script>
  <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
   {!! Toastr::message() !!} --}}
</body>

</html>
