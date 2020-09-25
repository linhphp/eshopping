@extends('homeView/layoutShop/master')
@section('title','gian hàng')
@section('shopContent')

<div class="col-lg-9">
    <div class="shop__product__option">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="shop__product__option__left">
                	@if(!$brandProducts)
                		<p>không tìm thấy sản phẩm nào tương tự</p>
                	@endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    	@foreach($brandProducts as $product)
        <div class="col-lg-4 col-md-6 col-sm-6">
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
	                        <li><a class="detail" href="{{route('shop.detail',$product['id'])}}"><i class="fa fa-info"></i> chi tiết</a></li>
	                        
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
    <div class="row">
        <div class="col-lg-12">
            <div class="product__pagination">

            </div>
        </div>
    </div>
</div>
<!-- end col 9-->
@endsection