@extends('homeView/layout/master')
@section('title')
chi tiết | {{$product->name}}
@endsection
@section('content')

<!-- Shop Details Section Begin -->
<section class="shop-details">
    <div class="product__details__pic">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__breadcrumb">
                        <a href="{{route('home')}}">Trang chủ</a>
                        <a href="{{route('shop.index')}}">Gian hàng</a>
                        <span>chi tiết sản phẩm</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                                <div class="product__thumb__pic set-bg" data-setbg="upload/product/{{$product->image}}">
                                </div>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">
                                <div class="product__thumb__pic set-bg" data-setbg="frontend/img/shop-details/thumb-2.png">
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">
                                <div class="product__thumb__pic set-bg" data-setbg="frontend/img/shop-details/thumb-3.png">
                                </div>
                            </a>
                        </li> -->
                    </ul>
                </div>
                <div class="col-lg-6 col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img src="upload/product/{{$product->image}}" alt="">
                            </div>
                        </div>
                        <!-- <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img src="frontend/img/shop-details/product-big-3.png" alt="">
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img src="frontend/img/shop-details/product-big.png" alt="">
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- thong tin san pham -->
    <div class="product__details__content">
        <div class="container">
            <form action="{{route('addToCart')}}" method="post">
            @csrf
                <input type="hidden" name="pro_id" value="{{$product->id}}">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="product__details__text">
                        <h4>{{$product->name}}</h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                            <span> - 5 Reviews</span>
                        </div>
                        <h3>
                            @if($product->unit_price == $product->promotion_price)
                            {{number_format($product->unit_price)}} VNĐ
                            @else
                            
                            {{number_format($product->promotion_price)}} VNĐ
                            <span>{{number_format($product->unit_price)}} VNĐ</span>
                            @endif
                        </h3>
                        <p>{{$product->desc}}</p>
                        
                        <div class="product__details__cart__option">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" name="qty" value="1">
                                </div>
                            </div>
                            <button class="primary-btn">Thêm vào giỏ hàng</button>
                        </div>
                        <div class="product__details__btns__option">
                            <a href="#"><i class="fa fa-heart"></i> thêm vào danh sách yêu thích</a>
                        </div>
                        <div class="product__details__last__option">
                            <h5><span>Đảm bảo thanh toán an toàn</span></h5>
                            
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-5"
                                role="tab">Thông tin</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Đánh giá</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!-- thong tin san pham -->
                            <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                <div class="product__details__tab__content">
                                    
                                    {!!$product->content!!}
                                </div>
                            </div>
                            <!-- danh gia  -->
                            <div class="tab-pane" id="tabs-6" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <div class="w-50 m-auto bg-light p-2 pt-4 pb-4">
                                        
                                   <p>chua co danh gia nao</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Details Section End -->
 <!-- Related Section Begin -->
<section class="related spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="related-title">Sản phẩm tương tự</h3>
            </div>
        </div>
        <div class="row">
           @foreach($categoryProducts as $product)
        <div class="col-lg-3 col-md-6 col-sm-6">
            <form action="{{route('addToCart')}}" method="post">
                @csrf
                    <input type="hidden" name="qty" value="1">
                    <input type="hidden" name="pro_id" value="{{$product['id']}}">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="upload/product/{{$product['image']}}">
                        
                        @if($product['unit_price'] == $product['promotion_price'])
                        <span class="label">New</span>
                        
                        @else
                        <span class="label">Sale</span>
                        
                        @endif
                        <ul class="product__hover">
                            <li><a href="#"><img src="frontend/img/icon/heart.png" alt=""></a></li>
                            <li><a class="detail" href="{{ route('shop.detail',$product['id'] )}}"><i class="fa fa-info"></i> chi tiết</a></li>
                            
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6>{{$product['name']}}</h6>
                        <button class="add-cart">thêm vào giỏ hàng</button>
                        <div class="rating">
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        @if($product['unit_price'] == $product['promotion_price'])
                            <h5>{{number_format($product['unit_price'])}} VND</h5>
                        @else
                            <h5 style="text-decoration: line-through; color: darkred;">{{number_format($product['unit_price'])}} VND</h5>
                            <h5>{{number_format($product['promotion_price'])}} VND</h5>

                        @endif
                       
                    </div>
                    </div>
                </form>
            </div>
        @endforeach
            
        </div>
    </div>
</section>
<!-- Related Section End -->

@endsection