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
            <h4 class="page-title">التنبيهات العامة</h4>
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
                <table  data-toggle="table" class="table-bordered ">
                      
                    <tbody>
                        <form action="{{action('admin\NotifyController@send')}}" method="post">
                            {{csrf_field()}}
                            <tr>
                                <td>العنوان</td>
                                <td>
                                    <input type="text" id="example-input-large" name="name" class="form-control input-lg" required {{old('name')}}>
                                    @if ($errors->has('name'))
                                        <span class="alert alert-danger">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif    
                                </td>
                            </tr>
                            <tr>
                                <td>الرسالة</td>
                                <td>
                                    <textarea class="form-control" name="body" required {{old('body')}} ></textarea>
                                    @if ($errors->has('body'))
                                        <span class="alert alert-danger">
                                            <strong>{{ $errors->first('body') }}</strong>
                                        </span>
                                    @endif 
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><button class="btn btn-success" type="submit" dir="ltr">إرسال</button></td>
                            </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div> <!-- end col -->

</div>
    
@endsection