	<aside>
	    <div id="sidebar" class="nav-collapse">
	        <!-- sidebar menu start-->
	        <div class="leftside-navigation">
	            <ul class="sidebar-menu" id="nav-accordion">
	 
	                
	                <li class="sub-menu">
	                    <a href="javascript:;">
	                        <i class="fa fa-book"></i>
	                        <span>danh mục sản phẩm</span>
	                    </a>
	                    <ul class="sub">
							<li><a href="{{ route('danh-muc-san-pham.index') }}">hiển thị danh mục</a></li>
							<li><a href="{{ route('danh-muc-san-pham.create') }}">thêm danh mục</a></li>
	                    </ul>
	                </li>
	                {{-- end sub menu --}}
	                <li class="sub-menu">
	                    <a href="javascript:;">
	                        <i class="fa fa-book"></i>
	                        <span>thương hiệu sản phẩm</span>
	                    </a>
	                    <ul class="sub">
							<li><a href="{{ route('thuong-hieu-san-pham.index') }}">hiển thị thương hiệu</a></li>
							<li><a href="{{ route('thuong-hieu-san-pham.create') }}">thêm thương hiệu</a></li>
	                    </ul>
	                </li>
	                {{-- end sub menu --}}
	                <li class="sub-menu">
	                    <a href="javascript:;">
	                        <i class="fa fa-book"></i>
	                        <span>sản phẩm</span>
	                    </a>
	                    <ul class="sub">
							<li><a href="{{ route('san-pham.index') }}">hiển thị sản phẩm</a></li>
							<li><a href="{{ route('san-pham.create') }}">thêm sản phẩm</a></li>
	                    </ul>
	                </li>
	                {{-- end sub menu --}}
	                <li class="sub-menu">
	                    <a href="javascript:;">
	                        <i class="fa fa-book"></i>
	                        <span>quản lý Users</span>
	                    </a>
	                    <ul class="sub">
							<li><a href="{{ route('customer.index') }}">khách hàng</a></li>
							<li><a href="{{ route('users.index') }}">người dùng</a></li>
	                    </ul>
	                </li>
	                {{-- end sub menu --}}
	                <li class="sub-menu">
	                    <a href="javascript:;">
	                        <i class="fa fa-book"></i>
	                        <span>danh mục bài viết</span>
	                    </a>
	                    <ul class="sub">
							<li><a href="{{ route('the-loai-bai-viet.index') }}">hiển thị danh mục</a></li>
							<li><a href="{{ route('the-loai-bai-viet.create') }}">thêm danh mục</a></li>
	                    </ul>
	                </li>
	                {{-- end sub menu --}}
	                <li class="sub-menu">
	                    <a href="javascript:;">
	                        <i class="fa fa-book"></i>
	                        <span>quản lý bài biết</span>
	                    </a>
	                    <ul class="sub">
							<li><a href="{{ route('bai-viet.index') }}">Hiển thị bài viết</a></li>
							<li><a href="{{ route('bai-viet.create') }}">thêm bài viết</a></li>
	                    </ul>
	                </li>
	                {{-- end sub menu --}}
	                
	                <li>
	                    <a href="login.html">
	                        <i class="fa fa-user"></i>
	                        <span>Login Page</span>
	                    </a>
	                </li>
					<li class="sub-menu">
	                    <a href="javascript:;">
	                        <i class="fa fa-book"></i>
	                        <span>quản lý silder</span>
	                    </a>
	                    <ul class="sub">
							<li><a href="{{ route('slider.index') }}">Hiển thị slider</a></li>
							<li><a href="{{ route('slider.create') }}">Thêm slider</a></li>
	                    </ul>
	                </li>
	            </ul>            </div>
	        <!-- sidebar menu end-->
	    </div>
	</aside>