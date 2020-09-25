@extends('homeView/layout/master')
@section('title','theo doi don hang ')
@section('content')

    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Theo dõi đơn hàng</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('home')}}">Trang chủ</a>
                            <a href="{{route('shop.index')}}">Gian hàng</a>
                            <span>Theo dõi đơn hàng</span>
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
        		<div class="col-12 ">
            		<p class="text-dark">Tên khách hàng: <span class="font-weight-bold">{{$customer->name}}</span></p>
            		<p class="text-dark">số điện thoại: <span class="font-weight-bold">{{$customer->phone}}</span></p>
            		<p class="text-dark">địa chỉ: <span class="font-weight-bold">{{$customer->address}}</span></p>
            	</div>
        	</div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Hình thức thanh toán</th>
                                    <th>Tổng Tiền</th>
                                    <th>Lời nhắn</th>
                                    <th>Trạng thái</th>
                                    <th class="text-danger">ngày đặt</th>
                                    <th colspan="2" class="pl-5">tuỳ chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php $i=0; ?>
                            	@foreach($bills as $bill)
                            	<?php $i++; ?>
                                <tr>
                                    <td class="cart__price">{{$i}}</td>
                                    <td class="cart__price">{{$bill['payment']}}</td>
                                    <td class="cart__price">{{$bill['total_price']}} VNĐ</td>
                                    <td class="cart__price">{{$bill['note']}}</td>
                                    <td class="cart__price">{{$bill['status']}}</td>
                                    <td class="cart__price text-danger">{{$bill['updated_at']}}</td>
                                    <td class="cart__price"><a href="{{route('cart.show',$bill['id'])}}" class="text-secondary">chi tiết</a></td>
                                    <td class="cart__close">
                                    <form action="">
                                    	<button >
                                    	<i class="fa fa-close"></i>
                                    		
                                    	</button>

                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

@endsection