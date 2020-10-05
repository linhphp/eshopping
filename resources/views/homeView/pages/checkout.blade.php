@extends('homeView/layout/master')
@section('title','thanh toan | gio hang')
@section('content')

<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Thanh toán giỏ hàng</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('home')}}">Trang chủ</a>
                            <a href="{{route('shop.index')}}">Gian hàng</a>
                            <span>Thanh toán giỏ hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    @if(Session::has('massege'))

    <section class="alert alert-success">
    	<h4 class="text-secondary text-md-center">{{Session::get('massege')}} </h4>
    </section>
    @endif
    <!-- Checkout Section Begin -->
    @if(!Cart::count() == null)
	    <section class="checkout spad">
	        <div class="container">
	            <div class="checkout__form">
	                <form action="{{route('cart.postCheckout')}}" method="post">
	                	@csrf
	                    <div class="row">
	                        <div class="col-lg-8 col-md-6">
	                            
	                            <h6 class="checkout__title">thông tin khách hàng</h6>
	   					 	@if($ctm == null)
	                            <div class="row">
	                                <div class="col-12">
	                                    <div class="checkout__input">
	                                        <p>họ và tên<span>*</span></p>
	                                        <input type="text" name="name" placeholder="nhập tên của " value="{{Auth::user()->name}}">
	                                    </div>
	                                </div>
	                            </div>
	                            <!-- end col name -->
	                            <div class="checkout__input">
	                                <p>địa chỉ giao hàng<span>*</span></p>
	                                <input type="text" name='address' placeholder="nhập địa chỉ của bạn">
	                            </div>
	                           <!-- end col chia chi -->
	                            <div class="row">
	                                <div class="col-lg-6">
	                                    <div class="checkout__input">
	                                        <p>số điện thoại<span>*</span></p>
	                                        <input type="text" name="phone" placeholder="nhập số điện thoại của bạn">
	                                    </div>
	                                </div>
	                                <div class="col-lg-6">
	                                    <div class="checkout__input">
	                                        <p>Email<span>*</span></p>
	                                        <input type="text" name="email" placeholder="nhập địa chỉ email của bạn" value="{{Auth::user()->email}}">
	                                    </div>
	                                </div>
	                            </div>
	                            <!-- end col phone email -->
	                            @else
	    
                                    <div class="row">
	                                <div class="col-12">
	                                    <div class="checkout__input">
	                                        <p>họ và tên<span>*</span></p>
	                                        <input type="text" name="name" placeholder="nhập tên của " value="{{$ctm['name']}}">
	                                    </div>
	                                </div>
	                            </div>
	                            <!-- end col name -->
	                            <div class="checkout__input">
	                                <p>địa chỉ giao hàng<span>*</span></p>
	                                <input type="text" name='address' placeholder="nhập địa chỉ của bạn" value="{{$ctm['address']}}">
	                            </div>
	                           <!-- end col chia chi -->
	                            <div class="row">
	                                <div class="col-lg-6">
	                                    <div class="checkout__input">
	                                        <p>số điện thoại<span>*</span></p>
	                                        <input type="text" name="phone" placeholder="nhập số điện thoại của bạn" value="{{$ctm['phone']}}">
	                                    </div>
	                                </div>
	                                <div class="col-lg-6">
	                                    <div class="checkout__input">
	                                        <p>Email<span>*</span></p>
	                                        <input type="text" name="email" placeholder="nhập địa chỉ email của bạn" value="{{$ctm['email']}}">
	                                    </div>
	                                </div>
	                            </div>
	                            <!-- end col phone email -->

	    						@endif
	                            <div class="checkout__input__checkbox">
	                                <label for="acc">
	                                    tạo mới một tài khoản?
	                                    <input type="checkbox" id="acc" name="save" value="save">
	                                    <span class="checkmark"></span>
	                                </label>
	                                <p>Tạo tài khoản bằng cách nhập thông tin bên dưới. Nếu bạn không muốn thì có thế bỏ qua</p>
	                            </div>
	                            <div class="checkout__input">
	                                <p>tạo mật khẩu:<span>*</span></p>
	                                <input type="password" name="password">
	                            </div>
	                            <div class="checkout__input">
	                                <p>nhập lại mật khẩu:<span>*</span></p>
	                                <input type="password" name="repassword">
	                            </div>
	                            <div class="checkout__input">
	                                <p>ghi chú đơn hàng</p>
	                                <input type="text" name="note"  
	                                placeholder="hãy ghi những gì bạn muốn, chúng tôi sẽ thực hiện theo yêu cầu của bạn">
	                            </div>
	                        </div>
	                        <div class="col-lg-4 col-md-6">
	                            <div class="checkout__order">
	                                <h4 class="order__title">đơn hàng của bạn</h4>
	                                <div class="checkout__order__products">sản phẩm <span>số lượng</span></div>
	                                <ul class="checkout__total__products">
	                                	@foreach($content as $cart)
	                                    <li>{{$cart->name}} <span>({{$cart->qty}})</span></li>
	                                    @endforeach
	                                </ul>
	                                <ul class="checkout__total__all">
	                                    <li>tổng tiền <span>{{Cart::initial()}} VNĐ</span></li>
	                                    <li>thành tiền <span>{{Cart::priceTotal()}} VNĐ</span></li>
	                                </ul>
	                                <div class="checkout__input__checkbox">
	                                    <label for="payment">
	                                        chuyển khoản
	                                        <input type="checkbox" id="payment" name="payment" value="ATM">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </div>
	                                <div class="checkout__input__checkbox">
	                                    <label for="paypal">
	                                        thanh toán khi nhận hàng
	                                        <input type="checkbox" id="paypal" name="payment" value="COD">
	                                        <span class="checkmark"></span>
	                                    </label>
	                                </div>
	                                <button type="submit" class="site-btn">xác nhận đặt hàng</button>
	                            </div>
	                        </div>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </section>


    @endif
    <!-- Checkout Section End -->

@endsection