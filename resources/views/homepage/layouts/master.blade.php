<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- <!-- Google Font --> --}}
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    {{-- <!-- Css Styles --> --}}
    <link rel="stylesheet" href="{{ asset('ogani/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('ogani/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('ogani/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('ogani/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('ogani/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('ogani/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ogani/css/slicknav.min.css')}}" type="text/css">

    <link rel="stylesheet" href="{{ asset('ogani/sass/style.css') }}" type="text/css"> <!-- change sass to css in the end  -->
</head>

<body>
    {{-- <!-- Page Preloader --> --}}
    <div id="preloader">
        <div class="loader"></div>
    </div>
    {{-- <!-- Page Preloader END --> --}}

    {{-- NAVBAR SECTION START --}}

    {{-- <!-- Hamburger (only visible on tablets and mobiles) --> --}}
    <div class="hamburger__menu__overlay"></div>
    <div class="hamburger__menu__wrapper">
        @include('homepage.layouts.hamburger')
    </div>
    {{-- <!-- Hamburger END --> --}}
    {{-- <!-- Header Section (on tablets and mobiles it's hidden) --> --}}
    <header class="header">
        @include('homepage.layouts.header')
    </header>
    {{-- <!-- Header Section END --> --}}

    {{-- NAVBAR SECTION END  --}}

    {{-- <!-- Hero Section --> --}}
    <section class="hero">
        <div class="container">
            <div class="row">

                {{-- SIDEBAR SECTION START  --}}

                @include('homepage.layouts.sidebar')

                {{-- SIDEBAR SECTION END --}}

                <div class="col-lg-9">

                    {{-- SEARCH SECTION START  --}}

                    @include('homepage.layouts.search')

                    {{-- SEARCH SECTION END  --}}

                    {{-- PROMO SECTION START  --}}

                    @include('homepage.layouts.promo')

                    {{-- PROMO SECTION END  --}}

                </div>
            </div>
        </div>
    </section>
    {{-- <!-- Hero Section END --> --}}

    @yield('body')

    <!-- Footer Section -->
    @include('homepage.layouts.footer')
    <!-- Footer Section END -->

    <!-- JS Plugins -->
    <script src="{{ asset('ogani/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('ogani/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('ogani/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('ogani/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('ogani/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('ogani/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('ogani/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('ogani/js/main.js') }}"></script>
    <script src="{{ asset('admin/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

    @yield('script')

    @if (session('status') == 'sukses')
    <script type="text/javascript">
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
    
        Toast.fire({
          icon: 'success',
          title: '{{session('message')}}'
        })
            
        
      });
    
    </script>
    @endif
    @if (session('status') == 'error')
    <script type="text/javascript">
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });
    
        Toast.fire({
          icon: 'error',
          title: '{{session('message')}}'
        })
            
        
      });
    
    </script>
    @endif
</body>

</html>