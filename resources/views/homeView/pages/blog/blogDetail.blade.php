@extends('homeView/layout/master')
@Section('title')
{{$blog->slug}}
@endsection
@section('content')

 <!-- Blog Details Hero Begin -->
    <section class="blog-hero spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-9 text-center">
                    <div class="blog__hero__text">
                        <h2>{{$blog->title}}</h2>
                        <ul>
                            <li>Nguồn: <span class="text-success">{{$blog->source}}</span></li>
                            <li>{{$blog->created_at}}</li>
                            <li>8 Bình luận</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="blog__details__pic">
                        <img src="upload/news/{{$blog->image}}" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog__details__content">
                        <div class="blog__details__share">
                            <span>share</span>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="youtube"><i class="fab fa-youtube"></i></i></a></li>
                                <li><a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <div class="blog__details__text">
                           {!!$blog->content!!}
                        </div>
                        
                        
                        <div class="blog__details__btns">
                            <div class="row">
                            	@foreach($blogRelaed as $blogr)
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <a href="{{route('blog.detail',$blogr['slug'])}}" class="blog__details__btns__item">
                                    	<div class="float-left pr-3"><img width="30" height="30" src="upload/news/{{$blogr['image']}}" alt=""></div>
                                        <h5>{{$blogr['title']}}</h5>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="blog__details__comment">
                        	<div class="text-secondary">
                        		<p>chưa có bình luận nào</p>
                        	</div>
                            <h4>Thêm nhận xét của bạn</h4>
                            <form action="">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <textarea placeholder="Comment"></textarea>
                                        <button type="submit" class="site-btn">Post Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

@endsection