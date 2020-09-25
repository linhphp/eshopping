@extends('homeView/layout/master')
@section('title','gio hang')
@section('content')
	
	<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Giỏ hàng</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('home')}}">Trang chủ</a>
                            <a href="{{route('shop.index')}}">Gian hàng</a>
                            <span>Giỏ hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>tên sản phẩm</th>
                                    <th>hình ảnh</th>
                                    <th>số lượng</th>
                                    <th>tổng giá</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($content as $cart)
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="img/shopping-cart/cart-1.jpg" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{$cart->name}}</h6>
                                            <h5>{{number_format($cart->price)}} VNĐ</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <img width="50" height="50" src="upload/product/{{$cart->options->image}}" alt="">
                                    </td>
                                    <td class="cart__price">{{$cart->qty}}</td>
                                    <td class="cart__price">{{number_format(($cart->price)*($cart->qty))}} VNĐ</td>
                                    <td class="cart__close">
                                    	<form action="{{route('cart.delete')}}" method="post">
                                    		@method('DELETE')
                                    		@csrf
                                    		<input type="hidden" name="rowId" value="{{$cart->rowId}}">
                                    	<button type="submit" style="border: none; background: none;">
                                    	<i class="fa fa-close"></i>
                                    	</button>

                                    	</form>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{route('shop.index')}}">Tiếp tục mua sắm</a>
                            </div>
                        </div>
                    </div>
                </div>
                @if(!Cart::count() == null)
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Nhập mã giảm giá</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">áp dụng</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Tổng đơn hàng</h6>
                        <ul>
                            <li>tổng giá <span>{{Cart::initial()}} VNĐ</span></li>
                            <li>phí phụ thu<span>0 VNĐ</span></li>
                            <li>thành tiền<span>{{(Cart::priceTotal())}} VNĐ</span></li>
                        </ul>
                        <a href="{{route('cart.getCheckout')}}" class="primary-btn">Tiến hành thanh toán</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

@endsection