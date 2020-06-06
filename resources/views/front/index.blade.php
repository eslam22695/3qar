@extends('layouts.index')

@section('content')

    <!--------start about us -------------->
    <section class="about ">
        <div class="container">
            <div class="row">
                <div class="col-md-6 wow fadeInUp"  data-wow-duration="2s">
                    @if(isset($setting->about_image))
                    <img src="{{asset('admin_assets/images/setting/'.$setting->about_image)}}" class="img-about">
                    @endif
                </div>
                <div class="col-md-6 text-about wow fadeInDown"  data-wow-duration="2s">
                    <div class="head">
                        <h2>من نحن</h2>
                    </div>
                    <p>{{isset($setting->about_home) ? $setting->about_home : ''}}</p>
                    <a href="{{route('about')}}" class="btn btn-primary  pl-5 pr-5">المزيد</a>
                </div>
            </div>
        </div>
    </section>

    <!--------end about us -------------->
    <!--------start 3akar -------------->
    <section class="Special">
        <div class="container">
            <div class="head pb-5 wow fadeInRight"  data-wow-duration="2s">
                <h2>العقارات المميزه</h2>
            </div>
            <div class="row">

                @foreach($items as $item)
                    <div class="col-lg-4 col-md-6 mb-3 wow fadeIn" data-wow-delay="{{$loop->iteration/3}}">
                        <div class="card shadow-lg">
                            <div class="image-wrapper">
                                <span id="fav-block-{{$item->id}}">
                                    @if(Auth::check())
                                        @if($item->favourite($item->id) == 1)
                                            <a onclick="unfav({{$item->id}});">
                                                <span id="wish-icon-{{$item->id}}" class="wish-icon"><i class="fa fa-heart ml-3"></i></span>
                                            </a>
                                        @else
                                            <a onclick="fav({{$item->id}});">
                                                <span id="wish-icon-{{$item->id}}" class="wish-icon"><i class="fa fa-heart-o ml-3"></i></span>
                                            </a>
                                        @endif
                                    @else
                                        <span class="wish-icon"><i class="fa fa-heart-o ml-3"></i></span>
                                    @endif
                                </span>
                                <img src="{{asset('admin_assets/images/item/'.$item->main_image)}}" alt="spongebob crew" />
                            </div>


                            <div class="card-body">
                                <h5 class="card-title">{{$item->name}}</h5>

                                <?php
                                    $description = substr($item->description,0, 30)."...";
                                ?>

                                <p class="card-text"> {{$description}} </p>

                                <span class="icon-p pt-3">
                                <img class="icon-img" src="{{asset('front_assets/img/67872.png')}}">
                                {{$item->city->name}} / {{$item->district->name}} </span>

                                <div class="d-flex justify-content-between  align-items-center ">
                                    @foreach($item->value()->get() as $value)
                                        <span class="icon-p">
                                            <img class="icon-img" src="{{asset('admin_assets/images/attribute/'.$value->attribute_value->attribute->icon)}}">
                                            {{$value->attribute_value->attribute->name}}  </span>
                                    @endforeach
                                </div>

                                <p> <strong>{{$item->price}} ريال سعودي</strong> </p>
                                <a href=" {{route('item_details',$item->id)}}" class="btn btn-primary">شاهد</a>
                            </div>
                        </div>
                    </div>
                @endforeach



                <a href=" {{route('special')}}" class="btn btn-primary  pl-5 pr-5 m-auto mt-4 wow fadeIn" data-wow-duration="2s">المزيد</a>
            </div>
        </div>
    </section>
    <!--------end 3akar -------------->


@endsection