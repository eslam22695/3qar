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
                <h4 class="page-title">
                    تقرير الخصائص   حسب عائلة الخصائص
                </h4>
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
            {{--@if ($errors->has('city_id'))--}}
            {{--<span class="alert alert-danger">--}}
            {{--<strong>{{ $errors->first('city_id') }}</strong>--}}
            {{--</span>--}}
            {{--@endif--}}
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">

                <div class="row">
                    <div class="col-sm-12">
                        {{Form::open(['method'=>'POST','action' => ['admin\ReportController@attribute_report'], 'files' => true])}}
                        <table class="table table-bordered table-striped">

                            <tbody>

                            <tr>
                                <td>عائلة الخصائص</td>

                                <td>
                                    <select class="form-control" required name="family_id">
                                        <option value="" disabled selected>إختار عائلة الخصائص</option>
                                        @if($families != null)
                                            @foreach($families as $family)
                                                <option value="{{$family->id}}">{{$family->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('family_id'))
                                        <span class="alert alert-danger">
                                                <strong>{{ $errors->first('family_id') }}</strong>
                                            </span>
                                    @endif
                                </td>

                            </tr>

                            <tr>
                                <td style="width:25%"></td>
                                <td><button type="submit" class="btn btn-default waves-effect waves-light form-control">تقرير</button></td>
                            </tr>
                            </tbody>

                        </table>
                        {!! Form::close() !!}
                    </div>
                </div>

                @if(isset($attributes) && $attributes != null)
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
                                <th data-field="الصورة"  data-align="center">الصورة</th>
                                <th data-field="الاسم"  data-align="center">الاسم</th>
                                <th data-field="العائلة"  data-align="center">العائلة</th>
                                <th data-field="الحالة"  data-align="center">الحالة</th>
                                <th data-field="التحكم" data-align="center">التحكم</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($attributes))
                                @foreach($attributes as $attribute)
                                    <tr>
                                        <td><img src="{{asset('admin_assets/images/attribute/'.$attribute->icon)}}" class="img-responsive" width="100px" height="100px"></td>
                                        <td>{{$attribute->name}}</td>
                                        <td>{{$attribute->attribute_family->name}}</td>
                                        <td>{{$attribute->status === 1 ? 'مفعل' : 'غير مفعل'}}</td>

                                        <td class="actions">
                                            <a href="{{ route('admin.status',[$attribute->status,'attributes',$attribute->id]) }}" class="btn btn-{{$attribute->status == 1 ? 'secondary' : 'dark'}} waves-effect" title="الحالة"> {{$attribute->status == 1 ? 'إبطال' : 'تفعيل'}}</a>
                                            <a href="{{ route('admin.attribute.show',$attribute->id) }}" class="btn btn-primary waves-effect" title="مشاهدة">مشاهدة</a>
                                            <a href="{{ route('admin.attribute.edit',$attribute->id) }}" class="btn btn-success waves-effect" title="تعديل">تعديل</a>
                                            <button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#{{$attribute->id}}delete" title="حذف"> حذف</button>
                                        </td>
                                    </tr>

                                    <div id="{{$attribute->id}}delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
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
                                                    <form action="{{action('admin\AttributeController@destroy', $attribute['id'])}}" method="post">
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
                @endif
            </div>

        </div> <!-- end col -->

    </div>

@endsection