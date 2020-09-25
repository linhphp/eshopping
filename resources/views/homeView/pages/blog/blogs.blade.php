@extends('homeView/layout/master')
@Section('title')
tin tuc | tong hop
@endsection
@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-blog set-bg" data-setbg="frontend/img/blog-new.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-danger">Tin tức Tổng hợp</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
            	@foreach($news as $post)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="upload/news/{{$post->image}}"></div>
                        <div class="blog__item__text">
                            <span><img src="frontend/img/icon/calendar.png" alt=""> {{$post->created_at}}</span>
                            <h5>{{$post->title}}</h5>
                            <a href="{{route('blog.detail',$post->slug)}}">XEM THÊM</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
            	<div class="col">
            		{!!$news->links()!!}
            	</div>
            </div>
        </div>

    </section>
    <!-- Blog Section End -->

@endsection