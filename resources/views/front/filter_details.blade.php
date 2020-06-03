@extends('layouts.index')

@section('content')


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
                    <span class="wish-icon"><i class="fa fa-heart-o ml-3"></i></span>
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
                        <p><a href="#">{{$item->price}} ريال سعودي</a></p>
                        <a href="./filter.html" class="btn btn-primary">اظهر الرقم الهاتف</a>
                    </div>
                    <h3><strong>شاهد ايضا</strong></h3>
                    <a href="./blog-details.html">
                        <div class=" mb-3 wow fadeIn" data-wow-delay=".5s">
                            <div class="card shadow-lg p-2 postion">
                                <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                <div class="image-wrapper">

                                    <img src="./img/2.jpg" class="img-blog" alt="spongebob crew" />
                                </div>
                                <div class="card-body p-0">
                                    <h5 class="mb-0"><strong>شقه للبيع في مدي...</strong></h5>
                                    <p class="mb-0">تاون هاوس للبيع</p>
                                    <div class="d-flex justify-content-start  align-items-center">
                                        <i class="fa fa-home">   نيو هاوس </i>
                                        <i class="	fa fa-bath	"> متر </i>
                                    </div>
                                    <div class="d-flex justify-content-start  align-items-center">
                                        <i class="fa fa-bed"> غرف </i>
                                        <i class="	fa fa-arrows-alt"> حمام </i>
                                    </div>

                                    <p class="mb-0"><a href="#">3,900,000 ريال </a></p>
                                    <a href="./filter.html" class="btn btn-primary btn-filter">اظهر الرقم الهاتف</a>

                                </div>
                            </div>
                        </div>
                    </a>

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

                    <div class="d-flex justify-content-around  align-items-center pb-3 table">
                        <p> <strong>الطابق</strong> </p>
                        <p> 5 </p>
                        <p><strong>رقم الاعلان</strong></p>
                        <p>KSA-6688744</p>
                    </div>
                    <div class="d-flex justify-content-around  align-items-center pb-3 table">
                        <p> <strong>الدور</strong> </p>
                        <p> 2018 </p>
                        <p><strong>رقم الاعلان</strong></p>
                        <p>KSA-6688744</p>
                    </div>
                    <div class="d-flex justify-content-around  align-items-center pb-3 table">
                        <p> <strong>الطابق</strong> </p>
                        <p> 5 </p>
                        <p><strong>رقم الاعلان</strong></p>
                        <p>KSA-6688744</p>
                    </div>
                    <div class="d-flex justify-content-around  align-items-center pb-3 table">
                        <p> <strong>الدور</strong> </p>
                        <p> 2018 </p>
                        <p><strong>رقم الاعلان</strong></p>
                        <p>KSA-6688744</p>
                    </div>
                    <div class="d-flex justify-content-around  align-items-center pb-3">
                             	<span class="icon-p">
									 <img class="icon-img" src="img/98866.png">
									انيوهاوس  </span>
                        <span class="icon-p">
									  <img class="icon-img" src="img/98866.png">
									  431 متر </span>
                        <span class="icon-p">
									  <img class="icon-img" src="img/98866.png">
									  غرفه </span>
                        <span class="icon-p">
										<img class="icon-img" src="img/98866.png">
									 	حمام </span>
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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3736489.7218514383!2d90.21589792292741!3d23.857125486636733!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1506502314230" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>

        </div>
    </section>

    <!------ end nav tabs --------->

@endsection