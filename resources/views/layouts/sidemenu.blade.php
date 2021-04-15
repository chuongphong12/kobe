<div class="col-xl-3 col-lg-4 order-lg-1">
    <aside class="shop-sidebar">
        <div class="shop-widget mb--40">
            <h3 class="widget-title mb--25">Loại sản phẩm</h3>
            <ul class="widget-list brand-list">
                @foreach($product_type as $type)
                <li>
                    <a href="{{route($type->slug)}}">
                        <span>{{$type->name}}</span>
                        <?php                    
                    $count_sp=DB::table('products')->where('product_type','LIKE',$type->name)->get();?>
                        <strong class="color--red font-weight-medium">{{count($count_sp)}}</strong>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="shop-widget mb--40">
            <h3 class="widget-title mb--25">Chọn mức giá:</h3>
            <ul class="widget-list price-list">
                <li>
                    <a href="{{route('product_type',2)}}">
                        <span><i class="fa fa-long-arrow-right"></i> Dưới 2
                            triệu</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('product_type',3)}}">
                        <span><i class="fa fa-long-arrow-right"></i> Từ 2 - 4
                            triệu</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('product_type',4)}}">
                        <span><i class="fa fa-long-arrow-right"></i> Trên 4
                            triệu</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="shop-widget">
            <h3 class="widget-title mb--25">Chế biến:</h3>
            <div class="tagcloud">
                @foreach($cook as $chebien)
                <a href="{{route('product_type',$chebien->slug)}}">{{$chebien->name}}</a>
                @endforeach
            </div>
        </div>
    </aside>
</div>