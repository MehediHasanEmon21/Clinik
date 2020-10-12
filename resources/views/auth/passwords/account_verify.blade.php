
@php
    $language = session()->get('lang');
@endphp

@extends('layouts.guest')

@section('guest_content')
<div class="admin_text" style="color: #35977D;">{{ $language == 'finish' ? 'OTP-KOODI' : 'OTP CODE'}}</div>
<div class="admin_sub_text">{{ $language == 'finish' ? 'Kirjoita sähköpostiosoitteeseesi lähetetyt otp-koodisi vahvistaaksesi tilisi.' : 'Enter your otp code which are sent in your email account for verify your account.'}}</div>
<div>
    <form method="POST" action="{{ route('verify.account.store') }}">
        @csrf
        <div class="form-group reset_center">
            <input type="hidden" name="verify_token" value="{{ $verify_token }}">
            <div class="login_placeholder">
                <input  type="text" required="" class="login_input form-control" 
                name="verify_code"  required autocomplete="email" 
                placeholder="{{ $language == 'finish' ? 'Otp-koodi' : 'Otp Code'}}" autofocus>
            </div>
        </div>
        <div class="form-group">
            <div class="login_button_div">
                <button type="submit" class="btn" style="background-color: #35977D; color: #ffffff">
                    {{ $language == 'finish' ? 'Vahvistaa' : 'Confirm'}}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
