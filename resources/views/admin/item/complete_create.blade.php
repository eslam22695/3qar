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
                    <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-20">اضافه عقار</h4>
                {{Form::open(['method'=>'POST','action' => ['admin\ItemController@store'], 'files' => true])}}

                    <div class="tabs-vertical-env">

                        <ul class="nav tabs-vertical">
                            <li class="nav-item mb-2" style="box-shadow: 3px 3px #ccc;">
                                <a href="#v2-home" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                    التفاصيل الاساسية
                                </a>
                            </li>
                            <li class="nav-item mb-2" style="box-shadow: 3px 3px #ccc;">
                                <a href="#v2-image" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    الصور
                                </a>
                            </li>
                            <li class="nav-item mb-2" style="box-shadow: 3px 3px #ccc;">
                                <a href="#v2-location" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    الموقع
                                </a>
                            </li>
                            <li class="nav-item mb-2" style="box-shadow: 3px 3px #ccc;">
                                <a href="#v2-attribute" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    الخصائص
                                </a>
                            </li>
                            <li class="nav-item mb-2" style="box-shadow: 3px 3px #ccc;">
                                <a href="#v2-option" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    المميزات
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane active" id="v2-home">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="icon" class="control-label">اسم العقار</label>
                                            <input type="text" id="example-input-large" name="name" class="form-control input-lg"  value="{{old('name')}}">
                                            @if ($errors->has('name'))
                                                <span class="alert alert-danger">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="icon" class="control-label">وصف العقار</label>
                                            <textarea class="form-control" name="description"  > {{old('description')}}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="alert alert-danger">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="icon" class="control-label">سعر العقار</label>
                                            <input type="number" id="example-input-large" name="price" class="form-control input-lg"  value="{{old('price')}}" >
                                            @if ($errors->has('price'))
                                                <span class="alert alert-danger">
                                                    <strong>{{ $errors->first('price') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="icon" class="control-label">مساحة العقار</label>
                                            <input type="number" id="example-input-large" name="area" class="form-control input-lg"  value="{{old('area')}}">
                                            @if ($errors->has('area'))
                                                <span class="alert alert-danger">
                                                    <strong>{{ $errors->first('area') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="icon" class="control-label">رقم الجوال</label>
                                            <input type="number" id="example-input-large" name="phone" class="form-control input-lg"  min="0" value="{{old('phone')}}">
                                            @if ($errors->has('phone'))
                                                <span class="alert alert-danger">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="icon" class="control-label">القسم</label>
                                            <select class="form-control"  name="category_id">
                                                <option value="" selected disabled>إختار القسم</option>
                                                @if($cats != null)
                                                    @foreach($cats as $cat)
                                                        <option {{old('category_id') == $cat->id ? 'selected' : ''}} value="{{$cat->id}}">{{$cat->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if ($errors->has('category_id'))
                                                <span class="alert alert-danger">
                                                    <strong>{{ $errors->first('category_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="icon" class="control-label">المالك</label>
                                            <select class="form-control"  name="owner_id">
                                                <option value="" selected disabled>إختار المالك</option>
                                                @if($owners != null)
                                                    @foreach($owners as $owner)
                                                        <option {{old('owner_id') == $cat->id ? 'selected' : ''}} value="{{$owner->id}}">{{$owner->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if ($errors->has('owner_id'))
                                                <span class="alert alert-danger">
                                                    <strong>{{ $errors->first('owner_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="icon" class="control-label">مميزة</label>
                                            <input type="checkbox" checked data-plugin="switchery" data-color="#81c868" name="featured" value="1" value="{{old('featured')}}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="v2-image">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="icon" class="control-label">الصورة الرئيسية</label>
                                            <input type="file" class="filestyle" data-placeholder="No file" data-iconname="fa fa-cloud-upload" name="main_image" >
                                            @if ($errors->has('main_image'))
                                                <span class="alert alert-danger">
                                                    <strong>{{ $errors->first('main_image') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="icon" class="control-label">الصور (أقصى عدد 4)</label>
                                            <input type="file" class="filestyle" data-placeholder="No file" data-iconname="fa fa-cloud-upload" name="images[]" multiple>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="v2-location">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="icon" class="control-label">المدينة</label>
                                            <select class="form-control"  name="city_id">
                                                <option value="" selected disabled>إختار المدينة</option>
                                                @if($cities != null)
                                                    @foreach($cities as $city)
                                                        <option {{old('city_id') == $city->id ? 'selected' : ''}} value="{{$city->id}}">{{$city->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if ($errors->has('city_id'))
                                                <span class="alert alert-danger">
                                                    <strong>{{ $errors->first('city_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="icon" class="control-label">الحى</label>
                                            <select class="form-control"  name="district_id">
                                                <option value="" selected disabled>إختار الحى</option>
                                                @if(!empty($districts))
                                                    @foreach($districts as $key => $value)
                                                        <option {{old('district_id') == $key ? 'selected' : ''}} value="{{ $key }}">{{ $value }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if ($errors->has('district_id'))
                                                <span class="alert alert-danger">
                                                    <strong>{{ $errors->first('district_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div id="map"></div>
                                        <input type="hidden" id="lat" name="lat" value="23.8859" {{old('lat')}}>
                                        <input type="hidden" id="lang" name="lang" value="45.0792" {{old('lang')}}>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="v2-attribute">
                                <div class="row">
                                    @foreach($attributes as $attribute)
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="icon" class="control-label">{{$attribute->name}}</label>
                                                <select class="form-control" name="values[]">
                                                    <option value="" selected disabled>إختار قيمة</option>
                                                    @if($attribute->values() != null)
                                                        @foreach($attribute->values as $value)
                                                            <option {{old('values') == $value->value ? 'selected' : ''}} value="{{$value->id}}">{{$value->value}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="tab-pane" id="v2-option">
                                <div class="row">
                                    @foreach($options as $option)
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="icon" class="control-label"> {{$option->name}} </label>
                                                <input type="checkbox" data-plugin="switchery" data-color="#5d9cec" name="options[]" value="{{$option->id}}"/>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        
                    </div>

                    <button type="submit" class="btn btn-default waves-effect waves-light form-control">حفظ</button>

                {!! Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>
        
@endsection

@section('scripts')
    <script>
        $("select[name='city_id']").change(function(){
            var city_id = $(this).val();    
            if(city_id){
                $.ajax({
                    type:"GET",
                    url:"{{url('admin/get_districts')}}?city_id="+city_id,
                    success:function(res){               
                        if(res){
                            $("select[name='district_id']").empty();
                            $("select[name='district_id']").append('<option value="" selected disabled>إختار الحى</option>');
                            $.each(res,function(key,value){
                                $("select[name='district_id']").append('<option value="'+key+'">'+value+'</option>');
                            });
                    
                        }else{
                            $("select[name='district_id']").empty();
                        }
                    }
                });
            }else{
                $("select[name='district_id']").empty();
            }      
        });

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