<div class="header__top-wrapper d-none d-sm-none d-md-none d-lg-block">

    <div class="container header__top">

        <div class="header__top__left">

            <div><i class="fa fa-phone"></i>
                <a href="tel:0988 09 65 29">0988 09 65 29</a> - <a href="tel:0985 09 65 29">0985 09 65 29</a>
            </div>

        </div>
        <div class="header__top__right">
            <ul class="header__top__nav">
                @if (Auth::check())
                <li><a href="{{ route('cus.detail', Auth::user()->id) }}">Xin chào!
                        {{ Auth::user()->username }}</a></li>
                @else

                <div class="header__top__right">
                    <ul class="header__top__login">
                        <li><a href="{{ route('dang-nhap') }}"><i class="fa fa-user"></i>Đăng nhập</a></li>
                    </ul>
                    <ul class="header__top__signup">
                        <li><a href="{{route('dang-ky')}}"><i class="fa fa-sign-in"></i>Đăng ký</a></li>
                    </ul>
                </div>
                @endif
            </ul>
        </div>

    </div>

</div>