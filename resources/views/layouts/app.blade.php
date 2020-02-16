<!DOCTYPE html>
<html lang="en">
    <body>

    @include('layouts.header')

    <!--===============================
        NAV
    ===================================-->

    @include('layouts.navbar')


    <!--===============================
        SLIDER
    ===================================-->
    @yield('content')

    <!--===============================
        FOOTER
    ===================================-->
    @include('layouts.footer')
    <!--===============================
        SCRIPT
    ===================================-->

    <script src="{{asset('')}}js/jquery-1.11.1.min.js"></script>
    <script src="{{asset('')}}js/bootstrap.min.js"></script>
    <script src="{{asset('')}}owl-carousel/owl.carousel.min.js"></script>
    <script src="{{asset('')}}js/script.js"></script>

    @stack('scripts')
    </body>
</html>
