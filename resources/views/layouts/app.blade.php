
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{asset('assets/admin')}}/images/favicon.png" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/app/css/fontawesome.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/loading-bar.css')}}"/>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/app/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <link rel="stylesheet" href="{{ asset('assets/app/css/custom.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/app/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/app/css/message.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/app/css/croppie.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/app/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/app/css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/app/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/app/css/responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha256-rByPlHULObEjJ6XQxW/flG2r+22R5dKiAoef+aXWfik=" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />


    <style>

        .sweet-alert .sa-icon.sa-success .sa-placeholder {
            border: 4px solid #F6AE2D;
        }

        .sweet-alert .sa-icon.sa-success .sa-line{
            background-color: #3949AB !important;
        }

        .sweet-alert h2{
            padding-top: 10px;
            color: #F6AE2D;
            padding-bottom: 10px;
        }

        .sweet-alert p {
            margin: 0;
            padding-bottom: 10px;
            color: #000000;
        }

        

        .btn.active.focus, .btn.active:focus, .btn.focus, .btn:active.focus, .btn:active:focus, .btn:focus {
                outline: none;

            }

        .sa-button-container .sa-confirm-button-container button {
            background: #F6AE2D;
            margin-top: 10px;
            border: 1px solid #F6AE2D;
            border-radius: 3px;

        }

        .sa-button-container .sa-confirm-button-container button:active {
            background: #F6AE2D;
            border-color: #F6AE2D;
        }

    


        .pac-container {
            z-index: 10000 !important;
        }

        /* Small device */

        @media(min-width: 576px){

            #profile_nav {
                position: relative;
            }

            #profile_dropdown {
                position: absolute;
                top: 58px;
                background: #FFF;
            }

            #profile_dropdown li {
                border-bottom: 1px solid #ccc;
            }

            .profile_share_button_group {
                display: flex;
                width: auto;
                justify-content: flex-start !important;
            }

            #profile_dropdown li a {
                /*color: #333;*/
            }
        }

        /* Medium device */
        @media(min-width: 768px){
            #profile_nav {
                position: relative;
            }

            #profile_dropdown {
                position: absolute;
                top: 64px;
            }

            .profile_share_button_group {
                display: flex;
                width: auto;
                justify-content: flex-start !important;
            }
        }

        /* Large device */
        @media(min-width: 992px){
            #profile_nav {
                position: relative;
            }

            #profile_dropdown {
                position: absolute;
                top: 64px;
            }

            .profile_share_button_group {
                display: flex;
                width: auto;
                justify-content: flex-end !important;
            }
        }

        /* Extra Large device */
        @media(min-width: 1200px){
            #left_sidebar{
                position: sticky;
                top: 100px;
                left: 0;

            }



            #right_sidebar{
                position: sticky;
                top: 100px;
                right: 0;
            }

            #profile_nav {
                position: relative;
            }

            #profile_dropdown {
                position: absolute;
                top: 70px;
            }

            .profile_share_button_group {
                display: flex;
                width: auto;
                justify-content: flex-end !important;
            }
        }

        /* Extra Small device */
        @media(max-width:575px){

            #profile_nav {
                position: relative;
            }

            #profile_dropdown {
                position: absolute;
                top: 54px;
                background: #FFF;
            }

            #profile_dropdown li {
                border-bottom: 1px solid #ccc;
            }

            #profile_dropdown li a {
                /*color: #333;*/
            }

            .profile_share_button_group {
                display: flex;
                width: auto;
                justify-content: flex-start !important;
            }
        }

        @media (min-width: 100px) and (max-width: 575px) {

            #mobile_view{
                position: relative;
            }

            .give_feedback_btn{
                display: none;
            }

            #updated_btn_design{
                padding-left: 10px;
                padding-right: 10px;
            }


            .profile_share_button_group {
                display: flex;
                width: auto;
                justify-content: center !important;
            }

            .empty_opportunities__box {
                width: auto;
            }
            .empty_opportunities__box p{
                margin-bottom: -22px;
            }

            .notification_badge{
                left: 0;
                top: 20px;
                text-align: center;
            }

            .message_badge{
                left: 0;
                top: 20px;
                text-align: center;
            }

            .mobile_badge{
                left: 20px;
                text-align: center;
                color: #ffffff;
                position: absolute;
                background-color: #952038;
                width: 21px;
                height: 19px;
                border-radius: 10px;
                top: 7px;
                font-size: 15px;
                line-height: 20px;
            }


        }

        @media (min-width: 575px) and (max-width: 760px) { 
            
            .notification_badge{
                left: 0;
                top: 18px;
                text-align: center;
            }

            .message_badge{
                left: 0;
                top: 18px;
                text-align: center;
            }

            .mobile_badge{
                left: 10px;
                text-align: center;
                color: #ffffff;
                position: absolute;
                background-color: #952038;
                width: 21px;
                height: 19px;
                border-radius: 10px;
                top: 12px;
                font-size: 15px;
                line-height: 16px;
            }

        }

        #business_leftsidebar{
                position: sticky;
                top: 30px;
                left: 0;

            }

            

     #business-right-sidebar{
                position: sticky;
                top: 30px;
                right: 0;
            }

        #upload-file{
            height: 174px;

            border: 1px dashed #ccc;

            width: 372px;

            margin-left: 13px;

            text-align: center;

            padding-top: 45px;
        }

        #upload-file span i{
            font-size: 25px;
        }

        #upload-file p{
            padding-top: 7px;
            color: #333;
        }

        .btn-info {

            color:#fff;
            background-color: #867452;
            border-color: #867452;

        }

        .btn-info:hover {
            background-color: #867452;
            border-color: #867452;
        }
        .thumbnail{
            float:left !important;
        }

        .bud{
            position: absolute;
            top: 46px;
            left: 15px;
            width: 380px;
            height: 65px;
            border: 1px solid black;
            border-color: #ccc;
            background: #FFFFFF;
            border-radius: 2px;
        }
        .bud_click {
            position: relative;
            width: 194px;
            height: 35px;
            border: 1px solid;
            border-color: #ccc;
        }


    </style>
  
