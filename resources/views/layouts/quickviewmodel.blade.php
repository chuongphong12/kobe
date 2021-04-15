@foreach($products as $product)

<div class="modal fade product-modal" id="{{$product->slug}}" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-body">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true"><i class="fa fa-remove"></i></span>

                </button>

                <div class="row">

                    <div class="col-lg-8">

                        <div class="element-carousel slick-vertical-center" data-slick-options='{

                            "slidesToShow": 1,

                            "slidesToScroll": 1,

                            "arrows": true,

                            "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-left" },

                            "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-right" }

                        }'>

                            <div class="product-image">

                                <div class="product-image--holder">

                                    <a href="{{route('product',$product->slug)}}">

                                        <img src="{{Voyager::image($product->image)}}" alt="Product Image" class="primary-image" />

                                    </a>

                                </div>

                                <!--<span class="product-badge sale">sale</span>-->

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-4">

                        <div class="modal-box product-summary">

                            <div class="product-rating d-flex mb--20">

                                <!--<div class="star-rating star-three">-->

                                <!--    <input id="input-id" class="rating" value="{{ $product->AverageRating }}" data-size="sm" readonly>-->

                                <!--</div>-->

                            </div>

                            <h3 class="product-title mb--20">{{$product->name}}</h3>
            <p class="product-short-description mb--20">

              {{$product->description}}

            <p class="unit-price">Đơn giá: {{number_format($product->cost,0)}}/kg</p>
                
                <div class="product-price-wrapper mb--25">
                  
                <a href="{{route('cart.Qadd', $product->id_product)}}" class="btn btn-shape-square btn-size-sm">
                    Thêm vào giỏ <i class="fa fa-shopping-cart"></i>
                  </a>

              </div>

              <div class="product-footer-meta">

                <p><span>Cách chế biến:</span>
                    @foreach(json_decode($product->cooking) as $item)
                            {{ $item }},
                    @endforeach
                </p>

              </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endforeach