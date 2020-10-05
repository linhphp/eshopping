@extends('homeView/layout/master')
@section('title','trang chu')
@section('content')
    @if(Session::has('note'))

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-md-center"> {{Session::get('note')}} </h3>
                    </div>
                </div>
            </div>
        </section>

    @endif
    @include('homeView/layout/slide')
<section class="product spad mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">Tất cả sản phẩm</li>
                    <li data-filter=".new-arrivals">Sản phẩm mới</li>
                    <li data-filter=".hot-sales">giảm giá</li>
                </ul>
            </div>
        </div>
        <div class="row product__filter">
            @foreach($products as $product)
            @if($product->unit_price == $product->promotion_price)
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                <form action="{{route('addToCart')}}" method="post">
                    @csrf
                         <input type="hidden" name="qty" value="1">
                         <input type="hidden" name="pro_id" value="{{$product->id}}">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="upload/product/{{$product->image}}">
                        <span class="label">New</span>
                        <ul class="product__hover">
                            <li><a href="#"><img src="frontend/img/icon/heart.png" alt=""></a></li>
                            <li><a class="detail" href="{{route('shop.detail',$product->id)}}"><i class="fa fa-info"></i> chi tiết</a></li>
                            
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>{{$product->name}}</h6>
                        <button class="add-cart">thêm vào giỏ hàng</button>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5>{{number_format($product->unit_price)}} VND</h5>
                       
                    </div>
                </div>
            </form>
            </div>
            <!-- end col -->
            @else
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                <form action="{{route('addToCart')}}" method="post">
                @csrf
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="upload/product/{{$product->image}}">
                        <span class="label">Sale</span>
                         <input type="hidden" name="qty" value="1">
                         <input type="hidden" name="pro_id" value="{{$product->id}}">
                        <ul class="product__hover">
                            <li><a href="#"><img src="frontend/img/icon/heart.png" alt=""></a></li>
                            <li><a class="detail" href="{{route('shop.detail',$product->id)}}"><i class="fa fa-info"></i> chi tiết</a></li>
                            
                        </ul>
                    </div>
                    <div class="product__item__text">
                    <h6>{{$product->name}}</h6>
                    <button class="add-cart">thêm vào giỏ hàng</button>
                    <div class="rating">
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <h5 style="text-decoration: line-through; color: darkred;">{{number_format($product->unit_price)}} VND</h5>
                    <h5>{{number_format($product->promotion_price)}} VND</h5>
                    </div>
                </div>
                </form>
            </div>
            <!-- end col -->
            @endif
            @endforeach
           
        </div>
    </div>
</section>
<!-- blog -->
<section class="latest spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Tin mới nhất</span>
                </div>
            </div>
            <!-- end col -->
        </div>
        <div class="row">
            @foreach($news as $post)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="upload/news/{{$post['image']}}"></div>
                    <div class="blog__item__text">
                        <span><img src="frontend/img/icon/calendar.png" alt="">{{$post['created_at']}}</span>
                        <h5>{{$post['title']}}</h5>
                        <a href="{{route('blog.detail',$post['slug'])}}">Xem Thêm</a>
                    </div>
                </div>
            </div>
            @endforeach
           
           
        </div>
    </div>
</section>
<!-- end blog -->
@endsection
