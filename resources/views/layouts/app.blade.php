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
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<!--------start login -------------->
<section class="login">
    <div class="container login-container">
        <div class="row">
            <div class="col-md-4 ads">
                <a href="{{route('index')}}"><img src="{{asset('front_assets/img/footer.png')}}"></a>
                <h4>  وهي ان المحتوي هناك حقيقه مثبته منذ زمن طويل</h4>
            </div>

            <div class="col-md-8 login-form">
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</section>
<!--------End login  --------------> 
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
</body>
</html>