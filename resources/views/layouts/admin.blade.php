<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="{{asset('website/image/img/logo.png')}}">

    <title>Conversion Click</title>

    <!--Morris Chart CSS -->

    <link rel="stylesheet" href="{{asset('admin_assets/plugins/morris/morris.css')}}">

    <link href=" {{asset('admin_assets/plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css">

    <link href=" {{asset('admin_assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">

    <link href="{{asset('admin_assets/css/icons.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('admin_assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <link href="{{asset('admin_assets/css/new_style.css')}}" rel="stylesheet" type="text/css" />

    {{-- <link href="{{asset('admin_assets/scss/_menu.scss')}}" rel="stylesheet" type="text/css" /> --}}

    <script src="{{asset('admin_assets/js/modernizr.min.js')}}"></script>

    <link href="{{asset('admin_assets/plugins/bootstrap-table/css/bootstrap-table.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/plugins/custombox/css/custombox.css')}}" rel="stylesheet">

    <link href="{{asset('admin_assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link href="{{asset('admin_assets/plugins/switchery/css/switchery.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin_assets/plugins/multiselect/css/multi-select.css')}}"  rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin_assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />

    <link href="{{asset('admin_assets/plugins/owl.carousel/dist/assets/owl.carousel.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/plugins/owl.carousel/dist/assets/owl.theme.default.min.css')}}" rel="stylesheet" type="text/css" />

    @yield('styles')

</head>

<body class="fixed-left">

<!-- Begin page -->

<div id="wrapper">

    <!-- Top Bar Start -->

    <div class="topbar">

        <!-- LOGO -->

        <div class="topbar-left">

            <div class="text-center">

                <a href="{{'/'}}" class="logo">
                    <i class="icon-c-logo"></i>
                    <span> 
                        Conversion Click
                    </span>
                </a>

            </div>

        </div>

        <!-- Button mobile view to collapse sidebar menu -->

        <nav class="navbar-custom">

            <ul class="list-inline float-right mb-0">

                <!--full screen button-->

                <li class="list-inline-item notification-list">

                    <a class="nav-link waves-light waves-effect" href="#" id="btn-fullscreen">

                        <i class="dripicons-expand noti-icon"></i>

                    </a>

                </li>

                <!--logout dropdown button-->

                <li class="list-inline-item dropdown notification-list">

                    <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"

                       aria-haspopup="false" aria-expanded="false">

                        <img src="{{asset('admin_assets/images/avatar-1.jpg')}}" alt="user" class="rounded-circle">

                    </a>

                    <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">

                        <!-- admin name-->

                        <div class="dropdown-item noti-title">

                            <h5 class="text-overflow"><small>Hello</small> </h5>

                        </div>

                        <!-- logout-->

                        {{-- <a class="dropdown-item notify-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                            <i class="zmdi zmdi-power"></i> <span>Logout</span>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                                {{ csrf_field() }}

                            </form>
                        </a> --}}
                    </div>

                </li>

            </ul>

            <!--left sidebar toggle-->

            <ul class="list-inline menu-left mb-0">

                <li class="float-left">

                    <button class="button-menu-mobile open-left waves-light waves-effect">

                        <i class="dripicons-menu"></i>

                    </button>

                </li>

            </ul>

        </nav>

    </div>

    <!-- Top Bar End -->

    <!-- ============================================================== -->

    <!-- Start right Content here -->

    <!-- ============================================================== -->

    <div class="content-page">

        <!-- Start content -->

        <div class="content">

            <div class="container-fluid">

                @yield('content')

            </div> <!-- container -->

        </div> <!-- content -->

            <footer class="footer text-right">

                Conversion &copy; 2019 All rights reserved.

            </footer>

    </div>

    <!-- ============================================================== -->

    <!-- End Right content here -->

    <!-- ============================================================== -->

    <!-- ========== Left Sidebar Start ========== -->

    <div class="left side-menu">

        <div class="sidebar-inner slimscrollleft">

            <!--- Divider -->

            <div id="sidebar-menu">

                <ul>

                    <li><a href="{{route('home')}}" class="waves-effect"><i class="md-dashboard"></i> <span> Home </span></a></li>
                    <li><a href="{{route('about.index')}}" class="waves-effect"><i class="ion-person"></i> <span> About </span></a></li>
                    <li><a href="{{route('why-us.index')}}" class="waves-effect"><i class="ion-person"></i> <span> Why Us </span></a></li>
                    <li><a href="{{route('feature.index')}}" class="waves-effect"><i class="ion-person"></i> <span> Features </span></a></li>
                    <li><a href="{{route('service.index')}}" class="waves-effect"><i class="ion-person"></i> <span> Services </span></a></li>
                    <li><a href="{{route('speed-service.index')}}" class="waves-effect"><i class="ion-person"></i> <span> Speed Services </span></a></li>
                    <li><a href="{{route('tag.index')}}" class="waves-effect"><i class="ion-person"></i> <span> Tags </span></a></li>
                    <li><a href="{{route('blog.index')}}" class="waves-effect"><i class="ion-person"></i> <span> Blogs </span></a></li>
                    <li><a href="{{route('client.index')}}" class="waves-effect"><i class="ion-person"></i> <span> Clients </span></a></li>
                    <li><a href="{{route('request-service.index')}}" class="waves-effect"><i class="ion-person"></i> <span> Requested Services </span></a></li>
                    <li><a href="{{route('seo-score.index')}}" class="waves-effect"><i class="ion-person"></i> <span> Seo Score </span></a></li>
                    <li><a href="{{route('subscribe.index')}}" class="waves-effect"><i class="ion-person"></i> <span> Subscribers </span></a></li>
                    <li><a href="{{route('contact-us.index')}}" class="waves-effect"><i class="ion-person"></i> <span> Contact Us </span></a></li>
                    <li><a href="{{route('information.index')}}" class="waves-effect"><i class="ion-person"></i> <span> Information </span></a></li>

                    {{-- <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class="md-insert-drive-file"></i><span> Events </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled" style="display: none;">
                            <li><a href="{{url('admin/events')}}" class="waves-effect">Events Details</a></li>
                            <li><a href="{{url('admin/tickets')}}" class="waves-effect">Tickets Details</a></li>
                        </ul>
                    </li> --}}

                </ul>

                <div class="clearfix"></div>

            </div>

            <div class="clearfix"></div>

        </div>

    </div>

    <!-- Left Sidebar End -->

