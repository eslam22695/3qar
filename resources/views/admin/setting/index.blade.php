@extends('layouts.admin')

@section('styles')
    <!-- X-editable css -->
    <link type="text/css" href="{{asset('admin_assets/plugins/x-editable/css/bootstrap-editable.css')}}" rel="stylesheet">
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-20">البيانات</h4>
                @if(isset($setting->id))
                    {{Form::model($setting,['method'=>'PATCH','action' => ['admin\SettingController@update',$setting->id], 'files' => true])}}
                        <table class="table table-bordered table-striped">
                            <tbody>
                                
                                <tr>
                                    <td>اللوجو</td>
                                    <td>
                                        <input type="file" class="filestyle" data-placeholder="No file" data-iconname="fa fa-cloud-upload" name="logo">
                                        @if ($errors->has('logo'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('logo') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>من نحن الصفحة الرئيسية</td>
                                    <td>
                                        <textarea id="textarea" class="form-control" rows="2" name="about_home"><?php if(isset($setting->about_home)){echo $setting->about_home;} ?></textarea> 
                                        @if ($errors->has('about_home'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('about_home') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>صفحة من نحن </td>
                                    <td>
                                        <textarea id="textarea" class="form-control" rows="4" name="main_about"><?php if(isset($setting->main_about)){echo $setting->main_about;} ?></textarea> 
                                        @if ($errors->has('main_about'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('main_about') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>صورة صفحة من نحن</td>
                                    <td>
                                        <input type="file" class="filestyle" data-placeholder="No file" data-iconname="fa fa-cloud-upload" name="about_image">
                                        @if ($errors->has('about_image'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('about_image') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>رقم الهاتف 1</td>
                                    <td>
                                        <input type="text" name="phone1" class="form-control" value="<?php if(isset($setting->phone1)){echo $setting->phone1;} ?>">
                                        @if ($errors->has('phone1'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('phone1') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>رقم الهاتف 2</td>
                                    <td>
                                        <input type="text" name="phone2" class="form-control" value="<?php if(isset($setting->phone2)){echo $setting->phone2;} ?>">
                                        @if ($errors->has('phone2'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('phone2') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>البريد الالكتروني </td>
                                    <td>
                                        <input type="email" name="email" class="form-control" value="<?php if(isset($setting->email)){echo $setting->email;} ?>">
                                        @if ($errors->has('email'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>العنوان</td>
                                    <td>
                                        <input type="text" name="address" class="form-control" value="<?php if(isset($setting->address)){echo $setting->address;} ?>">
                                        @if ($errors->has('address'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>الخريطة</td>
                                    <td>
                                        <textarea id="textarea" class="form-control" rows="2" name="map"><?php if(isset($setting->map)){echo $setting->map;} ?></textarea> 
                                        <?php if(isset($setting->map)){echo $setting->map;} ?>
                                        @if ($errors->has('map'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('map') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>مقدمه صفحة التواصل</td>
                                    <td>
                                        <textarea id="textarea" class="form-control" rows="2" name="contact_text"><?php if(isset($setting->contact_text)){echo $setting->contact;} ?></textarea> 
                                        @if ($errors->has('contact_text'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('contact_text') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>
        
                                <tr>
                                    <td>الفيسبوك</td>
                                    <td>
                                        <input type="text" name="facebook" class="form-control" value="<?php if(isset($setting->facebook)){echo $setting->facebook;} ?>">
                                        @if ($errors->has('facebook'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('facebook') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>تويتر</td>
                                    <td>
                                        <input type="text " name="twitter" class="form-control" value="<?php if(isset($setting->twitter)){echo $setting->twitter;} ?>">
                                        @if ($errors->has('twitter'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('twitter') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>انستجرام</td>
                                    <td>
                                        <input type="text" name="instagram" class="form-control" value="<?php if(isset($setting->instagram)){echo $setting->instagram;} ?>">
                                        @if ($errors->has('instagram'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('instagram') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>يوتيوب</td>
                                    <td>
                                        <input type="text" name="youtube" class="form-control" value="<?php if(isset($setting->youtube)){echo $setting->youtube;} ?>">
                                        @if ($errors->has('youtube'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('youtube') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>لينكد ان</td>
                                    <td>
                                        <input type="text" name="linkedin" class="form-control" value="<?php if(isset($setting->linkedin)){echo $setting->linkedin;} ?>">
                                        @if ($errors->has('linkedin'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('linkedin') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>رابط تطبيق الاندرويد</td>
                                    <td>
                                        <input type="text" name="android" class="form-control" value="<?php if(isset($setting->android)){echo $setting->android;} ?>">
                                        @if ($errors->has('android'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('android') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>رابط التطبيق الايفون</td>
                                    <td>
                                        <input type="text" name="apple" class="form-control" value="<?php if(isset($setting->apple)){echo $setting->apple;} ?>">
                                        @if ($errors->has('apple'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('apple') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width:25%"></td>
                                    <td><button type="submit" class="btn btn-default waves-effect waves-light form-control">تعديل</button></td>
                                </tr>
                            </tbody>
                            
                        </table>
                    {!! Form::close() !!}
                @else
                    {{Form::open(['method'=>'POST','action' => ['admin\SettingController@store'], 'files' => true])}}
                        <table class="table table-bordered table-striped">
                            <tbody>
                                
                                <tr>
                                    <td>اللوجو</td>
                                    <td>
                                        <input type="file" class="filestyle" data-placeholder="No file" data-iconname="fa fa-cloud-upload" name="logo">
                                        @if ($errors->has('logo'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('logo') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>من نحن الصفحة الرئيسية</td>
                                    <td>
                                        <textarea id="textarea" class="form-control" rows="2" name="about_home">{{old('about_home')}}</textarea>
                                        @if ($errors->has('about_home'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('about_home') }}</strong>
                                            </span>
                                        @endif 
                                    </td>
                                </tr>

                                <tr>
                                    <td>صفحة من نحن </td>
                                    <td>
                                        <textarea id="textarea" class="form-control" rows="4" name="main_about">{{old('main_about')}}</textarea>
                                        @if ($errors->has('main_about'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('main_about') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>صورة صفحة من نحن</td>
                                    <td>
                                        <input type="file" class="filestyle" data-placeholder="No file" data-iconname="fa fa-cloud-upload" name="about_image">
                                        @if ($errors->has('about_image'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('about_image') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>رقم الهاتف 1</td>
                                    <td>
                                        <input type="text" name="phone1" class="form-control" {{old('phone1')}}>
                                        @if ($errors->has('phone1'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('phone1') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>رقم الهاتف 2</td>
                                    <td>
                                        <input type="text" name="phone2" class="form-control" {{old('phone2')}}>
                                        @if ($errors->has('phone2'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('phone2') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>البريد الالكتروني </td>
                                    <td>
                                        <input type="email" name="email" class="form-control" {{old('email')}}>
                                        @if ($errors->has('email'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>العنوان</td>
                                    <td>
                                        <input type="text" name="address" class="form-control" {{old('address')}}>
                                        @if ($errors->has('address'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>الخريطة</td>
                                    <td>
                                        <textarea id="textarea" class="form-control" rows="2" name="map"> {{old('map')}}</textarea> 
                                        @if ($errors->has('map'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('map') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>مقدمه صفحة التواصل</td>
                                    <td>
                                        <textarea id="textarea" class="form-control" rows="2" name="contact_text"> {{old('contact_text')}}</textarea>
                                        @if ($errors->has('contact_text'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('contact_text') }}</strong>
                                            </span>
                                        @endif 
                                    </td>
                                </tr>
        
                                <tr>
                                    <td>الفيسبوك</td>
                                    <td>
                                        <input type="text" name="facebook" class="form-control" {{old('facebook')}}>
                                        @if ($errors->has('facebook'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('facebook') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>تويتر</td>
                                    <td>
                                        <input type="text " name="twitter" class="form-control" {{old('twitter')}}>
                                        @if ($errors->has('twitter'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('twitter') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>انستجرام</td>
                                    <td>
                                        <input type="text" name="instagram" class="form-control" {{old('instagram')}}>
                                        @if ($errors->has('instagram'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('instagram') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>يوتيوب</td>
                                    <td>
                                        <input type="text" name="youtube" class="form-control" {{old('youtube')}}>
                                        @if ($errors->has('youtube'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('youtube') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>لينكد ان</td>
                                    <td>
                                        <input type="text" name="linkedin" class="form-control" {{old('linkedin')}}>
                                        @if ($errors->has('linkedin'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('linkedin') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>رابط تطبيق الاندرويد</td>
                                    <td>
                                        <input type="text" name="android" class="form-control" {{old('android')}}>
                                        @if ($errors->has('android'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('android') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td>رابط التطبيق الايفون</td>
                                    <td>
                                        <input type="text" name="apple" class="form-control" {{old('apple')}}>
                                        @if ($errors->has('apple'))
                                            <span class="alert alert-danger">
                                                <strong>{{ $errors->first('apple') }}</strong>
                                            </span>
                                        @endif
                                    </td>
                                </tr>


                                <tr>
                                    <td style="width:25%"></td>
                                    <td><button type="submit" class="btn btn-default waves-effect waves-light form-control">حفظ</button></td>
                                </tr>
                            </tbody>
                            <div></div>
                        </table>
                    {!! Form::close() !!}
                @endif

            </div>
        </div><!-- end col -->
    </div>
        
@endsection

@section('scripts')
<script src="{{asset('admin_assets/plugins/moment/moment.js')}}"></script>
<script type="text/javascript" src="{{asset('admin_assets/plugins/x-editable/js/bootstrap-editable.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin_assets/pages/jquery.xeditable.js')}}"></script>
@endsection