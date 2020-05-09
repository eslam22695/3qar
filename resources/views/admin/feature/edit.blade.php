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
                <h4 class="header-title m-t-0 m-b-20">تعديل  </h4>

                <table class="table table-bordered table-striped">
                    {{Form::model($feature,['method'=>'PATCH','action' => ['admin\FeatureController@update',$feature->id], 'files' => true])}}
                        <tbody>


                        <tr>
                            <td>الصورة</td>
                            <td>
                                <input type="file" class="filestyle" data-placeholder="No file" data-iconname="fa fa-cloud-upload" name="icon">
                                @if ($errors->has('icon'))
                                    <span class="alert alert-danger">
                                            <strong>{{ $errors->first('icon') }}</strong>
                                        </span>
                                @endif

                            </td>
                        </tr>

                            <tr>
                                <td>الاسم</td>
                                <td><input type="text" class="form-control" name="title" value="{{$feature->title}}" required ></td>
                                @if ($errors->has('title'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </tr>

                            <tr>
                                <td>الوصف</td>
                                <td><textarea id="textarea" class="form-control" rows="2" name="description">value="{{$feature->description}}"</textarea>
                                </td>
                                @if ($errors->has('description'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
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