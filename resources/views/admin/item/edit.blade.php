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
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-20">اضافه عقار</h4>
                {{Form::model($item,['method'=>'PATCH','action' => ['admin\ItemController@update',$item->id], 'files' => true])}}

                <div class="tabs-vertical-env">

                    <ul class="nav tabs-vertical">
                        <li class="nav-item">
                            <a href="#v2-home" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                التفاصيل الاساسية
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#v2-image" data-toggle="tab" aria-expanded="false" class="nav-link">
                                الصور
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#v2-location" data-toggle="tab" aria-expanded="false" class="nav-link">
                                الموقع
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#v2-attribute" data-toggle="tab" aria-expanded="false" class="nav-link">
                                الخصائص
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#v2-option" data-toggle="tab" aria-expanded="false" class="nav-link">
                                المميزات
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#v2-user" data-toggle="tab" aria-expanded="false" class="nav-link">
                                مستفيد
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">

                        <div class="tab-pane active" id="v2-home">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="icon" class="control-label">اسم العقار</label>
                                        <input type="text" id="example-input-large" name="name" class="form-control input-lg" value="{{$item->name}}" required>
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
                                        <textarea class="form-control" name="description" >{{$item->description}}</textarea>
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
                                        <input type="text" id="example-input-large" name="price" class="form-control input-lg" value="{{$item->price}}" required>
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
                                        <input type="text" id="example-input-large" name="area" class="form-control input-lg" value="{{$item->area}}" required>
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
                                        <input type="number" id="example-input-large" name="phone" class="form-control input-lg" value="{{$item->phone}}" required min="0">
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
                                        <select class="form-control" required name="category_id">
                                            <option value="" selected disabled>إختار القسم</option>
                                            @if($cats != null)
                                                @foreach($cats as $cat)
                                                    <option value="{{$cat->id}}" {{$item->category_id === $cat->id ? 'selected' : ''}}>{{$cat->name}}</option>
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
                                        <select class="form-control" required name="owner_id">
                                            <option value="" selected disabled>إختار المالك</option>
                                            @if($owners != null)
                                                @foreach($owners as $owner)
                                                    <option value="{{$owner->id}}" {{$owner->id === $item->owner_id ? 'selected' : ''}}>{{$owner->name}}</option>
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
                                        <input type="checkbox" checked data-plugin="switchery" data-color="#81c868" name="featured" value="{{$item->featured}}" value="1"/>
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
                                        <img src="{{asset('admin_assets/images/item/'.$item->main_image)}}" class="img-responsive" width="100px" height="100px">

                                        @if ($errors->has('main_image'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('main_image') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="icon" class="control-label">الصور</label>
                                        <input type="file" class="filestyle" data-placeholder="No file" data-iconname="fa fa-cloud-upload" name="images[]" multiple>
                                        <div class="multi-images">
                                        @foreach($images as $image)
                                            <img src="{{asset('admin_assets/images/item/'.$image->image)}}" class="img-responsive img{{$image->id}}" width="100px" height="100px">
                                            <a href="javascript:void(0)" data-toggle="tooltip"  data-id="{{ $image->id }}" data-original-title="حذف" class="btn btn-danger btn-sm deleteImage img{{$image->id}}">حذف</a>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="v2-location">
                            <div class="row">
                                <div class="col-md-6">
                                    {{$item->city->name}}
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="icon" class="control-label">تعديل المدينة</label>
                                        <select class="form-control" name="city_id">
                                            <option value="" selected disabled>إختار المدينة</option>
                                            @if($cities != null)
                                                @foreach($cities as $city)
                                                    <option value="{{$city->id}}">{{$city->name}}</option>
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
                                <div class="col-md-6">
                                    {{$item->district->name}}
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="icon" class="control-label">تعديل الحى</label>
                                        <select class="form-control" name="district_id">
                                            <option value="" selected disabled>إختار الحى</option>
                                            @if(!empty($districts))
                                                @foreach($districts as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
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
                                    <input type="hidden" id="lat" name="lat" value="{{$item->lat}}">
                                    <input type="hidden" id="lang" name="lang" value="{{$item->lang}}">
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
                                                        <option value="{{$value->id}}" {{$item->selected_value($item->id,$value->id) === 1 ? 'selected' : ''}}>{{$value->value}}</option>
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
                                            <input type="checkbox" data-plugin="switchery" data-color="#5d9cec" name="options[]" value="{{$option->id}}" {{$item->selected_option($item->id,$option->id) === 1 ? 'checked' : ''}}/>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-pane" id="v2-user">
                            <div class="row">   
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="icon" class="control-label">المستخدمين</label>
                                        <select class="form-control" name="user_id">
                                            <option value="" selected disabled>إختار مستخدم</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}" {{$item->user_id == $user->id ? 'selected' : ''}}>{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="icon" class="control-label"> تنبية الشهري </label>
                                        <input type="checkbox" data-plugin="switchery" data-color="#5d9cec" name="notify" value="1" {{$item->notify === 1 ? 'checked' : ''}}/>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <button type="submit" class="btn btn-default waves-effect waves-light form-control">تعديل</button>

                {!! Form::close() !!}
            </div>
        </div><!-- end col -->
    </div>

@endsection

@section('scripts')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('body').on('click', '.deleteImage', function () {
     
            var image_id = $(this).data("id");
            confirm("هل تريد مسح هذة الصورة !");
            var route = "{{route('admin.item.edit',$item->id)}}";
            $.ajax({
                type: "DELETE",
                url: "{{ url('admin/delete_image') }}"+'/'+image_id,
                success: function (data) {
                    $('.img'+image_id).fadeOut();
                    alert('تم مسح الصورة !');
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

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
            var myLatLng = {lat: {{$item->lat}}, lng: {{$item->lang}}};

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