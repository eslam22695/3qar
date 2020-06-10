@extends('layouts.index')

@section('content')

<!--------start banner -------------->
<section class="banner">
    <div class="container">
        <form method="GET" action="{{route('items')}}">
            <div class="row">
                <div class="wow fadeInLeft col-12">
                    <h1>ابحث عن عقارات للبيع و للايجار بالتقسيط او كاش في السعوديه</h1>
                    <p>تحب تسكن فين ؟</p>
                </div>
                    
                <div class="col-md-5 p-0 wow fadeInLeft">
                    <div class="form-group border-form">
                        <select data-live-search="true" class="form-control selectpicker select-one" required name="cat_id">
                            <option selected disabled value="">اختر النوع</option>
                            @foreach(@Helper::cats() as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="col-md-5 p-0 wow fadeInLeft">
                    <div class="form-group">
                        <select data-live-search="true" class="form-control selectpicker select-two" required name="city_id">
                            <option selected disabled value="">اختر المدينه</option>
                            @foreach(@Helper::cities() as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary  pl-5 pr-5 wow fadeInLeft">بحث</button>
                    <h3>تحب تسكن فين ؟</h3>
                </div>
                <div class="col-md-12">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger"><strong>{{ $error }}</strong></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </form>
    </div>
</section>
<!--------end banner -------------->

    <!--------start 3akar -------------->
    <section class="Special filter page-Special">
        <div class="container">
            <div class="head pb-5 wow fadeInRight"  data-wow-duration="2s">
                <h2>العقارات المميزه</h2>
            </div>
            <div class="row">
                @foreach($specials as $special)
                    <?php $title = str_replace(' ', '_', $special->name); ?>
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

                                <p><a href="{{route('item_details',[$special->id,$title])}}"> <strong>{{$special->price}} ريال سعودي</strong> </a></p>
                                <a href="{{route('item_details',[$special->id,$title])}}" class="btn btn-primary">شاهد</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{ $specials->links('pagination.custom') }}
            </div>
        </div>
    </section>
    <!--------end 3akar -------------->

@endsection