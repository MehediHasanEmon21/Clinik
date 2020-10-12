

@extends('layouts.guest')

@section('guest_content')
<div class="admin_text" style="color: #35977D;">FORGOT PASSWORD</div>
<div class="admin_sub_text">Enter your email on the account and an email will be sent to you. Remembered your password? Log in <a href="/login">here</a>.</div>
<div>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group reset_center">
            <div class="login_placeholder">
                <input id="email" type="email" required="" class="login_input form-control" 
                name="email" value="{{ old('email') }}" required autocomplete="email" 
                placeholder="Email" autofocus>
            </div>
        </div>
        <div class="form-group">
            <div class="login_button_div">
                <button type="submit" class="btn" style="background-color: #35977D; color: #ffffff">
                    Send
                </button>
            </div>
        </div>
    </form>
    @if (session('status'))
    <div class="alert alert-success forgot_submit_text" role="alert">
        Instructions will be sent to the email address if we have an account associated with it
    </div>
    @endif
    @error('email')
    <div class="alert alert-success forgot_submit_text" role="alert">
         Instructions will be sent to the email address if we have an account associated with it
    </div>
    @enderror
</div>
@endsection
