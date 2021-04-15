@extends('master')
@section('content')

<!-- Breadcrumb area Start -->
<section class="page-title-area bg-image ptb--80" data-bg-image="assets/img/bg/page_title_bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title">Sản phẩm</h1>
                <ul class="breadcrumb">
                    <li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
                    <li class="current"><span>Sản phẩm</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb area End -->

<!-- Main Content Wrapper Start -->
<div class="main-content-wrapper">
    <div class="brand-logo-area section-break">
        <div class="container">
            <div class="row mb--28 mb-md--18 mb-sm--33">
                <div class="col-md-12">
                    <div class="kobe-title kobe-title--style-1 mb--80">
                        <div class="kobe-title__title">Sản phẩm</div>
                        <h2 class="kobe-title__sub-title">Cao Cấp</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="element-carousel slick-vertical-center" data-slick-options='{

                                    "spaceBetween": 30,

                                    "slidesToShow": 4,

                                    "slidesToScroll": 1,
                                    
                                    "autoplay": true,
                                            
                                    "autoplaySpeed": 3000,
                                    
                                    "pauseOnHover": true,

                                    "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },

                                    "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }

                                }' data-slick-responsive='[

                                    {"breakpoint":1199, "settings": {

                                        "slidesToShow": 3

                                    }},

                                    {"breakpoint":991, "settings": {

                                        "slidesToShow": 2

                                    }},

                                    {"breakpoint":575, "settings": {

                                        "slidesToShow": 1

                                    }}

                                ]'>
                        @foreach ($high as $item)
                        <div class="item">

                            <div class="ft-product">

                                <div class="product-inner">

                                    <div class="product-image">

                                        <figure class="product-image--holder">

                                            <img src="{{Voyager::image($item->image)}}" alt="Product" />

                                        </figure>

                                        <a href="{{route('product',$item->slug)}}" class="product-overlay"></a>

                                        <div class="product-action">

                                            <a data-toggle="modal" data-target="#{{$item->slug}}"
                                                class="action-btn quick-view">

                                                <i class="fa fa-eye"></i>

                                            </a>

                                        </div>

                                    </div>

                                    <div class="product-info">

                                        <h3 class="product-title"><a
                                                href="{{route('product',$item->slug)}}">{{$item->name}}</a>
                                        </h3>

                                        <div class="product-info-bottom">

                                            <div class="product-price-wrapper">

                                                <span class="money1">{{number_format($item->cost,0)}}₫</span>

                                            </div>

                                            <a href="{{route('cart.add', $item->id_product)}}"
                                                class="add-to-cart pr--15">

                                                <i class="fa fa-plus"></i>

                                                <span><i class="fa fa-shopping-cart"></i></span>

                                            </a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="brand-logo-area section-break">
        <div class="container">
            <div class="row mb--28 mb-md--18 mb-sm--33">
                <div class="col-md-12">
                    <div class="kobe-title kobe-title--style-1 mb--80">
                        <!--<div class="kobe-title__title">Sản phẩm</div>-->
                        <h2 class="kobe-title__sub-title">Trung Cấp</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="element-carousel slick-vertical-center" data-slick-options='{

                                    "spaceBetween": 30,

                                    "slidesToShow": 4,

                                    "slidesToScroll": 1,
                                    
                                    "autoplay": true,
                                            
                                    "autoplaySpeed": 3000,
                                    
                                    "pauseOnHover": true,

                                    "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },

                                    "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }

                                }' data-slick-responsive='[

                                    {"breakpoint":1199, "settings": {

                                        "slidesToShow": 3

                                    }},

                                    {"breakpoint":991, "settings": {

                                        "slidesToShow": 2

                                    }},

                                    {"breakpoint":575, "settings": {

                                        "slidesToShow": 1

                                    }}

                                ]'>
                        @foreach ($mid as $item)
                        <div class="item">

                            <div class="ft-product">

                                <div class="product-inner">

                                    <div class="product-image">

                                        <figure class="product-image--holder">

                                            <img src="{{Voyager::image($item->image)}}" alt="Product" />

                                        </figure>

                                        <a href="{{route('product',$item->slug)}}" class="product-overlay"></a>

                                        <div class="product-action">

                                            <a data-toggle="modal" data-target="#{{$item->slug}}"
                                                class="action-btn quick-view">

                                                <i class="fa fa-eye"></i>

                                            </a>

                                        </div>

                                    </div>

                                    <div class="product-info">

                                        <h3 class="product-title"><a
                                                href="{{route('product',$item->slug)}}">{{$item->name}}</a>
                                        </h3>

                                        <div class="product-info-bottom">

                                            <div class="product-price-wrapper">

                                                <span class="money1">{{number_format($item->cost,0)}}₫</span>

                                            </div>

                                            <a href="{{route('cart.add', $item->id_product)}}"
                                                class="add-to-cart pr--15">

                                                <i class="fa fa-plus"></i>

                                                <span><i class="fa fa-shopping-cart"></i></span>

                                            </a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="brand-logo-area section-break">
        <div class="container">
            <div class="row mb--28 mb-md--18 mb-sm--33">
                <div class="col-md-12">
                    <div class="kobe-title kobe-title--style-1 mb--80">
                        <!--<div class="kobe-title__title">Sản phẩm</div>-->
                        <h2 class="kobe-title__sub-title">Phổ Thông</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="element-carousel slick-vertical-center" data-slick-options='{
                
                                                    "spaceBetween": 30,
                
                                                    "slidesToShow": 4,
                
                                                    "slidesToScroll": 1,
                                                    
                                                    "autoplay": true,
                                                            
                                                    "autoplaySpeed": 3000,
                                                    
                                                    "pauseOnHover": true,
                
                                                    "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                
                                                    "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                
                                                }' data-slick-responsive='[
                
                                                    {"breakpoint":1199, "settings": {
                
                                                        "slidesToShow": 3
                
                                                    }},
                
                                                    {"breakpoint":991, "settings": {
                
                                                        "slidesToShow": 2
                
                                                    }},
                
                                                    {"breakpoint":575, "settings": {
                
                                                        "slidesToShow": 1
                
                                                    }}
                
                                                ]'>
                        @foreach ($low as $item)
                        <div class="item">

                            <div class="ft-product">

                                <div class="product-inner">

                                    <div class="product-image">

                                        <figure class="product-image--holder">

                                            <img src="{{Voyager::image($item->image)}}" alt="Product" />

                                        </figure>

                                        <a href="{{route('product',$item->slug)}}" class="product-overlay"></a>

                                        <div class="product-action">

                                            <a data-toggle="modal" data-target="#{{$item->slug}}"
                                                class="action-btn quick-view">

                                                <i class="fa fa-eye"></i>

                                            </a>

                                        </div>

                                    </div>

                                    <div class="product-info">

                                        <h3 class="product-title"><a
                                                href="{{route('product',$item->slug)}}">{{$item->name}}</a>
                                        </h3>

                                        <div class="product-info-bottom">

                                            <div class="product-price-wrapper">

                                                <span class="money1">{{number_format($item->cost,0)}}₫</span>

                                            </div>

                                            <a href="{{route('cart.add', $item->id_product)}}"
                                                class="add-to-cart pr--15">

                                                <i class="fa fa-plus"></i>

                                                <span><i class="fa fa-shopping-cart"></i></span>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="brand-logo-area section-break">
        <div class="container">
            <div class="row mb--28 mb-md--18 mb-sm--33">
                <div class="col-md-12">
                    <div class="kobe-title kobe-title--style-1 mb--80">
                        <!--<div class="kobe-title__title">Sản phẩm</div>-->
                        <h2 class="kobe-title__sub-title">Sữa</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="element-carousel slick-vertical-center" data-slick-options='{
                                                    "spaceBetween": 30,
                                                    "slidesToShow": 4,
                                                    "slidesToScroll": 1,
                                                    "autoplay": true,
                                                    "autoplaySpeed": 3000,
                                                    "pauseOnHover": true,
                                                    "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },
                                                    "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }
                                                }' data-slick-responsive='[
                                                    {"breakpoint":1199, "settings": {
                                                        "slidesToShow": 3
                                                    }},
                                                    {"breakpoint":991, "settings": {
                                                        "slidesToShow": 2
                                                    }},
                                                    {"breakpoint":575, "settings": {
                                                        "slidesToShow": 1
                                                    }}
                                                ]'>
                        @foreach ($milk as $item)
                        <div class="item">
                            <div class="ft-product">
                                <div class="product-inner">
                                    <div class="product-image">
                                        <figure class="product-image--holder">
                                            <img src="{{Voyager::image($item->image)}}" alt="Product" />
                                        </figure>
                                        <a href="{{route('sua')}}" class="product-overlay"></a>
                                        <div class="product-action">
                                            <a data-toggle="modal" data-target="#{{$item->slug}}"
                                                class="action-btn quick-view">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <h3 class="product-title"><a
                                                href="{{route('product',$item->slug)}}">{{$item->name}}</a>
                                        </h3>
                                        <div class="product-info-bottom">
                                            <div class="product-price-wrapper">
                                                <span class="money1">{{number_format($item->cost,0)}}₫</span>
                                            </div>
                                            <a href="{{route('cart.add', $item->id_product)}}"
                                                class="add-to-cart pr--15">
                                                <i class="fa fa-plus"></i>
                                                <span><i class="fa fa-shopping-cart"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Content Wrapper Start -->

<!-- Quick View Modal Start -->

@include('layouts.quickviewmodel')

<!-- Quick View Modal End -->

@endsection