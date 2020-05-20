@extends('layouts.index')

@section('content')

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
                                    <span>(4)</span>
                                </div></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                                <div class="d-flex justify-content-between  align-items-center">
                                    <span>العقارات المتواصل بخصوصها</span>
                                    <span>(4)</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="out-tab" data-toggle="tab" href="#out" role="tab" aria-controls="out" aria-selected="false">خروج</a>
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
                                    <a href=""><h4 class="dark-color"><strong>تعديل</strong></h4></a>
                                </div>
                                <div class="row shadow-lg p-3">
                                    <div class="col-12">
                                        <div class="d-flex justify-content-start  align-items-center user-profile">
                                            <p class="width-name">الاسم</p>
                                            <p class="margin-profile">مني مدحت امين</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-start  align-items-center user-profile">
                                            <p class="width-name">البريد الالكتروني</p>
                                            <p class="margin-profile">monasrk@gmail.com</p>
                                        </div>
                                    </div>
                                    <div class="col-12">

                                        <div class="d-flex justify-content-start  align-items-center user-profile">
                                            <p class="width-name">رقم الجوال</p>
                                            <p class="margin-profile">01114582358</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-start  align-items-center user-profile">
                                            <p class="width-name">تاريخ الميلاد</p>
                                            <p class="margin-profile">25/1/1995</p>
                                        </div>
                                    </div>
                                    <div class="col-12">

                                        <div class="d-flex justify-content-start  align-items-center user-profile">
                                            <p class="width-name">رقم المرور</p>
                                            <p class="margin-profile">M998752453</p>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="container">
                                <h4>الاعلانات المحفوظه</h4>
                                <div class="row">

                                    <div class="col-md-6 mb-3 " >
                                        <div class="card shadow-lg">
                                            <div class="image-wrapper">
                                                <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                                <img src="./img/3.jpg" alt="spongebob crew" />
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">شقه للبيع في الرياض ب الف ريال بعد الخصم 410</h5>
                                                <p class="card-text">توين هاوس للبيع 431 م + حديقة 120 م خلف مول مباشرة بأرقى وافضل لوكيشن بمدينة
                                                    أكتوبر نفسك تسكن فى فيلا...</p>
                                                <i class="	fa fa-location-arrow icon-home">
                                                    الحي المتميز/الرياض </i>
                                                <div class="d-flex justify-content-between  align-items-center pb-3">
                                                    <i class="fa fa-home">   متر </i>
                                                    <i class="	fa fa-bath	"> متر </i>
                                                    <i class="fa fa-bed"> متر </i>
                                                    <i class="	fa fa-arrows-alt"> متر </i>
                                                </div>
                                                <p><a href="#">3,900,000 ريال </a></p>
                                                <a href="./filter.html" class="btn btn-primary">شاهد</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 " >
                                        <div class="card shadow-lg">
                                            <div class="image-wrapper">
                                                <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                                <img src="./img/3.jpg" alt="spongebob crew" />
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">شقه للبيع في الرياض ب الف ريال بعد الخصم 410</h5>
                                                <p class="card-text">توين هاوس للبيع 431 م + حديقة 120 م خلف مول مباشرة بأرقى وافضل لوكيشن بمدينة
                                                    أكتوبر نفسك تسكن فى فيلا...</p>
                                                <i class="	fa fa-location-arrow icon-home">
                                                    الحي المتميز/الرياض </i>
                                                <div class="d-flex justify-content-between  align-items-center pb-3">
                                                    <i class="fa fa-home">   متر </i>
                                                    <i class="	fa fa-bath	"> متر </i>
                                                    <i class="fa fa-bed"> متر </i>
                                                    <i class="	fa fa-arrows-alt"> متر </i>
                                                </div>
                                                <p><a href="#">3,900,000 ريال </a></p>
                                                <a href="./filter.html" class="btn btn-primary">شاهد</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 " >
                                        <div class="card shadow-lg">
                                            <div class="image-wrapper">
                                                <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                                <img src="./img/3.jpg" alt="spongebob crew" />
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">شقه للبيع في الرياض ب الف ريال بعد الخصم 410</h5>
                                                <p class="card-text">توين هاوس للبيع 431 م + حديقة 120 م خلف مول مباشرة بأرقى وافضل لوكيشن بمدينة
                                                    أكتوبر نفسك تسكن فى فيلا...</p>
                                                <i class="	fa fa-location-arrow icon-home">
                                                    الحي المتميز/الرياض </i>
                                                <div class="d-flex justify-content-between  align-items-center pb-3">
                                                    <i class="fa fa-home">   متر </i>
                                                    <i class="	fa fa-bath	"> متر </i>
                                                    <i class="fa fa-bed"> متر </i>
                                                    <i class="	fa fa-arrows-alt"> متر </i>
                                                </div>
                                                <p><a href="#">3,900,000 ريال </a></p>
                                                <a href="./filter.html" class="btn btn-primary">شاهد</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 " >
                                        <div class="card shadow-lg">
                                            <div class="image-wrapper">
                                                <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                                <img src="./img/3.jpg" alt="spongebob crew" />
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">شقه للبيع في الرياض ب الف ريال بعد الخصم 410</h5>
                                                <p class="card-text">توين هاوس للبيع 431 م + حديقة 120 م خلف مول مباشرة بأرقى وافضل لوكيشن بمدينة
                                                    أكتوبر نفسك تسكن فى فيلا...</p>
                                                <i class="	fa fa-location-arrow icon-home">
                                                    الحي المتميز/الرياض </i>
                                                <div class="d-flex justify-content-between  align-items-center pb-3">
                                                    <i class="fa fa-home">   متر </i>
                                                    <i class="	fa fa-bath	"> متر </i>
                                                    <i class="fa fa-bed"> متر </i>
                                                    <i class="	fa fa-arrows-alt"> متر </i>
                                                </div>
                                                <p><a href="#">3,900,000 ريال </a></p>
                                                <a href="./filter.html" class="btn btn-primary">شاهد</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="container">
                                <h4>العقارات المتواصل بخصوصها</h4>
                                <div class="row">

                                    <div class="col-md-6 mb-3 " >
                                        <div class="card shadow-lg">
                                            <div class="image-wrapper">
                                                <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                                <img src="./img/3.jpg" alt="spongebob crew" />
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">شقه للبيع في الرياض ب الف ريال بعد الخصم 410</h5>
                                                <p class="card-text">توين هاوس للبيع 431 م + حديقة 120 م خلف مول مباشرة بأرقى وافضل لوكيشن بمدينة
                                                    أكتوبر نفسك تسكن فى فيلا...</p>
                                                <i class="	fa fa-location-arrow icon-home">
                                                    الحي المتميز/الرياض </i>
                                                <div class="d-flex justify-content-between  align-items-center pb-3">
                                                    <i class="fa fa-home">   متر </i>
                                                    <i class="	fa fa-bath	"> متر </i>
                                                    <i class="fa fa-bed"> متر </i>
                                                    <i class="	fa fa-arrows-alt"> متر </i>
                                                </div>
                                                <p><a href="#">3,900,000 ريال </a></p>
                                                <a href="./filter.html" class="btn btn-primary">شاهد</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 " >
                                        <div class="card shadow-lg">
                                            <div class="image-wrapper">
                                                <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                                <img src="./img/3.jpg" alt="spongebob crew" />
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">شقه للبيع في الرياض ب الف ريال بعد الخصم 410</h5>
                                                <p class="card-text">توين هاوس للبيع 431 م + حديقة 120 م خلف مول مباشرة بأرقى وافضل لوكيشن بمدينة
                                                    أكتوبر نفسك تسكن فى فيلا...</p>
                                                <i class="	fa fa-location-arrow icon-home">
                                                    الحي المتميز/الرياض </i>
                                                <div class="d-flex justify-content-between  align-items-center pb-3">
                                                    <i class="fa fa-home">   متر </i>
                                                    <i class="	fa fa-bath	"> متر </i>
                                                    <i class="fa fa-bed"> متر </i>
                                                    <i class="	fa fa-arrows-alt"> متر </i>
                                                </div>
                                                <p><a href="#">3,900,000 ريال </a></p>
                                                <a href="./filter.html" class="btn btn-primary">شاهد</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 " >
                                        <div class="card shadow-lg">
                                            <div class="image-wrapper">
                                                <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                                <img src="./img/3.jpg" alt="spongebob crew" />
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">شقه للبيع في الرياض ب الف ريال بعد الخصم 410</h5>
                                                <p class="card-text">توين هاوس للبيع 431 م + حديقة 120 م خلف مول مباشرة بأرقى وافضل لوكيشن بمدينة
                                                    أكتوبر نفسك تسكن فى فيلا...</p>
                                                <i class="	fa fa-location-arrow icon-home">
                                                    الحي المتميز/الرياض </i>
                                                <div class="d-flex justify-content-between  align-items-center pb-3">
                                                    <i class="fa fa-home">   متر </i>
                                                    <i class="	fa fa-bath	"> متر </i>
                                                    <i class="fa fa-bed"> متر </i>
                                                    <i class="	fa fa-arrows-alt"> متر </i>
                                                </div>
                                                <p><a href="#">3,900,000 ريال </a></p>
                                                <a href="./filter.html" class="btn btn-primary">شاهد</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3 " >
                                        <div class="card shadow-lg">
                                            <div class="image-wrapper">
                                                <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                                <img src="./img/3.jpg" alt="spongebob crew" />
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title">شقه للبيع في الرياض ب الف ريال بعد الخصم 410</h5>
                                                <p class="card-text">توين هاوس للبيع 431 م + حديقة 120 م خلف مول مباشرة بأرقى وافضل لوكيشن بمدينة
                                                    أكتوبر نفسك تسكن فى فيلا...</p>
                                                <i class="	fa fa-location-arrow icon-home">
                                                    الحي المتميز/الرياض </i>
                                                <div class="d-flex justify-content-between  align-items-center pb-3">
                                                    <i class="fa fa-home">   متر </i>
                                                    <i class="	fa fa-bath	"> متر </i>
                                                    <i class="fa fa-bed"> متر </i>
                                                    <i class="	fa fa-arrows-alt"> متر </i>
                                                </div>
                                                <p><a href="#">3,900,000 ريال </a></p>
                                                <a href="./filter.html" class="btn btn-primary">شاهد</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="out" role="tabpanel" aria-labelledby="out-tab">
                        </div>

                    </div>
                </div>
                <!-- /.col-md-8 -->
            </div>



        </div>

    </section>
    <!--------end profile-------------->

@endsection