</div>

<!-- END wrapper -->

<script>

    var resizefunc = [];

</script>

<!-- jQuery  -->
<script src="{{asset('admin_assets/js/jquery.min.js')}}"></script>
<script src="{{asset('admin_assets/js/popper.min.js')}}"></script><!-- Popper for Bootstrap -->
<script src="{{asset('admin_assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin_assets/js/detect.js')}}"></script>
<script src="{{asset('admin_assets/js/fastclick.js')}}"></script>
<script src="{{asset('admin_assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('admin_assets/js/jquery.blockUI.js')}}"></script>
<script src="{{asset('admin_assets/js/waves.js')}}"></script>
<script src="{{asset('admin_assets/js/wow.min.js')}}"></script>
<script src="{{asset('admin_assets/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('admin_assets/js/jquery.scrollTo.min.js')}}"></script>

<!--Morris Chart-->
<script src="{{asset('admin_assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/raphael/raphael-min.js')}}"></script>
{{-- <script src="{{asset('admin_assets/pages/morris.init.js')}}"></script> --}}

<script src="{{asset('admin_assets/js/jquery.core.js')}}"></script>
<script src="{{asset('admin_assets/js/jquery.app.js')}}"></script>

<!-- jQuery  -->

<script src="{{asset('admin_assets/plugins/moment/moment.js')}}"></script>

<script src="{{asset('admin_assets/plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>

<script src="{{asset('admin_assets/plugins/dropzone/dropzone.js')}}"></script>

<script src="{{asset('admin_assets/plugins/select2/js/select2.min.js')}}" type="text/javascript"></script>

<script src="{{asset('admin_assets/plugins/bootstrap-table/js/bootstrap-table.js')}}"></script>
<script src="{{asset('admin_assets/pages/jquery.bs-table.js')}}"></script>
<!-- Modal-Effect -->
<script src="{{asset('admin_assets/plugins/custombox/js/custombox.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/custombox/js/legacy.min.js')}}"></script>

<!-- chatjs  -->

<script src="{{asset('admin_assets/pages/jquery.chat.js')}}"></script>

<script src="{{asset('admin_assets/plugins/peity/jquery.peity.min.js')}}"></script>

<script src="{{asset('admin_assets/pages/jquery.dashboard_2.js')}}"></script>

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="{{asset('admin_assets/plugins/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('admin_assets/plugins/switchery/js/switchery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin_assets/plugins/multiselect/js/jquery.multi-select.js')}}"></script>
<script type="text/javascript" src="{{asset('admin_assets/plugins/jquery-quicksearch/jquery.quicksearch.js')}}"></script>
<script src="{{asset('admin_assets/plugins/bootstrap-select/js/bootstrap-select.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin_assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin_assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js')}}" type="text/javascript"></script>
<script src="{{asset('admin_assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('admin_assets/pages/jquery.form-advanced.init.js')}}"></script>
<script src="{{asset('admin_assets/plugins/owl.carousel/dist/owl.carousel.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        if($("#content").length > 0){
            tinymce.init({
                selector: "textarea#content",
                theme: "modern",
                height:300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
                style_formats: [
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ]
            });
        }

        if($("#content2").length > 0){
            tinymce.init({
                selector: "textarea#content2",
                theme: "modern",
                height:300,
                directionality : "rtl",
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table contextmenu directionality emoticons template paste textcolor"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
                style_formats: [
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ]
            });
        }

        //owl carousel
        $("#owl-slider").owlCarousel({
            loop:true,
            nav:false,
            autoplay:true,
            autoplayTimeout:4000,
            autoplayHoverPause:true,
            animateOut: 'fadeOut',
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });
    });
</script>

@yield('scripts')

</body>

</html>

