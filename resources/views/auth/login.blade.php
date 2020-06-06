@extends('layouts.app')

@section('content')


<h5 class="ss text-right mb-4">ليس لدي حساب بالفعل ؟ <span><a href="{{ route('register') }}"> سجل الأن </a></span></h5>
<div class="head">
    <h2 class="mb-5">تسجيل دخول</h2>
</div>
<form method="POST" action="{{ route('login') }}" class="col-md-8">
    @csrf
    <div class="form-group mb-4">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="البريد الالكتروني">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group forget-password text-right mb-0">
        <a href="{{ route('password.request') }}">هل نسيت كلمه المرور؟ </a>
    </div>
    <div class="form-group mb-4">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="كلمه المرور">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group text-right mb-4 pr-3">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label mb-0" for="remember">
            تذكرني
        </label>
    </div>
    <div class="form-group text-center mb-4">
    <button type="submit" class="btn btn-primary"> تسجيل دخول</button>
    </div>
</form>

@endsection
