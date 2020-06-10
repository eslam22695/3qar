@extends('layouts.index')

@section('styles')
    
<style type="text/css">
    #map {
        width: 100%;
        height: 400px;
    }
    .filter-details .back-color{
        padding: 100px 50px !important;
    }
</style>
@endsection

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

    <!-------- start filter slider------>
    <section class="filter-slider  blog mt-5 wow fadeInUp">
        <div class="container ">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-9 postion">
                    <div class="product__slider-main  img-slide-filter photos">
                        <div class=" item">
                            <a href="{{asset('admin_assets/images/item/'.$item->main_image)}}" data-lightbox="photos"><img class="img-fluid slide-img-bigg" src="{{asset('admin_assets/images/item/'.$item->main_image)}}"></a>
                        </div>
                        @foreach($images as $image)
                        <div class=" item">
                            <a href="{{asset('admin_assets/images/item/'.$image->image)}}" data-lightbox="photos"><img class="img-fluid slide-img-bigg" src="{{asset('admin_assets/images/item/'.$image->image)}}"></a>
                        </div>
                        @endforeach
                        <div class=" item">
                            <a href="{{asset('admin_assets/images/item/'.$item->main_image)}}" data-lightbox="photos"><img class="img-fluid" src="{{asset('admin_assets/images/item/'.$item->main_image)}}"></a>
                        </div>
                    </div>
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
                            <a href="{{route('login')}}">
                                <span class="wish-icon"><i class="fa fa-heart-o ml-3"></i></span>
                            </a>
                        @endif
                    </span>
                    <div class="product__slider-thmb">
                        <div class="slide"><img src="{{asset('admin_assets/images/item/'.$item->main_image)}}" alt="" class="img-responsive img-big"></div>
                        @foreach($images as $image)
                        <div class="slide"><img src="{{asset('admin_assets/images/item/'.$image->image)}}" alt="" class="img-responsive img-big"></div>
                        @endforeach
                    </div>
                    <div class="text-slider mb-5">
                        <div class="container">
                            <h3>{{$item->name}}</h3>
                            <div class="d-flex justify-content-between  align-items-center ">
                                @foreach($item->value() as $value)
                                    <span class="icon-p">
                                        <img class="icon-img" src="{{asset('admin_assets/images/attribute/'.$value->attribute_value->attribute->icon)}}">
                                        {{$value->attribute_value->attribute->name}}  </span>
                                @endforeach

                            </div>

                            <span class="icon-p ">
                                <img class="icon-img" src="{{asset('front_assets/img/67872.png')}}">
                            {{isset($item->district->name) ? $item->district->name.' / ' : ''}} {{isset($item->city->name) ? $item->city->name : ''}}
                         </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="number-phone shadow-lg  mb-4">
                        <?php $title = str_replace(' ', '_', $item->name); ?>
                        <p><a href="{{route('item_details',[$item->id,$title])}}">{{$item->price}} ريال سعودي</a></p>
                        @if($count == 1)
                            <a href="tel:{{$item->phone}}" class="btn btn-primary">{{$item->phone}}</a>
                        @else
                            <div id="show_phone">
                                <a style="color: #ffffff;" onclick="show_phone({{$item->id}});" class="btn btn-primary">اظهر الرقم الهاتف</a>
                            </div>
                        @endif
                    </div>
                    @if(isset($others) && $others != null)
                        <h3><strong>شاهد ايضا</strong></h3>
                        @foreach($others as $other)
                            <?php $title = str_replace(' ', '_', $other->name); ?>
                            <div class=" mb-3 wow fadeIn" data-wow-delay="{{$loop->iteration/3}}s">
                                <div class="card shadow-lg p-2 postion">
                                    <span id="fav-block-{{$other->id}}">
                                        @if(Auth::check())
                                            @if($other->favourite($other->id) == 1)
                                                <a onclick="unfav({{$other->id}});">
                                                    <span id="wish-icon-{{$other->id}}" class="wish-icon"><i class="fa fa-heart ml-3"></i></span>
                                                </a>
                                            @else
                                                <a onclick="fav({{$other->id}});">
                                                    <span id="wish-icon-{{$other->id}}" class="wish-icon"><i class="fa fa-heart-o ml-3"></i></span>
                                                </a>
                                            @endif
                                        @else
                                            <a href="{{route('login')}}">
                                                <span class="wish-icon"><i class="fa fa-heart-o ml-3"></i></span>
                                            </a>
                                        @endif
                                    </span>
                                    <div class="image-wrapper">

                                        <img src="{{asset('admin_assets/images/item/'.$other->main_image)}}" class="img-blog" alt="spongebob crew" />
                                    </div>
                                    <div class="card-body p-0">
                                        <h5 class="mb-0"><strong>{{$other->name}}</strong></h5>
                                        <div class="d-flex justify-content-start  align-items-center">
                                            @foreach($other->value()->get() as $value)
                                                {{$value->attribute_value->attribute->name}} {{$value->attribute_value->value}} {{$loop->last ? '' : '/'}}
                                            @endforeach 
                                        </div>

                                        <p class="mb-0"><a href="{{route('item_details',[$other->id,$title])}}">{{$other->price}}  ريال سعودي </a></p>
                                        <a href="{{route('item_details',[$other->id,$title])}}" class="btn btn-primary btn-filter">شاهد</a>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

        </div>
    </section>

    <!-------- End filter slider------>
    <!------ start nav tabs --------->
    <section class="filter-details">
        <div class="container">
            <div class="scroll-spy sticky-top" id="scroll-spy">
                <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top" id="myNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#section1">تفاصيل الاعلان</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section2">وصف الاعلان</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section3">مكان العقار علي الخريطه</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div id="section1" class="container-fluid back-color mb-5">
                <div class="head wow fadeInRight "  data-wow-duration="2s">
                    <h2 class="mb-5"> تفاصيل الاعلان </h2>
                    <div class="row">
                        <div class="col-md-6">    
                            <div class="d-flex justify-content-around  align-items-center pb-3 table">
                                <p> <strong>المساحة</strong> </p>
                                <p> {{$item->area}} متر مربع</p>
                            </div>
                            @foreach($item->value()->get() as $value)
                                @if($loop->iteration % 2 == 1)
                                <div class="d-flex justify-content-around  align-items-center pb-3 table">
                                    <p> <strong>{{$value->attribute_value->attribute->name}}</strong> </p>
                                    <p> {{$value->attribute_value->value}}</p>
                                </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-around  align-items-center pb-3 table">
                                <p><strong>رقم الاعلان</strong></p>
                                <p>{{$item->id}}</p>
                            </div>
                            @foreach($item->value()->get() as $value)
                                @if($loop->iteration % 2 == 0)
                                <div class="d-flex justify-content-around  align-items-center pb-3 table">
                                    <p> <strong>{{$value->attribute_value->attribute->name}}</strong> </p>
                                    <p> {{$value->attribute_value->value}}</p>
                                </div>
                                @endif
                            @endforeach
                        </div>
                        @foreach($item->option()->get() as $option)
                            <div class="d-flex justify-content-around  align-items-center pb-3">
                                <span class="icon-p">
                                    <img class="icon-img" src="{{asset('front_assets/img/98866.png')}}">
                                    {{$option->option->name}}  
                                </span>
                            </div> 
                        @endforeach         
                    </div>
                </div>
            </div>
            <div id="section2" class="container-fluid back-color mb-5">
                <div class="head wow fadeInRight "  data-wow-duration="2s">
                    <h2 class="mb-5"> وصف الاعلان </h2>
                    <p>{{$item->description}}</p>
                </div>
            </div>
            <div id="section3" class="container-fluid back-color">
                <div class="head wow fadeInRight "  data-wow-duration="2s">
                    <h2 class="mb-5"> مكان العقار علي الخريطه  </h2>
                    <div id="map"></div>
                </div>
            </div>

        </div>
    </section>

    <!------ end nav tabs --------->

@endsection


@section('scripts')
<script>
        
    function initMap() {
        var myLatLng = {lat: {{$item->lat}}, lng: {{$item->lang}}};
    
        var map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 15
        });
    
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!',
            draggable: false
            });
    
    }
    
</script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap" async defer></script>
         
@endsection