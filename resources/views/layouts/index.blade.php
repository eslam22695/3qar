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
    <link rel="stylesheet" href="{{asset('front_assets/css/slick.css')}}">  	

    <link rel="stylesheet" href="{{asset('front_assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front_assets/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">	

    @yield('styles')
</head>
<body>
<!--------start navbar -------------->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-lg">
        <div class="container">
            <a class="navbar-brand" href="{{route('index')}}">  <img src="{{asset('front_assets//img/logo.png')}}" width="80%" height="" alt=""></a>
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
                        <a class="nav-link" href="{{route('index')}}">الصفحه الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('about')}}">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('special')}}">عقارات مميزة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('blog')}}">المدونة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('contact')}}">تواصل معنا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('consultation')}}">خدمات اخري</a>
                    </li>
                    <li class="nav-item">
                        @if(Auth::check())
                            <a class="nav-link" href="{{url('profile')}}">مرحبا <span style="color: #214e87">{{Auth::user()->name}}</span></a>
                        @else
                            <a class="nav-link btn-login" href="{{url('login')}}">تسجيل دخول</a>
                        @endif
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>

<!--------End navbar  -------------->


@yield('content')

<!--------start footer -------------->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img width="60%" src="{{asset('front_assets//img/footer.png')}}">
                <p>{{@Helper::setting()->footer}}</p>
            </div>
            <div class="col-md-3">
                <h5>القائمه</h5>
                <a href="{{route('index')}}"><p>الصفحه الرئيسيه</p></a>
                <a href="{{url('about')}}"><p>من نحن</p></a>
                <a href="{{url('special')}}"><p>عقارات مميزه</p></a>
                <a href="{{url('blog')}}"><p>المدونه</p></a>
                <a href="{{url('contact')}}"><p>تواصل معنا</p></a>
                <a href="{{url('consultation')}}"><p>خدمات اخري</p></a>
            </div>
            <div class="col-md-4">
                <h5>تابعنا</h5>
                <div class="d-flex justify-content-start  align-items-center pb-3">
                    <a href="{{@Helper::setting()->facebook != null ? @Helper::setting()->facebook : '#'}}"><i class="fa fa-facebook"></i></a>
                    <a href="{{@Helper::setting()->twitter != null ? @Helper::setting()->twitter : '#'}}"><i class="fa fa-twitter"></i></a>
                    <a href="{{@Helper::setting()->instagram != null ? @Helper::setting()->instagram : '#'}}"><i class="fa fa-instagram"></i></a>
                    <a href="{{@Helper::setting()->youtube != null ? @Helper::setting()->youtube : '#'}}"><i class="fa fa-youtube"></i></a>
                    <a href="{{@Helper::setting()->linkedin != null ? @Helper::setting()->linkedin : '#'}}"><i class="fa fa-linkedin"></i></a>
                </div>
                <h5>حمل التطبيق</h5>
                <div class="d-flex justify-content-start  align-items-center pb-3">
                    <a href="{{@Helper::setting()->android != null ? @Helper::setting()->android : '#'}}"><i class="fa fa-android"></i></a>
                    <a href="{{@Helper::setting()->apple != null ? @Helper::setting()->apple : '#'}}"><i class="fa fa-apple"></i></a>
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
<script src="{{asset('front_assets/js/slick.min.js')}}"></script> 	
<script src="{{asset('front_assets/js/wow.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>	

<script>new WOW().init();</script>
<!--------end js-------------->

<script>

    function fav(input){
                
        var item_id = input;
        //ajax
        $.get('/ajax_fav?item_id='+ input,function(data){
            //success data
            if(data == false){
                window.location = '{{route('login')}}';
            }else{
                var box =  $('#fav-block-'+input);
                box.empty();
                box.append('<a onclick="unfav('+input+');"><span id="wish-icon-'+input+'" class="wish-icon"><i class="fa fa-heart ml-3"></i></span></a>');
            }
        });
    }

    function unfav(input){
        
        var item_id = input;
        //ajax
        $.get('/ajax_unfav?item_id='+ input,function(data){
            //success data
            if(data == false){
                window.location = '{{route('login')}}';
            }else{
                var box =  $('#fav-block-'+input);
                box.empty();
                box.append('<a onclick="fav('+input+');"><span id="wish-icon-'+input+'" class="wish-icon"><i class="fa fa-heart-o ml-3"></i></span></a>');
            }
            
        });
    }

    function show_phone(input){
        
        $.get('/ajax_phone?item_id='+ input,function(data){
            console.log(2);
            //success data
            if(data == false){
                window.location = '{{route('login')}}';
            }else{
                var phone =  $('#show_phone').empty();
                phone.append('<a href="tel:'+data+'" class="btn btn-primary">'+data+'</a>');
            }
        });    
    }

</script>

@yield('scripts')

</body>
</html>