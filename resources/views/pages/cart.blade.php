@extends('master')

@section('style')
<style>
    .cart {
        margin: 0 150px;
    }
@media (max-width: 768px) {
    .cart {
        margin: 0 20px !important; 
  }
}
</style>
@endsecion

@section('content')
<div class="page-content-inner ptb--80 pt-md--40 pb-md--60">
    <div class="container-fuild cart">
        <div class="row">
            <div class="col-lg-8 mb-md--50">
                    <div class="row no-gutters">
                        <div class="col-12">
                            <div class="table-content table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                            <th class="text-left">Sản phẩm</th>
                                            <th>Khối lượng</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Trạng thái</th>
                                            <th>Tổng cộng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count = 1; ?>
                                        @foreach (Cart::content() as $item)
                                        <tr>
                                            <td class="product-remove text-left"><a
                                                    href="{{route('cart.remove', $item->rowId)}}"><i
                                                        class="fa fa-remove"></i></a></td>
                                            <td class="product-thumbnail text-left">
                                                <img src="{{voyager::image($item->model->image)}}" alt="Product Thumnail">
                                            </td>
                                            <td class="product-name text-left">
                                                <h3>
                                                    <a href="{{route('product', $item->model->slug)}}">{{$item->name}}.</a>
                                                </h3>
                                            </td>
                                            <td class="product-size">
                                                <span class="product-price-wrapper">
                                                    @if($item->model->product_type == "Sữa")
                                                        @if($item->options->size == 2)
                                                        <span class="money">500ml</span>
                                                        @else
                                                        <span class="money">1000ml</span>
                                                        @endif
                                                    @else
                                                        @if($item->options->size == 1)
                                                        <span class="money">250gr</span>
                                                        @elseif($item->options->size == 2)
                                                        <span class="money">500gr</span>
                                                        @else
                                                        <span class="money">1kg</span>
                                                        @endif
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="product-price">
                                                <span class="product-price-wrapper">
                                                    <span class="money">{{number_format($item->price,0)}}₫</span>
                                                </span>
                                            </td>
                                            <td class="product-quantity">
                                                <div class="cart_quantity">
                                                    <input type="number" class="quantity-input" name="qty"
                                                        id="upCart<?php echo $count; ?>" value="{{$item->qty}}" min="1">
                                                </div>
                                                <input type="hidden" name="rowId" id="rowId<?php echo $count; ?>"
                                                    value="{{$item->rowId}}">
                                                <input type="hidden" name="proId" id="proId<?php echo $count; ?>"
                                                    value="{{$item->id}}">
                                                <input type="hidden" name="amount" id="amount<?php echo $count; ?>"
                                                    value="{{$item->model->mount}}">
                                            </td>
                                            <td class="product-style">
                                                @if($item->model->product_type == "Sữa")
                                                
                                                @else
                                                <span class="product-price-wrapper">
                                                    <form action="{{route('cart.upStyle', $item->rowId)}}" method="POST"
                                                        id="upStyle<?php echo $count; ?>">
                                                        @csrf
                                                        @if ($item->weight == 1)
                                                        <input type="radio" id="style<?php echo $count; ?>" name="style" value="1"
                                                            checked>Nguyên</br>
                                                        <input type="radio" id="style<?php echo $count; ?>" name="style"
                                                            value="2">Thái
                                                        @else
                                                        <input type="radio" id="style<?php echo $count; ?>" name="style"
                                                            value="1">Nguyên</br>
                                                        <input type="radio" id="style<?php echo $count; ?>" name="style" value="2"
                                                            checked>Thái
                                                        @endif
                                                    </form>
                                                </span>
                                                @endif
                                            </td>
                                            <td class="product-total-price">
                                                <span class="product-price-wrapper">
                                                    <span
                                                        class="money">{{number_format($item->qty * $item->price, 0)}}₫</span>
                                                </span>
                                            </td>
                                        </tr>
                                        <?php $count++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters border-top pt--20 mt--20">
                        <div class="col-sm-6">
                            <div class="coupon">
                                <input type="text" id="coupon" name="coupon" class="cart-form__input"
                                    placeholder="Mã khuyến mãi">
                                <button type="submit" class="cart-form__btn">Áp dụng</button>
                            </div>
                        </div>
                        <div class="col-sm-6 text-sm-right">
                            {{-- <a type="text" href="" class="cart-form__btn">Xóa toàn bộ</a> --}}
                            <a type="text" href="{{route('cart.index')}}" class="cart-form__btn">Cập nhật
                                giá</a>
                        </div>
                    </div>
            </div>
            <div class="col-lg-4">
                <div class="cart-collaterals">
                    <div class="cart-totals">
                        <h5 class="font-size-14 font-bold mb--15">Tổng tiền giỏ hàng của bạn</h5>
                        <div class="cart-calculator">
                            <div class="cart-calculator__item">
                                <div class="cart-calculator__item--head">
                                    <span>Tạm tính</span>
                                </div>
                                <div class="cart-calculator__item--value">
                                    <span>{{Cart::subtotal(0,'.',',')}}₫</span>
                                </div>
                            </div>
                            <div class="cart-calculator__item">
                                <div class="cart-calculator__item--head">
                                    <span>Phí giao hàng</span>
                                </div>
                                <div class="cart-calculator__item--value">
                                    <span>Có phí khi hoàn tất đơn hàng</span>
                                    <!--<span>Giao hàng tiết kiệm: {{Cart::tax(0,'.',',')}}₫</span>-->
                                    <!--<div class="shipping-calculator-wrap">-->
                                    <!--    <a href="#shipping_calculator" class="expand-btn">Tính phí giao-->
                                    <!--        hàng</a>-->
                                    <!--    <form id="shipping_calculator"-->
                                    <!--        class="form shipping-calculator-form hide-in-default">-->
                                    <!--        <div class="form__group">-->
                                    <!--            <select id="calc_shipping_district" name="calc_shipping_district"-->
                                    <!--                class="nice-select form__input form__input--select">-->
                                    <!--                <option value="">Chọn thành phố…</option>-->
                                    <!--                @foreach ($provinces as $item)-->
                                    <!--                <option value="{{$item->districtid}}">{{$item->name}}</option>-->
                                    <!--                @endforeach-->
                                    <!--            </select>-->
                                    <!--        </div>-->

                                    <!--        <div class="form__group">-->
                                    <!--            <input type="submit" value="Update Totals" class="btn btn-size-sm">-->
                                    <!--        </div>-->
                                    <!--    </form>-->
                                    <!--</div>-->
                                </div>
                            </div>
                            <div class="cart-calculator__item order-total">
                                <div class="cart-calculator__item--head">
                                    <span>Tổng tiền</span>
                                </div>
                                <div class="cart-calculator__item--value">
                                    <span class="product-price-wrapper">
                                        <span class="money">{{Cart::total(0,'.',',')}}₫</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{Session::get('url.intended')}}" class="btn btn-size-md btn-shape-square btn-fullwidth">
                        Tiếp tục mua sắm
                    </a>
                    <hr>
                    <a href="{{route('thanh-toan')}}" class="btn btn-size-md btn-shape-square btn-fullwidth">
                        Tiến hành thanh toán
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        <?php for ($i = 1; $i < 100; $i++) { ?>
        $('#upCart<?php echo $i ?>').on('click change keyup', function() {
            var newqty = $('#upCart<?php echo $i ?>').val();
            var rowId = $('#rowId<?php echo $i ?>').val();
            var proId = $('#proId<?php echo $i ?>').val();
            var amount = $('#amount<?php echo $i ?>').val();

            if (newqty <= 0) {
                alert('Vui lòng nhập số lượng');
            } else {
                $.ajax({
                    type: 'get',
                    dataType: 'html',
                    url: '<?php echo url('/cart/update'); ?>/' + proId,
                    data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
                    success: function(response) {
                        // console.log(response);
                        // $('#updateDiv').html(response);
                    }
                });
            }
        });
        <?php  } ?>

    <?php for ($i = 1; $i < 100; $i++) { ?>
        $("input[id='style<?php echo $i ?>']").change(function() {
            $.post($("#upStyle<?php echo $i ?>").attr("action"), $("#upStyle<?php echo $i ?>").serialize(),
                function() {
                alert('Sửa trạng thái thành công!!');
            });
        });
    <?php  } ?>
    });
</script>

@endsection