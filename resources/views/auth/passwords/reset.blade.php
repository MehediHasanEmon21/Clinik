
@extends('layouts.guest')

@section('guest_content')
<div class="admin_text" style="color: #35977D">NEW PASSWORD</div>
<div class="admin_sub_text">Enter your new password and verify the new password as well. Remembered your password? Log in <a href="/login">here</a>.</div>
<div>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            <div class="login_placeholder">
                <input id="email" type="email" class="login_input form-control" 
                name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" 
                placeholder="Email" autofocus>
            </div>
        </div>
        <div class="form-group">
            <div class="login_placeholder">
                <input id="password" type="password" 
                class="login_input form-control @error('password') is-invalid @enderror" 
                name="password" required autocomplete="new-password"
                placeholder="New Password" required="">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <div class="login_placeholder">
                <input id="password-confirm" type="password" 
                class="login_input form-control" name="password_confirmation" 
                required autocomplete="new-password"
                placeholder="Verify Password" required="">
            </div>
        </div>

        <div class="form-group">
            <div class="login_button_div">
                <button type="submit" class="btn" style="background-color: #35977D; color: #ffffff">
                    Reset
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
