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
                <h4 class="header-title m-t-0 m-b-20">اضافه عضو</h4>

                <table class="table table-bordered table-striped">
                    {{Form::open(['method'=>'POST','action' => ['admin\UserController@store'], 'files' => true])}}
                        <tbody>
                        
                            <tr>
                                <td>الاسم</td>
                                <td><input type="text" class="form-control" name="name" required></td>
                                @if ($errors->has('name'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </tr>
                            <tr>
                                <td>البريد الالكترونى</td>
                                <td><input type="email" class="form-control" name="email" required></td>
                                @if ($errors->has('email'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </tr>
                            <tr>
                                <td>الجوال</td>
                                <td><input type="text" class="form-control" name="phone" required></td>
                                @if ($errors->has('phone'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </tr>
                            <tr>
                                <td>كلمة المرور</td>
                                <td><input type="password" class="form-control" name="password" required></td>
                                @if ($errors->has('password'))
                                    <span class="alert alert-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
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