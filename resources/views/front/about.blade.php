@extends('layouts.index')

@section('content')


    <!--------start about us -------------->
    <section class="about page-aabout ">
        <div class="container">
            <div class="row">

                <div class="col-md-6 wow fadeInUp"  data-wow-duration="2s">
                    @if(isset($setting->about_image))
                    <img src="{{asset('admin_assets/images/setting/'.$setting->about_image)}}" width="100%" class="">
                    @endif
                </div>
                <div class="col-md-6 text-about wow fadeInDown"  data-wow-duration="2s">
                    <div class="head">
                        <h2>من نحن</h2>
                    </div>
                    <h3> {{isset($setting->about_home) ? $setting->about_home : ''}} </h3>

                </div>
            </div>
        </div>
    </section>
    <!--------end about us -------------->
    <!--------start Specials -------------->
    <section class="Specials">
        <div class="container">
            <div class="head pb-5 wow fadeInRight"  data-wow-duration="2s">
                <h2> المميزات</h2>
            </div>
            <div class="row">
                @foreach($features as $feature)

                <div class="col-md-4 mb-3 p-1 wow fadeInUp">
                    <div class="card-about">
                        <div class="img-zoom">
                            <img class="img-sp" src="{{asset('front_assets/img/1.jpg')}}" width="100%">
                        </div>
                        <div class="text-card">

					<span class="icon-p pt-3">
							<img class="icon-img" src="{{asset('admin_assets/images/feature/'.$feature->icon)}}">
							</span>
                            <h5>{{$feature->title}} </h5>
                            <p>{{$feature->description}} </p>
                        </div>
                    </div>

                </div>
                @endforeach
                {{--<div class="col-md-4 mb-3 p-1 wow fadeInDown">--}}
                    {{--<div class="card-about">--}}
                        {{--<img class="img-sp" src="img/1.jpg" width="100%">--}}
                        {{--<div class="text-card">--}}
					{{--<span class="icon-p pt-3">--}}
							{{--<img class="icon-img" src="./img/phone.png">--}}
							{{--</span>--}}
                            {{--<h5>هناك حقيقة مثبتة منذ زمن طويل </h5>--}}
                            {{--<p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي .  </p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-4 mb-3 p-1 wow fadeInUp">--}}
                    {{--<div class="card-about">--}}
                        {{--<img class="img-sp" src="img/1.jpg" width="100%">--}}
                        {{--<div class="text-card">--}}
					{{--<span class="icon-p pt-3">--}}
							{{--<img class="icon-img" src="./img/hand-graving-smartphone.png">--}}
							{{--</span>--}}
                            {{--<h5>هناك حقيقة مثبتة منذ زمن طويل </h5>--}}
                            {{--<p>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي .  </p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </section>
    <!--------end Specials -------------->
    <!--------start contact -------------->
    <section class="about contact">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 wow fadeInUp p-0"  data-wow-duration="2s">
                    <div class="img-zoom">
                        <img src="{{asset('front_assets/img/1.jpg')}}" width="100%">
                    </div>
                    <div class="text-cardss">
						<span class="icon-p pt-3">
							<img class="icon-img phone" src="{{asset('front_assets/img/phone-black.png')}}">
							</span>
                        <div class="">

                            <h5>اتصل بنا</h5>
                            <p>{{isset($setting->phone1) ? $setting->phone1 : ''}}</p>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 text-about wow fadeInDown"  data-wow-duration="2s">
                    <div class="head">
                        <h2>تواصل معنا</h2>
                    </div>
                    <h3>{{isset($setting->contact_text) ? $setting->contact_text : ''}}</h3>


                </div>
            </div>
        </div>
    </section>
    <!--------end contact -------------->
@endsection