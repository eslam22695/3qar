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
                 تقرير اكثر العقارات المفضلة التي تم التواصل معها
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

            @if(isset($items) && $items != null)
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
                            <th data-field="الحالة"  data-align="center">الحالة</th>
                            <th data-field="التحكم" data-align="center">التحكم</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($items))
                            @for($i=0; $i<count($items); $i++)
                                <?php
                                    $item = \App\Item::find($items[$i]->id);
                                ?>
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->category->name}}</td>
                                    <td>{{$item->city->name}}</td>
                                    <td>{{$item->owner->name}}</td>
                                    <td>{{$item->status === 1 ? 'مفعل' : 'غير مفعل'}}</td>

                                    <td class="actions">
                                        <a href="{{ route('admin.status',[$item->status,'items',$item->id]) }}" class="btn btn-{{$item->status == 1 ? 'secondary' : 'dark'}} waves-effect" title="الحالة"> {{$item->status == 1 ? 'إبطال' : 'تفعيل'}}</a>
                                        @if($item->user_id != null)
                                            <a href="{{ url('admin/item/'.$item->id.'/edit/?status=0') }}" class="btn btn-light waves-effect" title="حذف المستفيد">حذف المستفيد</a>
                                        @endif
                                        <a href="{{ route('admin.item.show',$item->id) }}" class="btn btn-primary waves-effect" title="مشاهدة">مشاهدة</a>
                                        <a href="{{ route('admin.item.edit',$item->id) }}" class="btn btn-success waves-effect" title="تعديل">تعديل</a>
                                        <button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#{{$item->id}}delete" title="خدف"> خدف</button>
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
                                                <h4 style="text-align:center;">تأكيد الحذف</h4>
                                            </div>
                                            <div class="modal-footer" style="text-align:center">
                                                <form action="{{action('admin\ItemController@destroy', $item['id'])}}" method="post">
                                                    {{csrf_field()}}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="btn btn-danger" type="submit" dir="ltr">حذف</button>
                                                </form>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            @endfor
                        @endif
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

    </div> <!-- end col -->

</div>
    
@endsection