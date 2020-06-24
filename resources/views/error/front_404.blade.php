@extends('layouts.index')

@section('content')

<section class="banner-about">
    <div class="container">
        <div class="d-flex justify-content-between  align-items-center pb-3">
            <h3>الصفحة غير موجودة</h3>
        </div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('index')}}">الصفحه الرئيسيه</a></li>
                <li class="breadcrumb-item active" aria-current="page">الصفحة غير موجودة</li>
            </ol>
        </nav>

    </div>
</section>

@endsection