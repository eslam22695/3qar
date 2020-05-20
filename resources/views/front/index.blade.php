@extends('layouts.index')

@section('content')

    <!--------start about us -------------->
    <section class="about ">
        <div class="container">
            <div class="row">
                <div class="col-md-6 wow fadeInUp"  data-wow-duration="2s">
                    <img src="{{asset('admin_assets/images/setting/'.$setting->about_image)}}" class="img-about">
                </div>
                <div class="col-md-6 text-about wow fadeInDown"  data-wow-duration="2s">
                    <div class="head">
                        <h2>من نحن</h2>
                    </div>
                    <p>{{$setting->about_home}}</p>
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
                <div class="col-lg-4 col-md-6 mb-3 wow fadeIn" data-wow-delay=".5s">
                    <div class="card shadow-lg">
                        <div class="image-wrapper">
                            <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
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

                                @foreach($item->value() as $value)

                                    <span class="icon-p">
                                         <img class="icon-img" src="{{asset('admin_assets/images/attribute/'.$value->attribute_value->attribute->icon)}}">
                                        {{$value->attribute_value->attribute->name}}  </span>
                                @endforeach

                            </div>

                            <p> <strong>{{$item->price}}</strong> </p>
                            <a href=" {{route('filter_details')}}" class="btn btn-primary">شاهد</a>
                        </div>
                    </div>
                </div>
                @endforeach



                <button type="button" class="btn btn-primary  pl-5 pr-5 m-auto mt-4 wow fadeIn" data-wow-duration="2s">المزيد</button>
            </div>
        </div>
    </section>
    <!--------end 3akar -------------->


@endsection