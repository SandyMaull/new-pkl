<div class="header__top">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <!-- Left side of header -->
                <div class="header__top__left">
                    <ul>
                        <li><i class="fa fa-envelope"></i> info@ogani.com</li>
                        <li>Free shipping for all orders over $50</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <!-- Right side of header -->
                <div class="header__top__right">
                    @if (!Auth::guest())
                        <div class="header__top__right__language">
                            {{ Auth::user()->username }}
                        </div>
                    @endif
                    <div class="header__top__right__auth">
                        @if (Auth::guest())
                            <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                        @else
                            {{-- <a href="{{ route('logout') }}">Logout</a> --}}
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Navigation -->
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="header__logo">
                <a href="{{ url('/') }}"><img src="{{ asset('ogani/img/logo.png') }}" alt=""></a>
            </div>
        </div>
        <div class="col-lg-6">
            <nav class="header__menu">
                <ul>
                    <li class="active"><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">Pages</a>
                        <ul class="header__menu__dropdown">
                            <li><a href="#">Shop Details</a></li>
                            <li><a href="#">Shoping Cart</a></li>
                            <li><a href="#">Check Out</a></li>
                            <li><a href="#">Blog Details</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>
        <div class="col-lg-3">
            <div class="header__cart">
                @if (!Auth::guest())
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                    </ul>
                    <div class="header__cart__price"><span>$10.00</span></div>
                @endif
            </div>
        </div>
    </div>
    <div class="hamburger__open">
        <i class="fa fa-bars"></i>
    </div>
</div>