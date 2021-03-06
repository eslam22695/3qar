@extends('layouts.index')

@section('content')

<section class="banner-about">
    <div class="container">
        <div class="d-flex justify-content-between  align-items-center pb-3">
            <h3>الصفحة الشخصية</h3>
        </div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('index')}}">الصفحه الرئيسيه</a></li>
                <li class="breadcrumb-item active" aria-current="page">الصفحة الشخصية</li>
            </ol>
        </nav>

    </div>
</section>

    <!--------start profile-------------->
    <section class="profile Special mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <p class="p-profile">حسابي</p>
                    <ul class="nav nav-pills flex-column shadow-lg" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">معلوماتي الشخصيه</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                <div class="d-flex justify-content-between  align-items-center">
                                    <span>الاعلانات المحفوظه</span>
                                    <span>({{$favCount}})</span>
                                </div></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                                <div class="d-flex justify-content-between  align-items-center">
                                    <span>العقارات المتواصل بخصوصها</span>
                                    <span>({{$clickCount}})</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="zmdi zmdi-power"></i> <span>تسجيل خروج</span>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
           
                                    {{ csrf_field() }}
           
                                </form>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.col-md-4 -->
                <div class="col-md-8">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="container">
                                <div class="d-flex justify-content-between  align-items-center user-profile mb-3">
                                    <h4><strong>معلوماتي الشخصيه</strong></h4>
                                    
                                    <a href="#" id="show" class="unedit"><h4 class="dark-color"><strong>تعديل</strong></h4></a>
                                </div>
                                <div class="row shadow-lg p-3 unedit">
                                    <div class="col-12">
                                        @if (Session::has('success'))
                                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                                        @elseif(Session::has('danger'))
                                            <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                                        @endif
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li class="alert alert-danger"><strong>{{ $error }}</strong></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-start  align-items-center user-profile">
                                            <p class="width-name">الاسم</p>
                                            <p class="margin-profile">{{$user->name}}</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-start  align-items-center user-profile">
                                            <p class="width-name">البريد الالكتروني</p>
                                            <p class="margin-profile">{{$user->email}}</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-start  align-items-center user-profile">
                                            <p class="width-name">رقم الجوال</p>
                                            <p class="margin-profile">{{$user->phone}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row shadow-lg p-3 edit" style="display: none;">
                                    <form method="POST" action="{{route('edit_profile')}}">
                                        @csrf
                                        <div class="col-12">
                                            <div class="d-flex justify-content-start  align-items-center user-profile mb-3">
                                                <p class="width-name">الاسم</p>
                                                <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex justify-content-start  align-items-center user-profile mb-3">
                                                <p class="width-name">البريد الالكتروني</p>
                                                <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex justify-content-start  align-items-center user-profile mb-3">
                                                <p class="width-name">رقم الجوال</p>
                                                <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex justify-content-start  align-items-center user-profile mb-3">
                                                <p class="width-name">رقم السري</p>
                                                <input type="password" class="form-control" name="password">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="d-flex justify-content-start  align-items-center user-profile">
                                                <button type="submit" class="btn btn-primary">تعديل</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="container">
                                <h4>الاعلانات المحفوظه</h4>
                                <div class="row">

                                    @foreach($favs as $fav)
                                    <?php $title = str_replace(' ', '_', $fav->item->name); ?>
                                        <div class="col-md-6 mb-3 " >
                                            <div class="card shadow-lg">
                                                <div class="image-wrapper">
                                                    <span id="fav-block-{{$fav->item->id}}">
                                                        @if(Auth::check())
                                                            @if($fav->item->favourite($fav->item->id) == 1)
                                                                <a onclick="unfav({{$fav->item->id}});">
                                                                    <span id="wish-icon-{{$fav->item->id}}" class="wish-icon"><i class="fa fa-heart ml-3"></i></span>
                                                                </a>
                                                            @else
                                                                <a onclick="fav({{$fav->item->id}});">
                                                                    <span id="wish-icon-{{$fav->item->id}}" class="wish-icon"><i class="fa fa-heart-o ml-3"></i></span>
                                                                </a>
                                                            @endif
                                                        @endif
                                                    </span>
                                                    <img src="{{asset('admin_assets/images/item/'.$fav->item->main_image)}}" alt="spongebob crew" />
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$fav->item->name}}</h5>
                                                    <?php
                                                        $description = substr($fav->item->description,0, 30)."...";
                                                    ?>
                                                    <p class="card-text">{{$description}}</p>
                                                    <span class="icon-p pt-3">
                                                        <img class="icon-img" src="{{asset('front_assets/img/67872.png')}}">
                                                        {{$fav->item->city->name}} / {{$fav->item->district->name}} </span>

                                                    <div class="d-flex justify-content-between  align-items-center ">
                                                        @foreach($fav->item->value()->get() as $value)
                                                            <span class="icon-p">
                                                                <img class="icon-img" src="{{asset('admin_assets/images/attribute/'.$value->attribute_value->attribute->icon)}}">
                                                                {{$value->attribute_value->attribute->name}}  </span>
                                                        @endforeach
                                                    </div>
                                                    <p><a href="{{route('item_details',[$fav->item->id,$title])}}">{{$fav->item->price}} ريال سعودي </a></p>
                                                    <a href="{{route('item_details',[$fav->item->id,$title])}}" class="btn btn-primary">شاهد</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="container">
                                <h4>العقارات المتواصل بخصوصها</h4>
                                <div class="row">

                                    @foreach($clicks as $click)
                                    <?php $title = str_replace(' ', '_', $click->item->name); ?>
                                        <div class="col-md-6 mb-3 " >
                                            <div class="card shadow-lg">
                                                <div class="image-wrapper">
                                                    <span id="fav-block-{{$click->item->id}}">
                                                        @if(Auth::check())
                                                            @if($click->item->favourite($click->item->id) == 1)
                                                                <a onclick="unfav({{$click->item->id}});">
                                                                    <span id="wish-icon-{{$click->item->id}}" class="wish-icon"><i class="fa fa-heart ml-3"></i></span>
                                                                </a>
                                                            @else
                                                                <a onclick="fav({{$click->item->id}});">
                                                                    <span id="wish-icon-{{$click->item->id}}" class="wish-icon"><i class="fa fa-heart-o ml-3"></i></span>
                                                                </a>
                                                            @endif
                                                        @else
                                                            <span class="wish-icon"><i class="fa fa-heart-o ml-3"></i></span>
                                                        @endif
                                                    </span>
                                                    <img src="{{asset('admin_assets/images/item/'.$click->item->main_image)}}" alt="spongebob crew" />
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$click->item->name}}</h5>
                                                    <?php
                                                        $description = substr($click->item->description,0, 30)."...";
                                                    ?>
                                                    <p class="card-text">{{$description}}</p>
                                                    <span class="icon-p pt-3">
                                                        <img class="icon-img" src="{{asset('front_assets/img/67872.png')}}">
                                                        {{$click->item->city->name}} / {{$click->item->district->name}} </span>

                                                    <div class="d-flex justify-content-between  align-items-center ">
                                                        @foreach($click->item->value()->get() as $value)
                                                            <span class="icon-p">
                                                                <img class="icon-img" src="{{asset('admin_assets/images/attribute/'.$value->attribute_value->attribute->icon)}}">
                                                                {{$value->attribute_value->attribute->name}}  </span>
                                                        @endforeach
                                                    </div>
                                                    <p><a href="{{route('item_details',[$click->item->id,$title])}}">{{$click->item->price}} ريال سعودي </a></p>
                                                    <a href="{{route('item_details',[$click->item->id,$title])}}" class="btn btn-primary">شاهد</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.col-md-8 -->
            </div>



        </div>

    </section>
    <!--------end profile-------------->

@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function () {
        $("#show").click(function () {
            $(".edit").toggle();
            $(".unedit").toggle();
        });
    });
</script>
    
@endsection