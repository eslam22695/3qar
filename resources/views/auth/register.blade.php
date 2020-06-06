@extends('layouts.app')

@section('content')


<h5 class="ss text-right mb-4">لدي حساب بالفعل ؟ <span><a href="{{ route('login') }}"> تسجيل دخول </a></span></h5>
<div class="head">
    <h2 class="mb-4">سجل الأن</h2>
</div>
<form method="POST" {{ route('register') }} class="col-md-8">
    @csrf
    <div class="form-group mb-4">
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="الاسم">
    </div>
    <div class="form-group mb-4">
        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required placeholder="رقم الجوال">
    </div>
    <div class="form-group mb-4">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="البريد الالكتروني">
    </div>
    <div class="form-group mb-4">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="كلمه المرور">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group mb-4">
        <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="اعاده كلمه المرور">
    </div>
    <div class="form-group mb-4 text-center">
        <button type="submit" class="btn btn-primary">سجل الأن</button>
    </div>
</form>

@endsection
