@extends('layouts.admin')

@section('styles')
    
<style type="text/css">
    #map {
        width: 100%;
        height: 400px;
    }
</style>
@endsection

@section('content')
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @elseif(Session::has('danger'))
                <div class="alert alert-danger">{{ Session::get('danger') }}</div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-20">{{$item->name}}</h4>

                <table class="table table-bordered table-striped">
                    <tbody>                        
                        <tr>
                            <td>الوصف</td>
                            <td>{{ $item->description }}</td>
                        </tr>                       
                        <tr>
                            <td>السعر</td>
                            <td>{{ $item->price }} ريال سعودي</td>
                        </tr>                       
                        <tr>
                            <td>المساحة</td>
                            <td>{{ $item->area }} متر مربع</td>
                        </tr>                       
                        <tr>
                            <td>رقم الجوال</td>
                            <td>{{ $item->phone }}</td>
                        </tr>                       
                        <tr>
                            <td>القسم</td>
                            <td>{{ $item->category->name }}</td>
                        </tr>                       
                        <tr>
                            <td>المالك</td>
                            <td>{{ $item->owner->name }}</td>
                        </tr>                       
                        <tr>
                            <td>مميزة</td>
                            <td>{{ $item->featured === 1 ? 'مميزة' : 'غير مميزة' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-20">الصور</h4>

                <table class="table table-bordered table-striped">
                    <tbody>
                
                        <tr>
                            <td>الصورة الاساسية</td>
                            <td><img src="{{asset('admin_assets/images/item/'.$item->main_image)}}" class="img-responsive" width="100px" height="100px"></td>
                        </tr>
                
                        <tr>
                            <td>الصور</td>
                            <td>
                                @foreach($images as $image)
                                    <img src="{{asset('admin_assets/images/item/'.$image->image)}}" class="img-responsive" width="100px" height="100px">
                                @endforeach
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-20">الموقع</h4>

                <table class="table table-bordered table-striped">
                    <tbody>
                
                        <tr>
                            <td>المدينة</td>
                            <td>{{ $item->city->name }}</td>
                        </tr>
                        
                        <tr>
                            <td>الحى</td>
                            <td>{{ $item->district->name }}</td>
                        </tr>
                        
                        <tr>
                            <td>الخريطة</td>
                            <td><div id="map"></div></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>

            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-20">الخصائص</h4>

                <table class="table table-bordered table-striped">
                    <tbody>
                        @foreach($attributes as $attribute)
                            <tr>
                                <td>{{$attribute->attribute_value->attribute->name}}</td>
                                <td>{{ $attribute->attribute_value->value }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-20">المميزات</h4>

                <table class="table table-bordered table-striped">
                    <tbody>
                
                        @foreach($options as $option)
                            <tr>
                                <td>{{ $option->option->name }}</td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>

        </div><!-- end col -->
    </div>
        
@endsection

@section('scripts')
    <script>
        
        function initMap() {
            var myLatLng = {lat: {{$item->lat}}, lng: {{$item->lang}}};
        
            var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 15
            });
        
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Hello World!',
                draggable: false
                });
        
        }
        
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap" async defer></script>
         
@endsection