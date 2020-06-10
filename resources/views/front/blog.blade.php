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
                <?php $title = str_replace(' ', '_', $blog->title); ?>
                @if($loop->first)
                    <div id="{{$loop->iteration}}" class="col-lg-8 col-md-6 ">
                        <a href=" {{route('blog_details',[$blog->id,$title])}}">
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
                                        <?php
                                            $description = substr($blog->description,0, 500)."...";
                                        ?>
                                        <p>{{$description}}</p>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @else
                    @if($loop->iteration != 3)
                        <div id="{{$loop->iteration}}" class="col-lg-4 col-md-6">
                            <a href=" {{route('blog_details',[$blog->id,$title])}}">

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
                                            <?php
                                                $description = substr($blog->description,0, 150)."...";
                                            ?>
                                            <p>{{$description}}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            @if($loop->iteration == 2)
                                @foreach($blogs as $blog3)
                                    @if($loop->iteration == 3)
                                        <a href=" {{route('blog_details',[$blog->id,$title])}}">

                                            <div class=" mb-3 wow fadeIn" data-wow-delay=".5s">
                                                <div class="card shadow-lg p-2">
                                                    <span class="back-color-sm">{{$blog3->created_at->format('d M Y') }}</span>
                                                    <div class="image-wrapper">
                        
                                                        <img src="{{asset('admin_assets/images/blog/'.$blog3->image)}}" class="img-blog-sm" alt="spongebob crew" />
                                                    </div>
                                                    <div class="card-body">
                        
                                                        <div class="head">
                                                            <h2 class="card-title mt-5">{{$blog3->title}}  </h2>
                                                        </div>
                                                        <?php
                                                            $description = substr($blog3->description,0, 150)."...";
                                                        ?>
                                                        <p>{{$description}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    @endif
                @endif
           @endforeach
        </div>

        

        <div class="col-md-4 m-auto">
            {{ $blogs->links('pagination.custom') }}
        </div>
    </div>
</section>
<!--------end 3akar -------------->

@endsection