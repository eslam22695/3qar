<!DOCTYPE html>
<html class="desktop mbr-site-loaded">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>ALATEEQ GROUP</title>
    <link rel="icon" type="image/png" href="{{asset('front_assets/img/logoo.png')}}">
    <link rel="stylesheet" href=" {{asset('front_assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('front_assets/css/home.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front_assets/css/bootstrap-select.min.css')}}">
</head>
<body>
<!--------start navbar -------------->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="./index.html">  <img src="./img/logo.png" width="80%" height="" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar" aria-controls="exCollapsingNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <!--just add these span here-->
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <!--/end span-->
            </button>

            <div class="collapse navbar-collapse" id="exCollapsingNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">الصفحه الرئيسيه</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('about')}}">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('special')}}">عقارات مميزه</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('blog')}}">المدونه</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('contact')}}">تواصل معنا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('consultation')}}">خدمات اخري</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-login" href="{{url('login')}}">تسجيل دخول</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>

<!--------End navbar  -------------->
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
                            <option selected disabled value="0">اختر النوع</option>
                            @foreach(@Helper::cats() as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="col-md-5 p-0 wow fadeInLeft">
                    <div class="form-group">
                        <select data-live-search="true" class="form-control selectpicker select-two" required name="city_id">
                            <option selected disabled value="0">اختر المدينه</option>
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

@yield('content')

<!--------start footer -------------->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img width="60%" src="img/footer.png">
                <p>خدماتنا تساعدك على بيع وشراء العقارات بسهولة بالإضافة إلى تزويدك بمعلومات أساسية لإتخاذ واحد من أهم القرارات المالية في حياتك.</p>
            </div>
            <div class="col-md-3">
                <h5>القائمه</h5>
                <a href="#"><p>الصفحه الرئيسيه</p></a>
                <a href="#"><p>من نحن</p></a>
                <a href="#"><p>عقارات مميزه</p></a>
                <a href="#"><p>المدونه</p></a>
                <a href="#"><p>تواصل معنا</p></a>
                <a href="#"><p>الاستشارات الهندسيه</p></a>
            </div>
            <div class="col-md-4">
                <h5>تابعنا</h5>
                <div class="d-flex justify-content-start  align-items-center pb-3">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </div>
                <h5>حمل التطبيق</h5>
                <div class="d-flex justify-content-start  align-items-center pb-3">
                    <a href="#"><i class="fa fa-android"></i></a>
                    <a href="#"><i class="fa fa-apple"></i></a>
                </div>
            </div>

        </div>
    </div>
    <div class="col back-copy">
        <p>Copyright ©  2010-2020 _ All rights reserved.</p>
    </div>
</footer>
<!--------end footer -------------->
<!--------start scroll-top -------------->
<div class="scroll-top-wrapper ">
  <span class="scroll-top-inner">
    <i class="fa fa-2x fa-arrow-circle-up"></i>
  </span>
</div>
<!--------end scroll-top -------------->
<!--------start js -------------->
<script src="{{asset('front_assets/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('front_assets/js/popper.min.js')}}" ></script>
<script src="{{asset('front_assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('front_assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('front_assets/js/plugin.js')}}"></script>
<script src="{{asset('front_assets/js/wow.min.js')}}"></script>
<script>new WOW().init();</script>
<!--------end js-------------->
</body>
</html>