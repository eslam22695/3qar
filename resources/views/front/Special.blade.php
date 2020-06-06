@extends('layouts.index')

@section('content')


    <!--------start 3akar -------------->
    <section class="Special filter page-Special">
        <div class="container">
            <div class="head pb-5 wow fadeInRight"  data-wow-duration="2s">
                <h2>العقارات المميزه</h2>
            </div>
            <div class="row">
                @foreach($specials as $special)
                    <div class="col-lg-4 col-md-6 mb-3 wow fadeIn" data-wow-delay="{{$loop->iteration/3}}">
                        <div class="card shadow-lg">
                            <div class="image-wrapper">
                                <span id="fav-block-{{$special->id}}">
                                    @if(Auth::check())
                                        @if($special->favourite($special->id) == 1)
                                            <a onclick="unfav({{$special->id}});">
                                                <span id="wish-icon-{{$special->id}}" class="wish-icon"><i class="fa fa-heart ml-3"></i></span>
                                            </a>
                                        @else
                                            <a onclick="fav({{$special->id}});">
                                                <span id="wish-icon-{{$special->id}}" class="wish-icon"><i class="fa fa-heart-o ml-3"></i></span>
                                            </a>
                                        @endif
                                    @else
                                        <span class="wish-icon"><i class="fa fa-heart-o ml-3"></i></span>
                                    @endif
                                </span>
                                <img src="{{asset('admin_assets/images/item/'.$special->main_image)}}" alt="spongebob crew" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$special->name}}</h5>
                                <?php
                                    $description = substr($special->description,0, 30)."...";
                                ?>
                                <p class="card-text">{{$description}}</p>
                                <span class="icon-p pt-3">
                                    <img class="icon-img" src="{{asset('front_assets/img/67872.png')}}">
                                    {{isset($special->district->name) ? $special->district->name.' / ' : ''}} {{isset($special->city->name) ? $special->city->name : ''}}
                                </span>
                                <div class="d-flex justify-content-between  align-items-center ">
                                    @foreach($special->value()->get() as $value)

                                        <span class="icon-p">
                                            <img class="icon-img" src="{{asset('admin_assets/images/attribute/'.$value->attribute_value->attribute->icon)}}">
                                            {{$value->attribute_value->attribute->name}}  </span>
                                    @endforeach

                                </div>

                                <p><a href="{{route('item_details',$special->id)}}"> <strong>{{$special->price}} ريال سعودي</strong> </a></p>
                                <a href="{{route('item_details',$special->id)}}" class="btn btn-primary">شاهد</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- <nav class="m-auto" aria-label="...">
                    <ul class="pagination shadow-sm mt-5">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active" aria-current="page">
							  <span class="page-link">
								2
								<span class="sr-only">(current)</span>
							  </span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav> --}}
            </div>
        </div>
    </section>
    <!--------end 3akar -------------->

@endsection