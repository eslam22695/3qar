@extends('layouts.admin')

@section('styles')
    <!-- Plugins css-->
    <link href="{{asset('admin_assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link href="{{asset('admin_assets/plugins/switchery/css/switchery.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin_assets/plugins/multiselect/css/multi-select.css')}}"  rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/plugins/bootstrap-select/css/bootstrap-select.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin_assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin_assets/plugins/bootstrap-table/css/bootstrap-table.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/plugins/custombox/css/custombox.css')}}" rel="stylesheet">

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
        <div class="col-md-12">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="alert alert-danger"><strong>{{ $error }}</strong></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-20">اضافه مدينة </h4>

                <table class="table table-bordered table-striped">
                    {{Form::open(['method'=>'POST','action' => ['admin\CityController@store'], 'files' => true])}}
                        <tbody>
                        

                            <tr>
                                <td>الاسم</td>
                                <td>
                                    <input type="text" class="form-control" name="name" required {{old('name')}}>
                                    @if ($errors->has('name'))
                                        <p class="alert alert-danger">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </p>
                                    @endif
                                </td>
                                
                            </tr>

                            <tr>
                                <td>مركز المدينة</td>
                                <td>
                                    <div id="map"></div>
                                    <input type="hidden" id="lat" name="lat" value="23.8859" {{old('lat')}}>
                                    <input type="hidden" id="lang" name="lang" value="45.0792" {{old('lang')}}>
                                
                                    @if ($errors->has('lat'))
                                        <p class="alert alert-danger">
                                            <strong>{{ $errors->first('lat') }}</strong>
                                        </p>
                                    @endif
                                    @if ($errors->has('lang'))
                                        <p class="alert alert-danger">
                                            <strong>{{ $errors->first('lang') }}</strong>
                                        </p>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td style="width:25%"></td>
                                <td><button type="submit" class="btn btn-default waves-effect waves-light form-control">حفظ</button></td>
                            </tr>
                        </tbody>
                    {!! Form::close() !!}
                </table>
            </div>
        </div><!-- end col -->
    </div>
        
@endsection

@section('scripts')
    <script>
        function initMap() {
            var myLatLng = {lat: 23.8859, lng: 45.0792};
        
            var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 6
            });
        
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Hello World!',
                draggable: true
                });
        
            google.maps.event.addListener(marker, 'dragend', function(marker) {
                var latLng = marker.latLng;
                document.getElementById('lat').value = latLng.lat();
                document.getElementById('lang').value = latLng.lng();
            });
        }
        
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap" async defer></script>
         
@endsection