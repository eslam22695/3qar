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
                <h4 class="header-title m-t-0 m-b-20">تعديل  </h4>
                {{Form::model($district,['method'=>'PATCH','action' => ['admin\DistrictController@update',$district->id], 'files' => true])}}

                    <table class="table table-bordered table-striped">
                        <tbody>

                            <tr>
                                <td>الاسم</td>
                                <td>
                                    <input type="text" class="form-control" name="name" value="{{$district->name}}" required>
                                    @if ($errors->has('name'))
                                        <span class="alert alert-danger">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>المدينة</td>
                                <td>
                                    <select class="form-control" required name="city_id">
                                        <option value="" disabled>إختار المدينة </option>
                                        @if($cities != null)
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}" {{$district->city_id === $city->id ? 'selected' : ''}}>{{$city->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('city_id'))
                                        <span class="alert alert-danger">
                                            <strong>{{ $errors->first('city_id') }}</strong>
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>


                    <table class="table table-bordered table-striped">
                        <tbody>

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