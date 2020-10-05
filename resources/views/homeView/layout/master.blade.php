<!DOCTYPE html>
<html lang="zxx">

@include('homeView/layout/head')

<body>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    @include('homeView/layout/menu')
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    @include('homeView/layout/header')
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
   
    <!-- Hero Section End -->
        @section('content')

    

    <!-- Product Section Begin -->

        @show
    <!-- Product Section End -->
   
   @include('homeView/layout/footer')
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form" action="{{route('search')}}" method="get">
                <input type="text" id="search-input" name="key" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    @include('homeView/layout/js')
</body>

</html>