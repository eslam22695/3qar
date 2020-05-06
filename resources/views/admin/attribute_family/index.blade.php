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
            <h4 class="page-title">عائله الخصائص</h4>
        </div>
        @if ($errors->has('name'))
            <span class="alert alert-danger">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
        {{-- @if ($errors->has('category_id'))
            <span class="alert alert-danger">
                <strong>{{ $errors->first('category_id') }}</strong>
            </span>
        @endif --}}
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
                            <a href="{{ route('admin.attribute_family.create') }}" class="btn btn-default waves-effect"> اضافة عائلة خصائص +  </a>
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
                            {{-- <th data-field="اسم القسم"  data-align="center">اسم القسم</th> --}}
                            <th data-field="الحالة"  data-align="center">الحالة</th>
                            <th data-field="التحكم" data-align="center">التحكم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($families))
                            @foreach($families as $family)
                                <tr>
                                    <td>{{$family->name}}</td>
                                    <td>{{$family->status === 1 ? 'مفعل' : 'غير مفعل'}}</td>

                                    {{-- <td>{{$family->category->name != null ? $family->category->name : ''}}</td> --}}
                                    <td class="actions">
                                        {{--<a href="{{ route('admin.family_attribute.show',$family->id) }}" class="btn btn-primary waves-effect" title="show"><i class="fa fa-eye" aria-hidden="true"></i></a>--}}
                                        <a href="{{ route('admin.status',[$family->status,'attribute_families',$family->id]) }}" class="btn btn-{{$family->status == 1 ? 'secondary' : 'dark'}} waves-effect" title="الحالة"> {{$family->status == 1 ? 'إبطال' : 'تفعيل'}}</a>
                                        <a href="{{ route('admin.attribute_family.edit',$family->id) }}" class="btn btn-success waves-effect" title="تعديل">تعديل</a>
                                        <button type="button" class="btn btn-danger waves-effect" data-toggle="modal" data-target="#{{$family->id}}delete"> حذف</button>
                                    </td>
                                </tr>

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
                                                <form action="{{action('admin\AttributeFamilyController@destroy', $family['id'])}}" method="post">
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