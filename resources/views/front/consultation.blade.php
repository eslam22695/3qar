@extends('layouts.index')

@section('content')

<section class="banner-about">
    <div class="container">
        <div class="d-flex justify-content-between  align-items-center pb-3">
            <h3>خدمات اخري</h3>
        </div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('index')}}">الصفحه الرئيسيه</a></li>
                <li class="breadcrumb-item active" aria-current="page">خدمات اخرى</li>
            </ol>
        </nav>

    </div>
</section>


<!--------start contact us-------->

<section class="pt-5 contact-us">
    <div class="Special">
        <div class="container">
            <div class="head  wow fadeInRight" >
                <h2 class="mb-5">  خدمات اخرى </h2>
            </div>
            <div class="row mt-5">
                <div class="col-sm-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @elseif(Session::has('danger'))
                        <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                    @endif
                </div>
                <div class="col-md-12">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger"><strong>{{ $error }}</strong></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-6 wow fadeInUp"  data-wow-duration=".5s">
                    <form method="Post" action="{{url('consultation')}}" class="contact-form">
                            {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <select class="form-control" required name="service_id">
                                    <option value="" disabled selected>الاستشارة</option>
                                    @if($services != null)
                                        @foreach($services as $service)
                                            <option value="{{$service->id}}">{{$service->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="text" class="form-control" name="name" placeholder="الاسم " required {{old('name')}}>
                                @if ($errors->has('name'))
                                    <span class="alert alert-danger">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="email" class="form-control" name="email" placeholder="البريد الالكتروني" required {{old('email')}}>
                                @if ($errors->has('email'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            {{--<div class="col-md-12 mb-3">--}}
                                <div class="col-md-12 mb-3">
                                    <input type="text" class="form-control" name="phone" placeholder="رقم الجوال" required {{old('phone')}}>
                                    @if ($errors->has('phone'))
                                        <span class="alert alert-danger">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            {{--</div>--}}
                            <div class="col-md-12 mb-3">
                                <textarea class="form-control textarea input" rows="8" placeholder="رسالة" name="message" required></textarea>
                                @if ($errors->has('message'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <input type="submit"  class="btn btn-primary" value="ارسال">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
<!-------end contact us----------->

@endsection