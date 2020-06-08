@extends('layouts.index')

@section('content')


<section class="banner-about">
    <div class="container">
        <div class="d-flex justify-content-between  align-items-center pb-3">
            <h3>المدونة</h3>
        </div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('index')}}">الصفحه الرئيسيه</a></li>
                <li class="breadcrumb-item active" aria-current="page">المدونة</li>
            </ol>
        </nav>

    </div>
</section>

<!--------start 3akar-------------->
<section class="mt-5 filter blog">
    <div class="container">
        <div class="row">
            @foreach($blogs as $blog)
            @if($loop->first)
            <div id="{{$loop->iteration}}" class="col-lg-8 col-md-6 ">
                <a href=" {{route('blog_details',$blog->id)}}">
                    <div class=" mb-3 wow fadeIn" data-wow-delay=".5s">
                        <div class="card shadow-lg p-2">
                            <span class="back-color-bg">{{$blog->created_at->format('d M Y') }}</span>
                            <div class="image-wrapper">

                                <img src="{{asset('admin_assets/images/blog/'.$blog->image)}}" class="img-blog-big" alt="spongebob crew" />
                            </div>
                            <div class="card-body">

                                <div class="head">
                                    <h2 class="card-title mt-5">{{$blog->title}}</h2>
                                </div>
                                <p>{{$blog->description}}</p>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @else
            <div id="{{$loop->iteration}}" class="col-lg-4 col-md-6">
                <a href=" {{route('blog_details',$blog->id)}}">

                    <div class=" mb-3 wow fadeIn" data-wow-delay=".5s">
                        <div class="card shadow-lg p-2">
                            <span class="back-color-sm">{{$blog->created_at->format('d M Y') }}</span>
                            <div class="image-wrapper">

                                <img src="{{asset('admin_assets/images/blog/'.$blog->image)}}" class="img-blog-sm" alt="spongebob crew" />
                            </div>
                            <div class="card-body">

                                <div class="head">
                                    <h2 class="card-title mt-5">{{$blog->title}}  </h2>
                                </div>
                                <p>{{$blog->description}}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endif
           @endforeach
        </div>

        {{-- <div class="col-md-4 m-auto">
            <nav aria-label="...">
                <ul class="pagination shadow-sm mt-5">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active" aria-current="page">
							  <span class="page-link">
								2
								<span class="sr-only">(current)</span>
							  </span>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>

        </div> --}}
    </div>
</section>
<!--------end 3akar -------------->

@endsection