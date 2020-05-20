@extends('layouts.index')

@section('content')


<!--------start 3akar -------------->
<section class="Special filter">
    <div class="container">

        <div class="head pb-5 wow fadeInRight d-flex justify-content-between  align-items-center pb-3"  data-wow-duration="2s">
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
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
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
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"><span class="checkbox-material"><span class="check"></span></span> الرياض
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"><span class="checkbox-material"><span class="check"></span></span> مكه
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"><span class="checkbox-material"><span class="check"></span></span> جده
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <span>الحي</span>
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-plus"></i></button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">	<div class=" coloured">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"><span class="checkbox-material"><span class="check"></span></span> الرياض
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"><span class="checkbox-material"><span class="check"></span></span> مكه
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"><span class="checkbox-material"><span class="check"></span></span> جده
                                        </label>
                                    </div>
                                </div></div>
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
                                    <input class="prices-text" type="text" placeholder="السعر"  name="Prices">
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
                                    <input class="prices-text" type="text" placeholder="المساحه"  name="Prices">
                                </div></div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-around  align-items-center pb-3 mt-5">
                        <a href="#" class="btn btn-dark">اعاده ضبط</a>
                        <a href="#" class="btn btn-primary">بحث</a>

                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-6">
                <div class="row">
                    <div class=" col-md-6 mb-3 wow fadeIn" data-wow-delay=".5s">
                        <div class="card shadow-lg">
                            <div class="image-wrapper">
                                <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                <img src="./img/2.jpg" alt="spongebob crew" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">شقه للبيع في الرياض ب الف ريال بعد الخصم 410</h5>
                                <p class="card-text">توين هاوس للبيع 431 م + حديقة 120 م خلف مول مباشرة بأرقى وافضل لوكيشن بمدينة
                                    أكتوبر نفسك تسكن فى فيلا...</p>
                                <span class="icon-p pt-3">
                        <img class="icon-img" src="img/67872.png">
                        الحي المتميز/الرياض </span>
                                <div class="d-flex justify-content-between  align-items-center ">
                            <span class="icon-p">
                                 <img class="icon-img" src="img/burj-al-arab.png">
                                انيوهاوس  </span>
                                    <span class="icon-p">
                                  <img class="icon-img" src="img/expand.png">
                                  431 متر </span>
                                    <span class="icon-p">
                                  <img class="icon-img" src="img/bed.png">
                                  غرفه </span>
                                    <span class="icon-p">
                                    <img class="icon-img" src="img/bath.png">
                                    حمام </span>

                                </div>
                                <p><a href="#"> <strong>3,900,000 ريال</strong> </a></p>
                                <a href="./filter-details.html" class="btn btn-primary">شاهد</a>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-6 mb-3 wow fadeIn" data-wow-delay=".7s">
                        <div class="card shadow-lg">
                            <div class="image-wrapper">
                                <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                <img src="./img/2.jpg" alt="spongebob crew" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">شقه للبيع في الرياض ب الف ريال بعد الخصم 410</h5>
                                <p class="card-text">توين هاوس للبيع 431 م + حديقة 120 م خلف مول مباشرة بأرقى وافضل لوكيشن بمدينة
                                    أكتوبر نفسك تسكن فى فيلا...</p>
                                <span class="icon-p pt-3">
                        <img class="icon-img" src="img/67872.png">
                        الحي المتميز/الرياض </span>
                                <div class="d-flex justify-content-between  align-items-center ">
                            <span class="icon-p">
                                 <img class="icon-img" src="img/burj-al-arab.png">
                                انيوهاوس  </span>
                                    <span class="icon-p">
                                  <img class="icon-img" src="img/expand.png">
                                  431 متر </span>
                                    <span class="icon-p">
                                  <img class="icon-img" src="img/bed.png">
                                  غرفه </span>
                                    <span class="icon-p">
                                    <img class="icon-img" src="img/bath.png">
                                    حمام </span>

                                </div>
                                <p><a href="#"> <strong>3,900,000 ريال</strong> </a></p>
                                <a href="./filter-details.html" class="btn btn-primary">شاهد</a>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-6 mb-3 wow fadeIn" data-wow-delay=".9s">
                        <div class="card shadow-lg">
                            <div class="image-wrapper">
                                <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                <img src="./img/2.jpg" alt="spongebob crew" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">شقه للبيع في الرياض ب الف ريال بعد الخصم 410</h5>
                                <p class="card-text">توين هاوس للبيع 431 م + حديقة 120 م خلف مول مباشرة بأرقى وافضل لوكيشن بمدينة
                                    أكتوبر نفسك تسكن فى فيلا...</p>
                                <span class="icon-p pt-3">
                        <img class="icon-img" src="img/67872.png">
                        الحي المتميز/الرياض </span>
                                <div class="d-flex justify-content-between  align-items-center ">
                            <span class="icon-p">
                                 <img class="icon-img" src="img/burj-al-arab.png">
                                انيوهاوس  </span>
                                    <span class="icon-p">
                                  <img class="icon-img" src="img/expand.png">
                                  431 متر </span>
                                    <span class="icon-p">
                                  <img class="icon-img" src="img/bed.png">
                                  غرفه </span>
                                    <span class="icon-p">
                                    <img class="icon-img" src="img/bath.png">
                                    حمام </span>

                                </div>
                                <p><a href="#"> <strong>3,900,000 ريال</strong> </a></p>
                                <a href="./filter-details.html" class="btn btn-primary">شاهد</a>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-6 mb-3 wow fadeIn" data-wow-delay="1.2s">
                        <div class="card shadow-lg">
                            <div class="image-wrapper">
                                <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                <img src="./img/2.jpg" alt="spongebob crew" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">شقه للبيع في الرياض ب الف ريال بعد الخصم 410</h5>
                                <p class="card-text">توين هاوس للبيع 431 م + حديقة 120 م خلف مول مباشرة بأرقى وافضل لوكيشن بمدينة
                                    أكتوبر نفسك تسكن فى فيلا...</p>
                                <span class="icon-p pt-3">
                        <img class="icon-img" src="img/67872.png">
                        الحي المتميز/الرياض </span>
                                <div class="d-flex justify-content-between  align-items-center ">
                            <span class="icon-p">
                                 <img class="icon-img" src="img/burj-al-arab.png">
                                انيوهاوس  </span>
                                    <span class="icon-p">
                                  <img class="icon-img" src="img/expand.png">
                                  431 متر </span>
                                    <span class="icon-p">
                                  <img class="icon-img" src="img/bed.png">
                                  غرفه </span>
                                    <span class="icon-p">
                                    <img class="icon-img" src="img/bath.png">
                                    حمام </span>

                                </div>
                                <p><a href="#"> <strong>3,900,000 ريال</strong> </a></p>
                                <a href="./filter-details.html" class="btn btn-primary">شاهد</a>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-6 mb-3 wow fadeIn" data-wow-delay="1.3s">
                        <div class="card shadow-lg">
                            <div class="image-wrapper">
                                <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                <img src="./img/2.jpg" alt="spongebob crew" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">شقه للبيع في الرياض ب الف ريال بعد الخصم 410</h5>
                                <p class="card-text">توين هاوس للبيع 431 م + حديقة 120 م خلف مول مباشرة بأرقى وافضل لوكيشن بمدينة
                                    أكتوبر نفسك تسكن فى فيلا...</p>
                                <span class="icon-p pt-3">
                        <img class="icon-img" src="img/67872.png">
                        الحي المتميز/الرياض </span>
                                <div class="d-flex justify-content-between  align-items-center ">
                            <span class="icon-p">
                                 <img class="icon-img" src="img/burj-al-arab.png">
                                انيوهاوس  </span>
                                    <span class="icon-p">
                                  <img class="icon-img" src="img/expand.png">
                                  431 متر </span>
                                    <span class="icon-p">
                                  <img class="icon-img" src="img/bed.png">
                                  غرفه </span>
                                    <span class="icon-p">
                                    <img class="icon-img" src="img/bath.png">
                                    حمام </span>

                                </div>
                                <p><a href="#"> <strong>3,900,000 ريال</strong> </a></p>
                                <a href="./filter-details.html" class="btn btn-primary">شاهد</a>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-6 mb-3 wow fadeIn" data-wow-delay="1.5">
                        <div class="card shadow-lg">
                            <div class="image-wrapper">
                                <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
                                <img src="./img/2.jpg" alt="spongebob crew" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">شقه للبيع في الرياض ب الف ريال بعد الخصم 410</h5>
                                <p class="card-text">توين هاوس للبيع 431 م + حديقة 120 م خلف مول مباشرة بأرقى وافضل لوكيشن بمدينة
                                    أكتوبر نفسك تسكن فى فيلا...</p>
                                <span class="icon-p pt-3">
                        <img class="icon-img" src="img/67872.png">
                        الحي المتميز/الرياض </span>
                                <div class="d-flex justify-content-between  align-items-center ">
                            <span class="icon-p">
                                 <img class="icon-img" src="img/burj-al-arab.png">
                                انيوهاوس  </span>
                                    <span class="icon-p">
                                  <img class="icon-img" src="img/expand.png">
                                  431 متر </span>
                                    <span class="icon-p">
                                  <img class="icon-img" src="img/bed.png">
                                  غرفه </span>
                                    <span class="icon-p">
                                    <img class="icon-img" src="img/bath.png">
                                    حمام </span>

                                </div>
                                <p><a href="#"> <strong>3,900,000 ريال</strong> </a></p>
                                <a href="./filter-details.html" class="btn btn-primary">شاهد</a>
                            </div>
                        </div>
                    </div>

                    <nav class="m-auto" aria-label="...">
                        <ul class="pagination shadow-sm mt-5">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active" aria-current="page">
                          <span class="page-link">
                            2
                            <span class="sr-only">(current)</span>
                          </span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>
</section>
<!--------end 3akar -------------->
@endsection