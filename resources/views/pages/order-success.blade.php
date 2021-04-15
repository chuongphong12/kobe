@extends('master')
@section('content')
<!-- Main Wrapper Start -->
<main class="main-content-wrapper">
    <div class="error-area pt--90 pt-xl--70 pb--120 pb-xl--100 pb-lg--95 pb-sm--90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 text-center">
                    <div class="error">
                        <h1><img src="/assets/img/icons/checked.svg" width="250"></h1>
                        <h2>Đơn hàng của bạn đã được tạo thành công</h2>
                        <p>Cảm ơn bạn đã tin tưởng và đặt hàng trên <a href="{{route('trang-chu')}}">Kobe Vietnam</a>. Đơn hàng của bạn đã được tiếp nhận và sẽ được giao vào thời gian sớm nhất</p>
                        <!--<form action="#" class="searchform searchform--2 mb--50">-->
                        <!--    <input type="text" name="search" id="error_search" placeholder="Search..." class="searchform__input">-->
                        <!--    <button type="submit" class="searchform__submit">Search</button>-->
                        <!--</form>-->
                        <a href="{{route('trang-chu')}}" class="btn">Quay về trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main Wrapper End -->
@endsection