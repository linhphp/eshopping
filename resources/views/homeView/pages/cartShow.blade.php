@extends('homeView/layout/master')
@section('title','theo doi don hang ')
@section('content')

    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Đơn hàng chi tiết</h4>
                        <div class="breadcrumb__links">
                            <a href="{{route('home')}}">Trang chủ</a>
                            <a href="{{route('cart.check')}}">Theo dõi đơn hàng</a>
                            <span>Đơn hàng chi tiết</span>
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
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php $i=0; ?>
                            	@foreach($billDetails as $billDetail)
                            	<?php $i++; ?>
                                <tr>
                                    <td class="cart__price">{{$i}}</td>
                                    <td class="cart__price">{{$billDetail->name}}</td>
                                    <td class="cart__price text-danger pl-5"> {{$billDetail->quantity}}</td>
                                    <td class="cart__price">{{number_format(($billDetail->price)/($billDetail->quantity))}}  VNĐ</td>

                                    <td class="cart__price">{{number_format($billDetail->price)}} VNĐ</td>
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