@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="dropdown-item notify-item" href="{{ route('logout') }}"

                    onclick="event.preventDefault();

                                          document.getElementById('logout-form').submit();">

                     <i class="zmdi zmdi-power"></i> <span>تسجيل خروج</span>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                         {{ csrf_field() }}

                     </form>

                 </a>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