</head>

<body id="body">


    




    

    <header class="header" id="header">
        <div class="navTop">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ URL::to('assets/admin/images/hoiwa.png') }}" class="main_logo"></a>
            </div>
        </div>
        <div class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ URL::to('assets/admin/images/hoiwa.png') }}" class="main_logo"></a>
                </div>
                <div class="navbar-collapse" id="navbar-main">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="pull-right">
                            <a href="{{ route('login') }}">
                                {{-- <img src="/img/login.png" style="width: 20px;">
                                <span class="nav-name">{{ __('Login')}}</span> --}}
                            </a>
                        </li>
                    </ul>

                </div>

            </div>
        </div>
    </header>










    @yield('content')



{{-- 
<footer class="footer" id="footer">
    <div class="container-fluid">
        <div class="footer__sortlink DesktopFooter">
            <ul>
                <li class="copyright"><strong>Boma</strong>Link &copy; {{now()->year}}</li>
                <li>
                    <a data-toggle="collapse" data-target="#policy_collaps">{{ __('Terms and Policy')}} <i class="fa fa-caret-right"></i></a>

                    <div id="policy_collaps" class="collapse">
                        <ul>
                            <li><a href="{{ route('user.agreement') }}">{{ __('User Agreement')}}</a></li>
                            <li><a href="{{ route('privacy.policy') }}">{{ __('Privacy Policy')}}</a></li>
                            <li><a href="{{ route('community.guidelines') }}">{{ __('Community Guidelines')}}</a></li>
                            <li><a href="{{ route('cookie.policy') }}">{{ __('Cookie Policy')}}</a></li>
                            <li><a href="{{ route('copyright.policy') }}">{{ __('Copyright Policy')}}</a></li>
                        </ul>
                    </div>

                </li>
                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#feedbackModal">{{ __('Send Feedback')}}</a></li>
            </ul>
        </div>
        <div class="footer__sortlink mobileFooter">
            <ul>
                <li class="copyright"><strong>Boma</strong>Link &copy; {{now()->year}}</li>
                <li>
                    <a data-toggle="collapse" data-target="#terms_and_policy_collapse">{{ __('Terms and Policy')}} <i class="fa fa-caret-down"></i></a>

                    <div id="terms_and_policy_collapse" class="collapse">
                        <ul>
                            <li><a href="{{ route('user.agreement') }}">{{ __('User Agreement')}}</a></li>
                            <li><a href="{{ route('privacy.policy') }}">{{ __('Privacy Policy')}}</a></li>
                            <li><a href="{{ route('community.guidelines') }}">{{ __('Community Guidelines')}}</a></li>
                            <li><a href="{{ route('cookie.policy') }}">{{ __('Cookie Policy')}}</a></li>
                            <li><a href="{{ route('copyright.policy') }}">{{ __('Copyright Policy')}}</a></li>
                        </ul>
                    </div>

                </li>
                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#feedbackModal">{{ __('Send Feedback')}}</a></li>
            </ul>
            <ul class="list-inline">
                @foreach (Config::get('languages') as $lang => $language)
                    <li>
                        <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</footer> --}}

<footer class="footer" id="footer">
    <div class="container-fluid">
        <div class="footer__sortlink">

           <ul>
                <li class="copyright"><strong>Hoiwa</strong>&copy; {{now()->year}}</li>
                <li><a href="{{ route('privacy.policy') }}">{{ __('Privacy Policy')}}</a></li>
                <li><a href="{{ route('cookie.policy') }}">{{ __('Cookie Policy')}}</a></li>
                <li><a href="{{ route('copyright.policy') }}">{{ __('Copyright Policy')}}</a></li>
                <li><a href="javascript:void(0);">{{ __('Send Feedback')}}</a></li>
            </ul>

        </div>
    </div>
</footer>

    {{-- Expand Image Modal --}}
    <div id="post-image-modal" class="expand-modal">
        <span class="expand-close">
            &times;
        </span>
        <img class="expand-modal-content" id="post-image-expand">
    </div>
    
    <div class="text-center" id="loaderForMessages">
        <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
    </div>

    <div class="text-center" id="loaderForMediaUpload">
        <div class="mediaLoadingBar label-center" style="width:200px;height:200px">
        </div>
    </div>


</body>

</html>
