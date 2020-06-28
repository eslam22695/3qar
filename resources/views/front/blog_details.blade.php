@extends('layouts.index')

@section('content')

<section class="banner-about">
    <div class="container">
        <div class="d-flex justify-content-between  align-items-center pb-3">
            <h3>المدونة</h3>
        </div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('index')}}">الصفحه الرئيسيه</a></li>
                <li class="breadcrumb-item active" aria-current="page">المدونة</li>
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
                                <img src="{{asset('admin_assets/images/blog/'.$blog->image)}}" class="img-blog-big" alt="spongebob crew" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-none d-md-block d-sm-none">
                    @foreach($blogs as $blog_menu)
                        <?php $title = str_replace(' ', '_', $blog_menu->title); ?>
                        <div class="d-flex justify-content-between  align-items-center pb-3">

                            <div class="image-wrapper img-details ">
                                <a href="{{route('blog_details',[$blog_menu->id,$title])}}">
                                    <img width="100%" src="{{asset('admin_assets/images/blog/'.$blog_menu->image)}}" class="img-small" alt="spongebob crew" />
                                </a>
                            </div>
                            <div class="">
                                <h5> {{$blog_menu->title}}</h5>
                                <?php
                                    $description = substr($blog_menu->description,0, 150)."...";
                                ?>
                                <p class="p-details">{{$description}}</p>
                                <i class="fa fa-calendar p-details"></i> <span>{{$blog_menu->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-12">
                    <div class="head pb-5 wow fadeInRight"  data-wow-duration="2s">
                        <h2>{{$blog->title}} </h2>
                        <i class="fa fa-calendar p-details"></i> <span>{{$blog->created_at->format('d M Y') }}</span>
                        <p> {!!$blog->content!!}</p>

                    </div>

                </div>

                <div class="col-lg-4 col-md-6  d-md-none d-sm-block">
                    @foreach($blogs as $blog_mob)
                        <?php $title = str_replace(' ', '_', $blog_mob->title); ?>
                        <div class="d-flex justify-content-between  align-items-center pb-3">

                            <div class="image-wrapper img-details ">
                                <a href="{{route('blog_details',[$blog_mob->id,$title])}}">
                                    <img width="100%" src="{{asset('admin_assets/images/blog/'.$blog_mob->image)}}" class="img-small" alt="spongebob crew" />
                                </a>
                            </div>
                            <div class="">
                                <h5> {{$blog_mob->title}}</h5>
                                 <p class="p-details">{{$blog_mob->description}}</p>
                                <i class="fa fa-calendar p-details"></i> <span>{{$blog_mob->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
    <!--------end 3akar -------------->

@endsection