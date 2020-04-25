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
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-20">تعديل خاصية</h4>
                {{Form::model($attribute,['method'=>'PATCH','action' => ['admin\AttributeController@update',$attribute->id], 'files' => true])}}

                    <table class="table table-bordered table-striped">
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
                                <td><input type="text" class="form-control" name="name" value="{{$attribute->name}}" required></td>
                            </tr>
                            <tr>
                                <td>عائلة الخصائص</td>
                                <td>
                                    <select class="form-control" required name="family_id">
                                        <option value="" disabled>إختار عائلة الخصائص</option>
                                        @if($families != null)
                                            @foreach($families as $family)
                                                <option value="{{$family->id}}" {{$attribute->family_id === $family->id ? 'selected' : ''}}>{{$family->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered table-striped">
                        
                        <tbody id="items_table">
                            @foreach($values as $value)
                                <tr>
                                    <td>قيمة</td>
                                    <td><input type="text" class="form-control" name="attribute_value[]" value="{{$value->value}}" required></td>
                                    <td>
                                        <a href="{{ route('admin.attribute_value.delete',$value->id) }}" class="btn btn-danger waves-effect" title="remove">X</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td style="width:25%"></td>
                                <td><button type="button" id="add" class="btn btn-info form-control">إضافة قيمة اخرى</button></td>
                            </tr>
                            <tr>
                                <td style="width:25%"></td>
                                <td><button type="submit" class="btn btn-default waves-effect waves-light form-control">حفظ</button></td>
                            </tr>
                        </tbody>
                    </table>                    
                {!! Form::close() !!}

            </div>
        </div><!-- end col -->
    </div>
        
@endsection    

@section('scripts')
<script type="text/javascript">

    $(document).ready(function(){ 

      var i=1;  

      $('#add').click(function(){  
           i++;  
           $('#items_table').append('<tr id="row'+i+'"><td>قيمة الخاصية '+i+'</td><td><input type="text" name="attribute_value[]" class="form-control"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
           $('.no-records-found').remove();
      });  


        $(document).on('click', '.btn_remove', function(){  
            var button_id = $(this).attr("id");   
            $('#row'+button_id+'').remove();  
        });  
        
    });  
</script>
@endsection