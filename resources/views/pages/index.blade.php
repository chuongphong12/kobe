@extends('master')

@section('style')
<style>
    .kobe-popup .btn-close {
        position: absolute;
        border: none;
        background: #ffffff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        width: 60px;
        height: 60px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        z-index: 5;
        top: 15%;
        right: 9%;
    }
</style>
@endsection

@section('content')
<!-- Grid Line Start-->
<div class="container d-none d-md-block">
  <div class="strip-bgr">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
  </div>
</div>
<!-- Grid Line End  -->

<!-- Main Content Wrapper Start -->

<main class="main-content-wrapper">

  <h1 class="d-none">Giới thiệu về Bò Kobe</h1>



  <!-- Slider Kobe Start -->

  <div class="container">

    <section class="intro-slider-wrapper section-break">

      <div class="kobe-slider kobe-slider--style-half">
      
        <div class="kobe-slider__list">
        
        
          <div class="kobe-slider__image-list">

           
          @foreach($slide as $sl)
            <div class="kobe-slider__image">
                <a href="/bai-viet/{{$sl->post}}">
              <img src="{{Voyager::image($sl->image)}}" alt="img" />
              </a>

            </div>
            @endforeach

            <!-- Slide 5 Img -->

          </div>

          <!-- End of Imgs wrapper -->
          
          <div class="kobe-slider__content-list">

          

            <!-- Slide 1 Content -->

          </div>
          
         
          <!-- End of Content wrapper -->


          
        </div>
        
      </div>

    </section>

  </div>

  <!-- Slider Kobe End -->



  <!--  Our Story Start-->

  <div class="container">

    <section class="intro-story-wrapper section-break">

      <div class="row">

        <div class="col-md-6">

          <div class="kobe-title kobe-title--style-1">

            <div class="kobe-title__title">Story</div>

            <h2 class="kobe-title__sub-title">Câu chuyện thương hiệu</h2>

          </div>

          <!--<img class="direct-line first" src="./assets/img/icons/direct-1.png" alt="line">-->
          
        </div>
        
    </div>

    <div class="row">
        <div class="col-md-6 order-2 order-sm-2 order-lg-1">
            <h3>"10 NĂM CHO SỰ TÂM HUYẾT VÀ ĐẦY ĐAM MÊ VỀ NGHỆ THUẬT NUÔI BÒ KOBE TẠI VIỆT NAM"</h3>

          <p>Cả thế giới dường như đã biết câu chuyện Bò Kobe Nhật Bản với quy trình chăn nuôi khắt khe cũng như chất lượng và giá thành bậc nhất thế giới.</p>
          
        <p>Trang trại được xây dựng từ năm 2009 với sứ mệnh "Kobe Việt Nam - Tạo ra một văn hóa ẩm thực đặc sắc cho người Việt bằng những sản phẩm chất lượng cao từ giống bò Kobe Nhật Bản". Trong vòng 10 năm chúng tôi đã  nghiên cứu và phát triển chăn nuôi thành công giống bò Wagyu , chúng được sinh sản, nuôi lớn tại Bảo Lộc, Tỉnh Lâm Đồng. Trang trại hiện đang là đầu mối phân phối thịt bò Wagyu với thương hiệu Kobe Việt Nam tại các chuỗi siêu thị, nhà hàng khách sạn nổi tiếng trên toàn quốc.
            </p>
        </div>
        
        <div class="col-md-6 order-1 order-sm-1 order-lg-2 kobe-image" style="margin-bottom: 5vh">
    
              <img src="./assets/img/home/story.jpg" alt="about-us">
    
            </div>
    </div>
        

      </div>

      <!--<div class="row">-->

      <!--  <div class="col-md-6">-->
      <!--      <h3>10 NĂM CHO SỰ TÂM HUYẾT VÀ ĐẦY ĐAM MÊ VỀ NGHỆ THUẬT NUÔI BÒ KOBE TẠI VIỆT NAM</h3>-->

      <!--    <p>Cả thế giới dường như đã biết câu chuyện Bò Kobe Nhật Bản với quy trình chăn nuôi khắt khe cũng như chất lượng và giá thành bậc nhất thế giới.-->
      <!--      Trang trại được xây dựng từ năm 2009 với sứ mệnh "Kobe Việt Nam - Tạo ra một văn hóa ẩm thực đặc sắc cho người Việt bằng những sản phẩm chất lượng cao từ giống bò Kobe Nhật Bản". Trong vòng 10 năm chúng tôi đã  nghiên cứu và phát triển chăn nuôi thành công giống bò Wagyu , chúng được sinh sản, nuôi lớn tại Bảo Lộc, Tỉnh Lâm Đồng. Trang trại hiện đang là đầu mối phân phối thịt bò Wagyu với thương hiệu Kobe Việt Nam tại các chuỗi siêu thị, nhà hàng khách sạn nổi tiếng trên toàn quốc.-->
      <!--      </p>-->

          <!--<img class="direct-line" src="./assets/img/icons/direct-2.png" alt="line">-->

          <!--<p>Chúng tôi đã tiến hành nhập những con bò giống đầu tiên về Việt Nam vào cuối năm 2011 và  tiến hành phối tinh bằng tinh bò Kobe, để cho ra đời thế hệ giống bò đầu tiên mang dòng máu Kobe.</p>-->

      <!--  </div>-->

        <!--<div class="col-md-2">-->

        <!--  <img class="d-none d-sm-none d-md-block direct-line diff" src="./assets/img/icons/direct-3.png" alt="line">-->

        <!--  <img class="direct-line d-block d-md-none" src="./assets/img/icons/direct-2.png" alt="line">-->

        <!--</div>-->

        <!--<div class="col-md-4">-->

        <!--  <p>Vào 2012, chú bò giống F1 đầu tiên được sinh ra ở trang trại, sau hơn 32 tháng nuôi thì-->

        <!--    đến năm 2015-->

        <!--    công-->

        <!--    ty ra mắt sản phẩm đầu tiên.</p>-->

        <!--  <img class="direct-line" src="./assets/img/icons/direct-4.png" alt="line">-->

        <!--  <p>Và đến nay 2019, Kobe Vietnam tự tin khẳng định về chất lượng sản phẩm, dịch vụ cũng nhằm-->

        <!--    mục đích nâng-->

        <!--    cao-->

        <!--    nhận diện thương hiệu đến khách hàng dễ dàng hơn.</p>-->

        <!--</div>-->

        <!--<div class="col-md-2"></div>-->

      <!--</div>-->

    </section>

  </div>

  <!-- Our Story End -->



  <!-- Quality Kobe Start -->

  <div class="container">

    <section class="intro-quality-wrapper section-break">

      <div class="row">

        <div class="col-md-6 order-2 order-sm-2 order-lg-1">

          <div class="kobe-title kobe-title--style-1">

            <div class="kobe-title__title">Quality</div>

            <h2 class="kobe-title__sub-title">Chứng nhận Nhật Bản</h2>

          </div>

          <img class="img-text" src="./assets/img/home/3-khong.png"
            alt="Bò Kobe chất lượng nói không với thức ăn công nghiệp, hormone tăng trưởng, tồn dư kháng sinh" />

        </div>

        <div class="col-md-6 order-1 order-sm-1 order-lg-2">

          <img class="img-qua" src="./assets/img/home/chung-nhan.png" alt="Chứng nhận 100% tiêu chuẩn Nhật Bản" />

        </div>

      </div>

    </section>

  </div>

  <!-- Quaily Kobe End -->



  <!-- Cut of Beef Begin -->

  <div class="container">

    <section class="intro-beef-wrapper section-break"
      style="background: url('./assets/img/home/background-bokobe.png') no-repeat;">

      <h2 class="d-none">Các phần thịt của Bò Kobe</h2>

      <div class="row container">

        <div class="col-lg-6 left-wrapper">

          <div class="kobe-title kobe-title--style-1 kobe-title--grey">

            <div class="kobe-title__title">KOBE</div>

          </div>

          <!-- <embed id="svg-kobe-cow-wrapper" class="svg-kobe-cow-wrapper" type="image/svg+xml" data="./assets/img/home/Con bò.svg  "></embed> -->

          <div class="iframe-wrapper-pt56">

          <iframe class="svg-kobe-cow-wrapper" type="image/svg+xml" src="./assets/img/home/Conbo.svg  "></iframe>

          </div>

        </div>

        <div class="col-lg-6 right-wrapper">

          <div class="kobe-slider kobe-slider--style-1 kobe-slider--with-slider">

            <div class="kobe-slider__list">

              <div class="kobe-slider__item-wrapper">

                <div class="kobe-slider__item">

                  <div class="item__image">

                    <img src="./assets/img/home/co.jpg" alt="" />

                  </div>

                  <div class="item__content">

                    <h3 class="item__content__title">Phần cổ</h3>

                    <div class="item__content__text">Trang trại đầu tiên và duy nhất tại Việt Nam nuôi thành công

                      giống

                      Bò lông đen Nhật Bản thế hệ F1 này với phương thức...</div>

                    <a href="{{url('/tim-kiem?search=phần cổ')}}" class="item__content__button">Khám phá ngay</a>

                  </div>

                </div>

              </div>

              <!-- End of Item -->

              <div class="kobe-slider__item-wrapper">

                <div class="kobe-slider__item">

                  <div class="item__image">

                    <img src="./assets/img/home/than-vai.jpg" alt="" />

                  </div>

                  <div class="item__content">

                    <h3 class="item__content__title">Phần thăn vai</h3>

                    <div class="item__content__text">Là phần thịt nằm trên vai bò, giòn, ngọt, lượng mỡ vừa phải, vân mỡ
                      bố trí đều, ít gân có thể dùng làm bít tết, nướng, xào, lẩu. (Độ mềm 3+*, vân mỡ 4*)</div>

                    <a href="{{url('/tim-kiem?search=thăn vai')}}" class="item__content__button">Khám phá ngay</a>

                  </div>

                </div>

              </div>

              <!-- End of Item -->

              <div class="kobe-slider__item-wrapper">

                <div class="kobe-slider__item">

                  <div class="item__image">

                    <img src="./assets/img/home/than-lung-lat.jpg" alt="" />

                  </div>

                  <div class="item__content">

                    <h3 class="item__content__title">Phần thăn lưng</h3>

                    <div class="item__content__text">Trải nghiệm món bít tết có vân mỡ vô cùng đẹp kết hợp với một ít
                      gân giòn tan. Ngoài ra phần thịt này cũng có thể thưởng thức để nướng và nhúng lẩu. (Độ mềm 4*,
                      vân mỡ 4*)</div>

                    <a href="{{url('/tim-kiem?search=thăn lưng')}}" class="item__content__button">Khám phá ngay</a>

                  </div>

                </div>

              </div>

              <!-- End of Item -->

              <div class="kobe-slider__item-wrapper">

                <div class="kobe-slider__item">

                  <div class="item__image">

                    <img src="./assets/img/home/than-ngoai-lat.jpg" alt="" />

                  </div>

                  <div class="item__content">

                    <h3 class="item__content__title">Phần thăn ngoại</h3>

                    <div class="item__content__text">Phần thịt mềm, được đánh giá ngon chỉ sau thăn nội. Vân mỡ đều như
                      hoa tay trên những ngón tay. Dùng ngon nhất khi làm món bít tết, nướng hoặc nhúng lẩu. (Độ mềm 4*,
                      vân mỡ 4*)</div>

                    <a href="{{url('/tim-kiem?search=thăn ngoại')}}" class="item__content__button">Khám phá ngay</a>

                  </div>

                </div>

              </div>

              <!-- End of Item -->

              <div class="kobe-slider__item-wrapper">

                <div class="kobe-slider__item">

                  <div class="item__image">

                    <img src="./assets/img/home/than-noi-lat.jpg" alt="" />

                  </div>

                  <div class="item__content">

                    <h3 class="item__content__title">Phần thăn nội</h3>

                    <div class="item__content__text">Còn được gọi là Phile, phần thịt ngon, mềm nhất với hàm lượng mỡ
                      cực ít. Thích hợp cho món bít tết cao cấp đem tới một trải nghiệm ẩm thực bậc nhất. (Độ mềm 5*,
                      Vân mỡ 1*)</div>

                    <a href="{{url('/tim-kiem?search=thăn nội')}}" class="item__content__button">Khám phá ngay</a>

                  </div>

                </div>

              </div>

              <!-- End of Item -->

              <div class="kobe-slider__item-wrapper">

                <div class="kobe-slider__item">

                  <div class="item__image">

                    <img src="./assets/img/home/mong.jpg" alt="" />

                  </div>

                  <div class="item__content">

                    <h3 class="item__content__title">Phần mông</h3>

                    <div class="item__content__text">Là bộ phận mềm nhất của phần mông. Thịt rất mềm và ngọt nên có thể
                      chế biến được món bít-tết mông đặc trưng và các món như thịt băm, nướng. (Độ mềm 3*, vân mỡ 3*)
                    </div>

                    <a href="{{url('/tim-kiem?search=mông')}}" class="item__content__button">Khám phá ngay</a>

                  </div>

                </div>

              </div>

              <!-- End of Item -->

              <div class="kobe-slider__item-wrapper">

                <div class="kobe-slider__item">

                  <div class="item__image">

                    <img src="./assets/img/home/bap-chan.jpg" alt="" />

                  </div>

                  <div class="item__content">

                    <h3 class="item__content__title">Phần bắp chân</h3>

                    <div class="item__content__text">Trang trại đầu tiên và duy nhất tại Việt Nam nuôi thành công

                      giống

                      Bò lông đen Nhật Bản thế hệ F1 này với phương thức...</div>

                    <a href="{{url('/tim-kiem?search=bắp chân')}}" class="item__content__button">Khám phá ngay</a>

                  </div>

                </div>

              </div>

              <!-- End of Item -->

              <div class="kobe-slider__item-wrapper">

                <div class="kobe-slider__item">

                  <div class="item__image">

                    <img src="./assets/img/home/bung.jpg" alt="" />

                  </div>

                  <div class="item__content">

                    <h3 class="item__content__title">Phần bụng</h3>

                    <div class="item__content__text">Có 2 thớ thịt khác nhau gồm phần vừa có mỡ vừa có chút gân nên rất
                      đậm đà mà không bị sạm khô, phần còn lại thớ thịt rõ ràng nên lại giòn và mềm thích hợp cho các
                      món nướng. (Độ mềm 3*, vân mỡ 3*)</div>

                    <a href="{{url('/tim-kiem?search=bụng')}}" class="item__content__button">Khám phá ngay</a>

                  </div>

                </div>

              </div>

              <!-- End of Item -->

              <div class="kobe-slider__item-wrapper">

                <div class="kobe-slider__item">

                  <div class="item__image">

                    <img src="./assets/img/home/nam.jpg" alt="" />

                  </div>

                  <div class="item__content">

                    <h3 class="item__content__title">Phần nạm</h3>

                    <div class="item__content__text">Trang trại đầu tiên và duy nhất tại Việt Nam nuôi thành công

                      giống

                      Bò lông đen Nhật Bản thế hệ F1 này với phương thức...</div>

                    <a href="{{url('/tim-kiem?search=nạm')}}" class="item__content__button">Khám phá ngay</a>

                  </div>

                </div>

              </div>

              <!-- End of Item -->

            </div>

          </div>

        </div>

      </div>

    </section>

  </div>

  <!-- Cut of Beef End -->



  <!-- Quality Kobe Start -->
  <div class="container">
    <section class="intro-quality-wrapper section-break">
      <div class="row">
        <div class="col-md-12">
          <div class="kobe-title kobe-title--style-1">
            <div class="kobe-title__title">Numbers</div>
            <h2 class="kobe-title__sub-title">Những con số biết nói</h2>
          </div>
        </div>
        <div class="col-md-3 d-flex flex-column align-items-center mb--20">
          <h3><span class="count">100</span>+</h3>
          <span>Nhân viên</span>
        </div>
        <div class="col-md-3 d-flex flex-column align-items-center mb--20">
          <h3><span class="count">{{count($products)}}</span>+</h3>
          <span>Sản phẩm</span>
        </div>
        <div class="col-md-3 d-flex flex-column align-items-center mb--20">
          <h3><span class="count">100</span>+</h3>
          <span>Nhà phân phối</span>
        </div>
        <div class="col-md-3 d-flex flex-column align-items-center mb--20">
          <h3><span class="count">1000</span>+</h3>
          <span>Khách hàng</span>
        </div>
      </div>
    </section>
  </div>
  <!-- Quaily Kobe End -->


  <!-- Brand Logo Area Start -->
  <div class="brand-logo-area section-break">
    <div class="container">
      <div class="row mb--28 mb-md--18 mb-sm--33">
        <div class="col-md-12">
          <div class="kobe-title kobe-title--style-1 mb--80">
            <div class="kobe-title__title">Partner</div>
            <h2 class="kobe-title__sub-title">Đối tác đồng hành</h2>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-xl-12">
        <div class="brand-log-wrapper">
                <div class="element-carousel" data-slick-options='{
                                    "slidesToShow": 4,
                                    "autoplay": true,
                                    "autoplaySpeed": 1500
                                }' data-slick-responsive='[
                                    {"breakpoint": 1200, "settings": {"slidesToShow": 4}},
                                    {"breakpoint": 992, "settings": {"slidesToShow": 3}},
                                    {"breakpoint": 768, "settings": {"slidesToShow": 2}},
                                    {"breakpoint": 480, "settings": {"slidesToShow": 1}}
                                ]'>
                  <div class="item">
                    <figure class="d-flex flex-column align-items-center">                    
                      <img src="assets/img/brand/eximbank.jpg" alt="Brand" class="mx-auto">
                      <a class="pt--20 plr--20 text-center" tabindex="0" href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                    </figure>
                  </div>
                  <div class="item">
                    <figure class="d-flex flex-column align-items-center">
                      <img src="assets/img/brand/sabeco.jpg" alt="Brand" class="mx-auto">
                      <a class="pt--20 plr--20 text-center" tabindex="0" href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                    </figure>
                  </div>
                  <div class="item">
                    <figure class="d-flex flex-column align-items-center">
                      <img src="assets/img/brand/bidv.jpg" alt="Brand" class="mx-auto">
                      <a class="pt--20 plr--20 text-center" tabindex="0" href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                    </figure>
                  </div>
                  <div class="item">
                    <figure class="d-flex flex-column align-items-center">
                      <img src="assets/img/brand/vinamilk.jpg" alt="Brand" class="mx-auto">
                      <a class="pt--20 plr--20 text-center" tabindex="0" href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                    </figure>
                  </div>
                  <div class="item">
                    <figure class="d-flex flex-column align-items-center">
                      <img src="assets/img/brand/bidv.jpg" alt="Brand" class="mx-auto">
                      <a class="pt--20 plr--20 text-center" tabindex="0" href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                    </figure>
                  </div>
                  <div class="item">
                    <figure class="d-flex flex-column align-items-center">
                      <img src="assets/img/brand/vinamilk.jpg" alt="Brand" class="mx-auto">
                      <a class="pt--20 plr--20 text-center" tabindex="0" href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                    </figure>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Brand Logo Area End -->



  <!-- Contact us Start -->

  <section class="intro-contact-wrapper pb--70 pt--70"
    style="background: url('./assets/img/home/bg-contact-us.jpg') no-repeat;">

    <div class=" container">

      <div class="row">

        <div class="col-md-8 pb--70">

          <h2 class="contact__title mb--45 d-flex justify-content-center align-items-center">Tin Tức</h2>

          <div class="brand-log-wrapper">
                <div class="element-carousel" data-slick-options='{
                                    "spaceBetween": 30,
                                    "slidesToShow": 1,
                                    "infinite": true,
                                    "autoplay": true,
                                    "autoplaySpeed": 1500
                                }' data-slick-responsive='[
                                    {"breakpoint": 1200, "settings": {"slidesToShow": 4}},
                                    {"breakpoint": 992, "settings": {"slidesToShow": 3}},
                                    {"breakpoint": 768, "settings": {"slidesToShow": 2}},
                                    {"breakpoint": 480, "settings": {"slidesToShow": 1}}
                                ]'>
                @foreach($posts as $item)
                  <div class="item">
                    <figure class="d-flex flex-column align-items-center">                    
                      <img src="{{Voyager::image($item->image)}}" alt="Brand" class="mx-auto">
                      <a class="pt--20 plr--20 text-center" tabindex="0" href="{{route('bai-viet',$item->slug)}}">{{$item->title}}</a>
                    </figure>
                  </div>
                @endforeach
                </div>
              </div>
        </div>
        <div class="col-md-4">
          <div class="blog-sidebar pl--15 pl-lg--0">
            <div class="bl-widget post">
              <div class="inner">
                <h5 class="title" id="title" style="color: #000">Tin tức nổi bật</h5>
                <ul class="post-list">
                  @foreach($new_post as $item)
                    <figure class="image">

                      <img src="{{Voyager::image($item->image)}}" alt="Blog Image" class="w-100">

                    </figure>
                  <li>
                    <a href="{{route('bai-viet',$item->slug)}}">{{$item->title}}</a>
                    <span><i class="fa fa-clock-o"></i> {{$item->created_at}}</span>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>

      </div>



    </div>

  </section>

  <!-- Contact us End -->

</main>

@endsection

@section('script')
<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("title");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

window.onload  = function() {
    $('#close-conbo').on('click', function (e) {
		e.preventDefault();
		$('.kobe-popup-wrapper').removeClass('open-pop');;
    });
};
</script>
@endsection