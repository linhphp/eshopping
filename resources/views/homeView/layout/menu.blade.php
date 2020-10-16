<div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                @if(Auth::check())
                    <span style="color: #e63334; text-transform: uppercase;" >Chào bạn - {{Auth::user()->name}}</span>
                    <a href="{{route('signOut')}}">Sign out</a>
                @else
                    <a href="{{route('signUp')}}">Sign in</a>
                @endif
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a class="search-switch"><img src="frontend/img/icon/search.png" alt=""></a>
            <a href="#"><img src="frontend/img/icon/heart.png" alt=""></a>
            <a href="#"><img src="frontend/img/icon/cart.png" alt=""> <span>0</span></a>
            <div class="price">{{Cart::count()}}</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>miễn phí vận chuyển, hoàn trả lại trong 7 ngày với bất kỳ lý do.</p>
        </div>
    </div>