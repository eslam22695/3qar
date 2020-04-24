@extends('layouts.admin')

@section('styles')
    <!-- X-editable css -->
    <link type="text/css" href="{{asset('admin_assets/plugins/x-editable/css/bootstrap-editable.css')}}" rel="stylesheet">
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-20">البيانات</h4>
                @if(isset($setting->id))
                    {{Form::model($setting,['method'=>'PATCH','action' => ['admin\SettingController@update',$setting->id]])}}
                        <table class="table table-bordered table-striped">
                            <tbody>
                                
                                <tr>
                                    <td>اللوجو</td>
                                    <td><input type="file" class="filestyle" data-placeholder="No file" data-iconname="fa fa-cloud-upload" name="logo"></td>
                                </tr>

                                <tr>
                                    <td>من نحن الصفحة الرئيسية</td>
                                    <textarea id="textarea" class="form-control" rows="2" name="about_home"><?php if(isset($setting->about_home)){echo $setting->about_home;} ?></textarea> 
                                </tr>

                                <tr>
                                    <td>صفحة من نحن </td>
                                    <textarea id="content2" name="main_about"><?php if(isset($setting->main_about)){echo $setting->main_about;} ?></textarea> 
                                </tr>

                                <tr>
                                    <td>صورة صفحة من نحن</td>
                                    <td><input type="file" class="filestyle" data-placeholder="No file" data-iconname="fa fa-cloud-upload" name="about_image"></td>
                                </tr>

                                <tr>
                                    <td>رقم الهاتف 1</td>
                                    <td><input type="text" name="phone1" class="form-control" value="<?php if(isset($setting->phone1)){echo $setting->phone1;} ?>"></td>
                                </tr>

                                <tr>
                                    <td>رقم الهاتف 2</td>
                                    <td><input type="text" name="phone2" class="form-control" value="<?php if(isset($setting->phone2)){echo $setting->phone2;} ?>"></td>
                                </tr>
                                <tr>
                                    <td>البريد الالكتروني </td>
                                    <td><input type="email" name="email" class="form-control" value="<?php if(isset($setting->email)){echo $setting->email;} ?>"></td>
                                </tr>

                                <tr>
                                    <td>العنوان</td>
                                    <td><input type="text" name="address" class="form-control" value="<?php if(isset($setting->address)){echo $setting->address;} ?>"></td>
                                </tr>

                                <tr>
                                    <td>الخريطة</td>
                                    <td>
                                        <textarea id="textarea" class="form-control" rows="2" name="map"><?php if(isset($setting->map)){echo $setting->map;} ?></textarea> 
                                        <?php if(isset($setting->map)){echo $setting->map;} ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>مقدمه صفحة التواصل</td>
                                    <td>
                                        <textarea id="textarea" class="form-control" rows="2" name="contact"><?php if(isset($setting->contact)){echo $setting->contact;} ?></textarea> 
                                    </td>
                                </tr>
        
                                <tr>
                                    <td>الفيسبوك</td>
                                    <td><input type="text" name="facebook" class="form-control" value="<?php if(isset($setting->facebook)){echo $setting->facebook;} ?>"></td>
                                </tr>

                                <tr>
                                    <td>تويتر</td>
                                    <td><input type="text " name="twitter" class="form-control" value="<?php if(isset($setting->twitter)){echo $setting->twitter;} ?>"></td>
                                </tr>

                                <tr>
                                    <td>انستجرام</td>
                                    <td><input type="text" name="instagram" class="form-control" value="<?php if(isset($setting->instagram)){echo $setting->instagram;} ?>"></td>
                                </tr>

                                <tr>
                                    <td>يوتيوب</td>
                                    <td><input type="text" name="youtube" class="form-control" value="<?php if(isset($setting->youtube)){echo $setting->youtube;} ?>"></td>
                                </tr>

                                <tr>
                                    <td>لينكد ان</td>
                                    <td><input type="text" name="linkedin" class="form-control" value="<?php if(isset($setting->linkedin)){echo $setting->linkedin;} ?>"></td>
                                </tr>

                                <tr>
                                    <td>رابط تطبيق الاندرويد</td>
                                    <td><input type="text" name="android" class="form-control" value="<?php if(isset($setting->android)){echo $setting->android;} ?>"></td>
                                </tr>

                                <tr>
                                    <td>رابط التطبيق الايفون</td>
                                    <td><input type="text" name="apple" class="form-control" value="<?php if(isset($setting->apple)){echo $setting->apple;} ?>"></td>
                                </tr>

                                <tr>
                                    <td style="width:25%"></td>
                                    <td><button type="submit" class="btn btn-default waves-effect waves-light form-control">تعديل</button></td>
                                </tr>
                            </tbody>
                            
                        </table>
                    {!! Form::close() !!}
                @else
                    {{Form::open(['method'=>'POST','action' => ['admin\SettingController@store']])}}
                        <table class="table table-bordered table-striped">
                            <tbody>
                                
                                <tr>
                                    <td>اللوجو</td>
                                    <td><input type="file" class="filestyle" data-placeholder="No file" data-iconname="fa fa-cloud-upload" name="logo"></td>
                                </tr>

                                <tr>
                                    <td>من نحن الصفحة الرئيسية</td>
                                    <td><textarea id="textarea" class="form-control" rows="2" name="about_home"></textarea> </td>
                                </tr>

                                <tr>
                                    <td>صفحة من نحن </td>
                                    <td><textarea id="content2" name="main_about"></textarea> </td>
                                </tr>

                                <tr>
                                    <td>صورة صفحة من نحن</td>
                                    <td><input type="file" class="filestyle" data-placeholder="No file" data-iconname="fa fa-cloud-upload" name="about_image"></td>
                                </tr>

                                <tr>
                                    <td>رقم الهاتف 1</td>
                                    <td><input type="text" name="phone1" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td>رقم الهاتف 2</td>
                                    <td><input type="text" name="phone2" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td>البريد الالكتروني </td>
                                    <td><input type="email" name="email" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td>العنوان</td>
                                    <td><input type="text" name="address" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td>الخريطة</td>
                                    <td>
                                        <textarea id="textarea" class="form-control" rows="2" name="map"></textarea> 
                                    </td>
                                </tr>

                                <tr>
                                    <td>مقدمه صفحة التواصل</td>
                                    <td>
                                        <textarea id="textarea" class="form-control" rows="2" name="contact"></textarea> 
                                    </td>
                                </tr>
        
                                <tr>
                                    <td>الفيسبوك</td>
                                    <td><input type="text" name="facebook" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td>تويتر</td>
                                    <td><input type="text " name="twitter" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td>انستجرام</td>
                                    <td><input type="text" name="instagram" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td>يوتيوب</td>
                                    <td><input type="text" name="youtube" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td>لينكد ان</td>
                                    <td><input type="text" name="linkedin" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td>رابط تطبيق الاندرويد</td>
                                    <td><input type="text" name="android" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td>رابط التطبيق الايفون</td>
                                    <td><input type="text" name="apple" class="form-control"></td>
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