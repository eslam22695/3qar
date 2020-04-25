@extends('layouts.admin')

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
                <h4 class="header-title m-t-0 m-b-20">طلبات الخدمات</h4>

                <table class="table table-bordered table-striped">
                    <tbody>
                
                        <tr>
                            <td>الاسم</td>
                            <td>{{ $serviceRequest->name }}</td>
                        </tr>
                        <tr>
                            <td>البريد الالكترونى</td>
                            <td>{{ $serviceRequest->email }}</td>
                        </tr>
                        <tr>
                            <td>رقم الجوال</td>
                            <td>{{ $serviceRequest->phone }}</td>
                        </tr>
                        <tr>
                            <td>الرسالة</td>
                            <td>{{ $serviceRequest->message }}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div><!-- end col -->
    </div>
        
@endsection