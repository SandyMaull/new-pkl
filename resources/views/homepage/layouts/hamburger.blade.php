<div class="hamburger__menu__logo">
    <a href="#"><img src="{{ asset('ogani/img/logo.png') }}" alt=""></a>
</div>
<div class="hamburger__menu__cart">
    @if (!Auth::guest())
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
        </ul>
        <div class="header__cart__price"><span>$10.00</span></div>
    @endif
</div>
<div class="hamburger__menu__widget">
    @if (!Auth::guest())
        <div class="header__top__right__language">
            {{ Auth::user()->username }}
        </div>
    @endif
    <div class="header__top__right__auth">
        @if (Auth::guest())
            <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
        @else
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
<nav class="hamburger__menu__nav mobile-menu">
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
<div id="mobile-menu-wrap"></div>
<div class="header__top__right__social">
    <a href="#"><i class="fa fa-facebook"></i></a>
    <a href="#"><i class="fa fa-twitter"></i></a>
    <a href="#"><i class="fa fa-linkedin"></i></a>
    <a href="#"><i class="fa fa-pinterest-p"></i></a>
</div>
<div class="hamburger__menu__contact">
    <ul>
        <li><i class="fa fa-envelope"></i> info@ogani.com</li>
        <li>Free shipping for all orders over $50</li>
    </ul>
</div>