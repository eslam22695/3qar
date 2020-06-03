@extends('layouts.index')

@section('content')

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
                @foreach($blogs as $blog_menu)

                    <div class="col-lg-4 col-md-6 d-none d-md-block d-sm-none">
                        <div class="d-flex justify-content-between  align-items-center pb-3">

                            <div class="image-wrapper img-details ">
                                <a href="">
                                    <img width="100%" src="{{asset('admin_assets/images/blog/'.$blog_menu->image)}}" class="img-small" alt="spongebob crew" />
                                </a>
                            </div>
                            <div class="">
                                <h5> {{$blog_menu->title}}</h5>
                                <p class="p-details">{{$blog_menu->description}}</p>
                                <i class="fa fa-calendar p-details"></i> <span>{{$blog_menu->created_at->format('d M Y') }}</span>
                            </div>
                        </div>

                    </div>
                @endforeach

                <div class="col-md-12">
                    <div class="head pb-5 wow fadeInRight"  data-wow-duration="2s">
                        <h2>{{$blog->title}} </h2>
                        <i class="fa fa-calendar p-details"></i> <span>{{$blog->created_at->format('d M YY') }}</span>
                        <p> {!!$blog->content!!}</p>

                    </div>

                </div>

                @foreach($blogs as $blog)

                    <div class="col-lg-4 col-md-6  d-md-none d-sm-block">
                        <div class="d-flex justify-content-between  align-items-center pb-3">

                            <div class="image-wrapper img-details ">
                                <a href="">
                                    <img width="100%" src="{{asset('admin_assets/images/blog/'.$blog->image)}}" class="img-small" alt="spongebob crew" />
                                </a>
                            </div>
                            <div class="">
                                <h5> {{$blog->title}}</h5>
                                <p class="p-details">{{$blog->description}}</p>
                                <i class="fa fa-calendar p-details"></i> <span>{{$blog->created_at->format('d M YY') }}</span>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <!--------end 3akar -------------->

@endsection