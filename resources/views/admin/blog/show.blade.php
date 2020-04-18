@extends('layouts.admin')

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
                <h4 class="header-title m-t-0 m-b-20">{{$blog->title}}</h4>

                <table class="table table-bordered table-striped">
                    <tbody>
                
                        <tr>
                            <td>الصورة</td>
                            <td><img src="{{asset('admin_assets/blog/'.$blog->image)}}" class="img-responsive" width="100px" height="100px"></td>
                        </tr>
                        <tr>
                            <td>الوصف</td>
                            <td>{{ $blog->description }}</td>
                        </tr>
                        <tr>
                            <td>المحتوى</td>
                            <td>{!! $blog->content !!}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div><!-- end col -->
    </div>
        
@endsection