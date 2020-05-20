@extends('layouts.admin')

@section('styles')
    <link href="{{asset('admin_assets/plugins/bootstrap-table/css/bootstrap-table.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin_assets/plugins/custombox/css/custombox.css')}}" rel="stylesheet">
@stop

@section('content')

<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="main-title-00">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @elseif(Session::has('danger'))
                <div class="alert alert-danger">{{ Session::get('danger') }}</div>
            @endif
            <h4 class="page-title">طلبات الخدمات</h4>
        </div>
        
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            
            <div class="table-responsive">
                <table  data-toggle="table"
                        data-search="true"
                        data-show-columns="true"
                        data-sort-name="id"
                        data-page-list="[8, 16, 32]"
                        data-page-size="8"
                        data-pagination="true" data-show-pagination-switch="true" class="table-bordered ">
                                
                    <thead>
                        <tr>
                            <th data-field="الاسم"  data-align="center">الاسم</th>
                            <th data-field="البريد الالكتروني"  data-align="center">البريد الالكتروني</th>
                            <th data-field="رقم الجوال"  data-align="center">رقم الجوال</th>
                            <th data-field="اسم الخدمة"  data-align="center">اسم الخدمة</th>
                            <th data-field="الحالة"  data-align="center">الحالة</th>
                            <th data-field="التحكم" data-align="center">التحكم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($serviceRequests))
                            @foreach($serviceRequests as $serviceRequest)
                                <tr>
                                    <td>{{$serviceRequest->name}}</td>
                                    <td>{{$serviceRequest->email}}</td>
                                    <td>{{$serviceRequest->phone}}</td>
                                    <td>{{$serviceRequest->service->name}}</td>
                                    <td>{{$serviceRequest->status === 1 ? 'تم المشاهدة' : 'لم يتم المشاهدة'}}</td>

                                    <td class="actions">
                                        <a href="{{ route('admin.service_request.show',$serviceRequest->id) }}" class="btn btn-primary waves-effect" title="مشاهدة">مشاهدة</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div> <!-- end col -->

</div>
    
@endsection