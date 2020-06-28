@extends('layouts.index')

@section('content')

<section class="banner-about">
    <div class="container">
        <div class="d-flex justify-content-between  align-items-center pb-3">
            <h3>اعلانات</h3>
        </div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('index')}}">الصفحه الرئيسيه</a></li>
                <li class="breadcrumb-item active" aria-current="page">اعلانات</li>
            </ol>
        </nav>

    </div>
</section>

    <!--------start 3akar -------------->
    <section class="mt-5 filter blog blog-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 mb-5">
                    <div class=" mb-3 wow fadeIn" data-wow-delay=".5s">
                        <div class="card shadow-lg p-2">
                            <div class="image-wrapper">
                                <img src="{{asset('admin_assets/images/advertisement/'.$advertisement->image)}}" class="img-blog-big" alt="spongebob crew" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-none d-md-block d-sm-none">

                        <div class="d-flex justify-content-between  align-items-center pb-3">

                            <div class="">
                                <h5> {{$advertisement->title}}</h5>

                                <p> {!!$advertisement->content!!}</p>
                            </div>
                        </div>
                </div>




            </div>

        </div>
    </section>
    <!--------end 3akar -------------->

@endsection