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
<section class="Special filter">
    <div class="container">

        {{-- <div class="head pb-5 wow fadeInRight d-flex justify-content-between  align-items-center pb-3"  data-wow-duration="2s">
            <h2>العقارات للايجار</h2>
            <div class="dropdown">
                <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                    رتب النتائج
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Link 1</a>
                    <a class="dropdown-item" href="#">Link 2</a>
                    <a class="dropdown-item" href="#">Link 3</a>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <form method="GET" action="{{route('filter')}}">
                    <div class="accordion shadow-sm" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="clearfix mb-0">
                                    <span>المدينه</span>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fa fa-plus"></i></button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class=" coloured">
                                        @foreach(@Helper::cities() as $city)
                                            <div class="checkbox">
                                                <label>
                                                    <input class="city_id" type="radio" name="city_id" value="{{$city->id}}" {{$city->id == $city_id ? 'checked' : ''}}> {{$city->name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingDistrict">
                                <h2 class="clearfix mb-0">
                                    <span>الحي</span>
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseDistrict" aria-expanded="true" aria-controls="collapseDistrict"><i class="fa fa-plus"></i></button>
                                </h2>
                            </div>
                            <div id="collapseDistrict" class="collapse" aria-labelledby="headingDistrict" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="district_id coloured">
                                        <div class="checkbox">
                                            <label>
                                                <input type="radio" name="district_id" value="0" {{$district_id == 0 ? 'checked' : ''}}> الكل
                                            </label>
                                        </div>
                                        @foreach($districts as $district)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="radio" name="district_id" value="{{$district->id}}" {{$district->id == $district_id ? 'checked' : ''}}> {{$district->name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <span>النوع </span>
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-plus"></i></button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class=" coloured">
                                        @foreach(@Helper::cats() as $cat)
                                            <div class="checkbox">
                                                <label>
                                                    <input type="radio" name="cat_id" value="{{$cat->id}}" {{$cat->id == $cat_id ? 'checked' : ''}}> {{$cat->name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <span>السعر</span>
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i class="fa fa-plus"></i></button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body pr-0 pl-0">
                                    <div class="container" >
                                        <input class="prices-text" type="number" placeholder="السعر من"  name="price_from" value="{{$price_from == 0 ? '' : $price_from}}">
                                    </div>
                                    <div class="container" >
                                        <input class="prices-text" type="number" placeholder="السعر إلي"  name="price_to" value="{{$price_to == 0 ? '' : $price_to}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <h2 class="mb-0">
                                    <span>المساحه</span>
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><i class="fa fa-plus"></i></button>
                                </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="container" >
                                        <input class="prices-text" type="number" placeholder="المساحه من"  name="area_from" value="{{$area_from == 0 ? '' : $area_from}}">
                                    </div>
                                    <div class="container" >
                                        <input class="prices-text" type="number" placeholder="المساحه إلي"  name="area_to" value="{{$area_to == 0 ? '' : $area_to}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-around  align-items-center pb-3 mt-5">
                            <button type="submit" class="btn btn-primary">بحث</button>

                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-8 col-md-6">
                <div class="row">
                    @foreach($items as $item)
                        <?php $title = str_replace(' ', '_', $item->name); ?>
                        <div class=" col-md-6 mb-3 wow fadeIn" data-wow-delay="{{$loop->iteration/3}}">
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
                                    <p class="card-text">{{$description}}</p>
                                    <span class="icon-p pt-3">
                                        <img class="icon-img" src="{{asset('front_assets/img/67872.png')}}">
                                        {{isset($item->district->name) ? $item->district->name.' / ' : ''}} {{isset($item->city->name) ? $item->city->name : ''}}
                                    </span>
                                    <div class="d-flex justify-content-between  align-items-center ">
                                        @foreach($item->value()->get() as $value)
                                            <span class="icon-p">
                                                <img class="icon-img" src="{{asset('admin_assets/images/attribute/'.$value->attribute_value->attribute->icon)}}"> 
                                                {{$value->attribute_value->value}}  {{$value->attribute_value->attribute->name}}  </span>
                                        @endforeach

                                    </div>
                                    <p><a href="{{route('item_details',[$item->id,$title])}}"> <strong>{{$item->price}} ريال سعودي</strong> </a></p>
                                    <a href="{{route('item_details',[$item->id,$title])}}" class="btn btn-primary">شاهد</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{ $items->appends(request()->query())->links('pagination.custom') }}

                </div>
            </div>
        </div>
    </div>
</section>
<!--------end 3akar -------------->
@endsection

@section('scripts')
    <script>
        $(".city_id").change(function(){
            var city_id = $(this).val(); 

            if(city_id){
                $.ajax({
                    type:"GET",
                    url:"{{url('get_districts')}}?city_id="+city_id,
                    success:function(res){               
                        if(res){
                            $(".district_id").empty();

                            $(".district_id").append('<div class="checkbox"><label><input type="radio" name="district_id" value="0" checked> الكل</label></div>');

                            $.each(res,function(key,value){
                                
                                $(".district_id").append('<div class="checkbox"><label><input type="radio" name="district_id" value="'+key+'"> '+value+'</label></div>');
                            });
                    
                        }else{
                            $(".district_id").empty();
                        }
                    }
                });
            }else{
                $(".district_id").empty();
            }      
        });

    </script>
@endsection   