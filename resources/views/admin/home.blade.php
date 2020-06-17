@extends('layouts.admin')

@section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->

    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="main-title-00">
                <h4 class="page-title">الرئيسيه</h4>
                <p class="text-muted page-title-alt">مرحبا فى لوحة ادارة موقع العتيق جروب</p>
            </div>
            
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="widget-bg-color-icon card-box fadeInDown animated">
                <div class="bg-icon bg-icon-info pull-left">
                    <i class="md md-attach-money text-info"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark"><b class="counter">{{App\Category::where('status',1)->count()}}</b></h3>
                    <p class="text-muted mb-0">الاقسام</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="widget-bg-color-icon card-box">
                <div class="bg-icon bg-icon-pink pull-left">
                    <i class="md md-add-shopping-cart text-pink"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark"><b class="counter">{{App\Item::count()}}</b></h3>
                    <p class="text-muted mb-0">العقارات</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="widget-bg-color-icon card-box">
                <div class="bg-icon bg-icon-purple pull-left">
                    <i class="ion-man"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark"><b class="counter">{{App\User::count()}}</b></h3>
                    <p class="text-muted mb-0">الاعضاء</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="widget-bg-color-icon card-box">
                <div class="bg-icon bg-icon-success pull-left">
                    <i class="ion-person"></i>
                </div>
                <div class="text-right">
                    <h3 class="text-dark"><b class="counter">{{App\Owner::count()}}</b></h3>
                    <p class="text-muted mb-0">الملاك</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>


    <div class="row">
    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="widget-bg-color-icon card-box fadeInDown animated">
            <div class="bg-icon bg-icon-info pull-left">
                <i class="md md-attach-money text-info"></i>
            </div>
            <div class="text-right">
                <h3 class="text-dark"><b class="counter">{{App\Blog::count()}}</b></h3>
                <p class="text-muted mb-0">المدونات </p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-icon-pink pull-left">
                <i class="md md-add-shopping-cart text-pink"></i>
            </div>
            <div class="text-right">
                <h3 class="text-dark"><b class="counter">{{App\Contact::count()}}</b></h3>
                <p class="text-muted mb-0">طلبات التواصل</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-icon-purple pull-left">
                <i class="md md-equalizer text-purple"></i>
            </div>
            <div class="text-right">
                <h3 class="text-dark"><b class="counter">{{App\Service::count()}}</b></h3>
                <p class="text-muted mb-0">خدمات</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-icon-success pull-left">
                <i class="md md-remove-red-eye text-success"></i>
            </div>
            <div class="text-right">
                <h3 class="text-dark"><b class="counter">{{App\ServiceRequest::count()}}</b></h3>
                <p class="text-muted mb-0">طلبات الخدمات</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>



    <div class="row">
    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="widget-bg-color-icon card-box fadeInDown animated">
            <div class="bg-icon bg-icon-info pull-left">
                <i class="md md-attach-money text-info"></i>
            </div>
            <div class="text-right">
                <h3 class="text-dark"><b class="counter">{{App\City::count()}}</b></h3>
                <p class="text-muted mb-0">المدن</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-icon-pink pull-left">
                <i class="md md-add-shopping-cart text-pink"></i>
            </div>
            <div class="text-right">
                <h3 class="text-dark"><b class="counter">{{App\District::count()}}</b></h3>
                <p class="text-muted mb-0">الاحياء</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-icon-purple pull-left">
                <i class="md md-equalizer text-purple"></i>
            </div>
            <div class="text-right">
                <h3 class="text-dark"><b class="counter">{{Spatie\Permission\Models\Role::count()}}</b></h3>
                <p class="text-muted mb-0">الادوار</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-6 col-lg-6 col-xl-3">
        <div class="widget-bg-color-icon card-box">
            <div class="bg-icon bg-icon-success pull-left">
                <i class="ion-person-stalker"></i>
            </div>
            <div class="text-right">
                <h3 class="text-dark"><b class="counter">{{App\Admin::count()}}</b></h3>
                <p class="text-muted mb-0">مسئولين</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->

{{-- <section class="">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                    <form style=" background: #fff;  padding: 30px;  box-shadow: -2px 7px 13px #e8e8e8dd; " action="">
                        <img src="{{asset('website/ar/imgs/Logo-2.png')}}" class="img-responsive" alt="logo" style="margin: auto; display: table; margin: auto; display: table; width: 113px; height: 100px; margin-bottom: 17px;" />
                        <div class="form-group">
                            <label > تعديل اسم المستخدم </label>
                            <input type="email" name="email" class="form-control" placeholder=" ادخل الاسم  ">
                        </div>
                        <div class="form-group">
                            <label > تعديل كلمة المرور </label>
                            <input type="password" name="password" class="form-control" placeholder=" ادخل كلمة المرور ">
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin: auto; display: table; padding: 8px 20px;"> تعديل </button>
                </form>
            </div>
        </div>
    </div>
</section> --}}
@endsection
