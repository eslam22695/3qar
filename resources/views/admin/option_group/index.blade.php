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
            <h4 class="page-title">عائله المميزات</h4>
        </div>
        
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            
            <div class="row">
                <div class="col-sm-12">
                    <div class=" main-btn-00">
                        <!-- Responsive modal -->
                        <button type="button" class="btn btn-default waves-effect" data-toggle="modal" data-target="#add"> <i class="fa fa-user-plus" aria-hidden="true"></i></button>

                        <div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    {{Form::open(['method'=>'POST','action' => ['admin\OptionGroupController@store'], 'files' => true])}}
                                        <div class="modal-body">
                                            <div class="row">
                                                {{-- <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="icon" class="control-label">الاسم</label>
                                                        <input type="text" id="example-input-large" name="name" class="form-control input-lg">
                                                    </div>
                                                </div> --}}
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="icon" class="control-label">الرابط</label>
                                                        <input type="text" id="example-input-large" name="url" class="form-control input-lg">
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-default waves-effect waves-light form-control">حفظ</button>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
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
                            <th data-field="التحكم" data-align="center">التحكم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($families))
                            @foreach($families as $family)
                                <tr>
                                    <td>{{$family->name}}</td>
                                    <td class="actions">
                                        <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#{{$family->id}}edit"> <i class="fa fa-edit" aria-hidden="true"></i></button>
                                        <button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#{{$family->id}}delete"> <i class="fa fa-times" aria-hidden="true"></i></button>
                                    </td>
                                </tr>

                                <div id="{{$family->id}}edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            {{Form::model($cat,['method'=>'PATCH','action' => ['admin\OptionGroupController@update',$cat->id], 'files' => true])}}
                                                <div class="modal-body">
                                                    <div class="row">
                                                        
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="icon" class="control-label">الرابط</label>
                                                                <input type="text" id="example-input-large" name="url" class="form-control input-lg" value="{{$family->name}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-default waves-effect waves-light form-control">تعديل</button>
                                                </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>


                                <div id="{{$family->id}}delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
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
                                                <form action="{{action('admin\OptionGroupController@destroy', $family['id'])}}" method="post">
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