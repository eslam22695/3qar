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
            <h4 class="page-title">التنبيهات</h4>
        </div>
        
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
                            <th data-field="الاسم" data-align="center">الاسم</th>
                            <th data-field="القسم" data-align="center">القسم</th>
                            <th data-field="المدينة" data-align="center">المدينة</th>
                            <th data-field="المالك" data-align="center">المالك</th>
                            <th data-field="المستفيد" data-align="center">المستفيد</th>
                            <th data-field="تنبيه" data-align="center">تنبيه</th>
                            <th data-field="تاريخ البدء" data-align="center">تاريخ البدء</th>
                            <th data-field="التحكم" data-align="center">التحكم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($items))
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->category->name}}</td>
                                    <td>{{$item->city->name}}</td>
                                    <td>{{$item->owner->name}}</td>
                                    <td>{{isset($item->user->name) ? $item->user->name : '----'}}</td>
                                    <td>{{$item->notify == 1 ? 'نعم' : 'لا'}}</td>
                                    <td>{{$item->date}}</td>

                                    <td class="actions">
                                        <button type="button" data-toggle="modal" data-target="#{{$item->id}}delete" class="btn btn-success waves-effect" title="إرسال تنبية">إرسال تنبية</button>
                                    </td>
                                </tr>

                                <div id="{{$item->id}}delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog" style="width:55%;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="icon error animateErrorIcon" style="display: block;"><span class="x-mark animateXMark"><span class="line left"></span><span class="line right"></span></span></div>
                                                <h4 style="text-align:center;">إرسال تنبيه</h4>
                                            </div>
                                            <div class="modal-footer" style="text-align:center">
                                                <form action="{{action('admin\NotifyController@store')}}" method="post">
                                                    {{csrf_field()}}
                                                    <div class="row">
                                                        <input type="hidden" name="item_id" value="{{$item->id}}">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="icon" class="control-label">عنوان التنبيه</label>
                                                                <input type="text" id="example-input-large" name="name" class="form-control input-lg" required {{old('name')}}>
                                                                @if ($errors->has('name'))
                                                                    <span class="alert alert-danger">
                                                                        <strong>{{ $errors->first('name') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="icon" class="control-label">محتوى التنبيه</label>
                                                                <textarea class="form-control" name="body" required {{old('body')}} ></textarea>
                                                                @if ($errors->has('body'))
                                                                    <span class="alert alert-danger">
                                                                        <strong>{{ $errors->first('body') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-success" type="submit" dir="ltr">إرسال</button>
                                                    </div>
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