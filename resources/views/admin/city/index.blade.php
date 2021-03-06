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
            <h4 class="page-title">المدن</h4>
        </div>
        <div class="col-md-12">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        {{--@if ($errors->has('name'))--}}
            {{--<span class="alert alert-danger">--}}
                {{--<strong>{{ $errors->first('name') }}</strong>--}}
            {{--</span>--}}
        {{--@endif--}}
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            
            <div class="row">
                <div class="col-sm-12">
                    <div class=" main-btn-00">
                        <!-- Responsive modal -->
                        <div class=" main-btn-00">
                            <!-- Responsive modal -->
                            <a href="{{ route('admin.city.create') }}" class="btn btn-default waves-effect">اضافه مدينة  +</a>
                        </div>

                    </div>
                </div>
            </div>

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
                            <th data-field="الحالة"  data-align="center">الحالة</th>
                            <th data-field="التحكم" data-align="center">التحكم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($cities))
                            @foreach($cities as $city)
                                <tr>
                                    <td>{{$city->name}}</td>
                                    <td>{{$city->status === 1 ? 'مفعل' : 'غير مفعل'}}</td>

                                    <td class="actions">
                                        <a href="{{ route('admin.status',[$city->status,'cities',$city->id]) }}" class="btn btn-{{$city->status == 1 ? 'secondary' : 'dark'}} waves-effect" title="الحالة"> {{$city->status == 1 ? 'إبطال' : 'تفعيل'}}</a>
                                        <a href="{{ route('admin.city_districts.show',$city->id) }}" class="btn btn-primary waves-effect" title="الاحياء">الاحياء</a>
                                        <a href="{{ route('admin.city.edit',$city->id) }}" class="btn btn-success waves-effect" title="تعديل">تعديل</a>
                                        <button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#{{$city->id}}delete">حذف</button>
                                    </td>
                                </tr>

                                {{--<div id="{{$city->id}}edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">--}}
                                    {{--<div class="modal-dialog">--}}
                                        {{--<div class="modal-content">--}}
                                            {{--<div class="modal-header">--}}
                                                {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
                                            {{--</div>--}}
                                            {{--{{Form::model($city,['method'=>'PATCH','action' => ['admin\CityController@update',$city->id], 'files' => true])}}--}}
                                                {{--<div class="modal-body">--}}
                                                    {{--<div class="row">--}}
                                                        {{----}}
                                                        {{--<div class="col-md-12">--}}
                                                            {{--<div class="form-group">--}}
                                                                {{--<label for="icon" class="control-label">الاسم</label>--}}
                                                                {{--<input type="text" id="example-input-large" name="name" class="form-control input-lg" value="{{$city->name}}">--}}
                                                                {{--@if ($errors->has('name'))--}}
                                                                    {{--<span class="alert alert-danger">--}}
                                                                        {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                                                    {{--</span>--}}
                                                                {{--@endif--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    {{--<button type="submit" class="btn btn-default waves-effect waves-light form-control">تعديل</button>--}}
                                                {{--</div>--}}
                                            {{--{!! Form::close() !!}--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}


                                <div id="{{$city->id}}delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog" style="width:55%;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="icon error animateErrorIcon" style="display: block;"><span class="x-mark animateXMark"><span class="line left"></span><span class="line right"></span></span></div>
                                                <h4 style="text-align:center;">تأكيد الحذف</h4>
                                            </div>
                                            <div class="modal-footer" style="text-align:center">
                                                <form action="{{action('admin\CityController@destroy', $city['id'])}}" method="post">
                                                    {{csrf_field()}}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-danger" type="submit" dir="ltr">حذف</button>
                                                </form>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div> <!-- end col -->

</div>
    
@endsection