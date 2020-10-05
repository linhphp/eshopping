@extends('homeView/layout/master')
@section('title','dang ky | dang nhap')
@section('content')

	 <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <form action="{{route('postSignUp')}}" method="post">
                            	@method('POST')
                            	@csrf
	                            <h6 class="checkout__title">Đăng ký</h6>
		                            @if(Session::has('massege'))
		                            <div class="alert alert-success">
		                            	{{Session::get('massege')}}
		                            </div>
		                            @endif
	                            
	                            <div class="checkout__input">
	                                <p>tên<span>*</span></p>
	                                <input type="text" name="name" placeholder="nhap ten cua ban">
	                            </div>
	                            <div class="checkout__input">
	                                <p>email<span>*</span></p>
	                                <input type="text" name="email" placeholder="nhap email cua ban">
	                            </div>
	                            <div class="checkout__input">
	                                <p>mật khẩu<span>*</span></p>
	                                <input type="text" name="pass" placeholder="nhap mat khau cua ban">
	                            </div>
	                            <div class="checkout__input">
	                                <p>nhâp lại mật khẩu<span>*</span></p>
	                                <input type="text" name="repass" placeholder="nhap lai mat khau cua ban">
	                            </div>
	                      		<button type="submit" class="site-btn">Đăng ký</button>
                			</form>
                        </div>
                        <!-- end col dang ky -->
                        <div class="col-12 col-md-6">
                            <form action="{{route('postSignIn')}}" method="post">
                            	@method('POST')
                            	@csrf
	                            <h6 class="checkout__title">Đăng nhập</h6>
	                            @if(Session::has('error'))
	                            <div class="alert alert-danger">
	                            	{{Session::get('error')}}
	                            </div>
	                            @endif
	                            <div class="checkout__input">
	                                <p>email<span>*</span></p>
	                                <input type="text" name="email" placeholder="nhap email cua ban">
	                            </div>
	                            <div class="checkout__input">
	                                <p>mật khẩu<span>*</span></p>
	                                <input type="text" name="pass" placeholder="nhap mat khau cua ban">
	                            </div>
	                      		<button type="submit" class="site-btn">Đăng nhập</button>
                      		</form>
                        </div>
                        <!-- end col dang ky -->
                        
                    </div>
            </div>
        </div>
    </section>

@endsection