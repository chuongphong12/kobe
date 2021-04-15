 <!-- Footer Start-->
    <footer class="footer">

        <div class="footer-top">
  
          <div class="container-fluid">
  
            <div class="row pt--70 pb--70">
  
                <div class="col-lg-2 col-sm-12 offset-lg-0 mb-md--45">
  
                <div class="footer-widget">
  
                  <div class="textwidget">
  
                    <figure class="footer-logo mb--30">
  
                      <img src="assets/img/logo/logo-bokobe.png" alt="Logo">
  
                    </figure>
  
                    <p> Kobe Vietnam tự tin khẳng định về chất lượng sản phẩm, dịch vụ cũng nhằm mục đích nâng cao nhận diện thương hiệu đến khách hàng dễ dàng hơn</p>
  
                  </div>
  
                </div>
  
              </div>
  
              <div class="col-lg-2 col-sm-12 offset-lg-1 mb-md--45">
  
                <div class="footer-widget">
  
                  <h3 class="widget-title mb--35 mb-sm--20">Giới thiệu</h3>
  
                  <div class="footer-widget">
  
                    <ul class="footer-menu">
  
                      <li><a href="{{route('trang-chu')}}">Về Bò Kobe</a></li>
  
                      <li><a href="{{route('danhmucbaiviet')}}">Tin tức</a></li>
  
                      <li><a href="{{route('pages.contact')}}">Liên hệ</a></li>
  
                      <!--<li><a href="{{route('shop')}}">Hệ thống cửa hàng</a></li>-->
  
  
                    </ul>
  
                  </div>
  
                </div>
  
              </div>
  
              <div class="col-lg-2 col-sm-12 offset-lg-0 mb-md--45">
  
                <div class="footer-widget">
  
                  <h3 class="widget-title mb--35 mb-sm--20">Điều khoản</h3>
  
                  <div class="footer-widget">
  
                    <ul class="footer-menu">
                        @php 
                        $page=DB::table('pages')->where('type','Term')->get(); 
                        @endphp
                        @foreach($page as $item)
                      <li><a href="{{route('pages.show',$item->slug)}}">{{$item->title}}</a></li>
                      @endforeach
                  
                      
                      
  
                    </ul>
  
                  </div>
  
                </div>
  
              </div>
              <div class="col-lg-3 col-sm-12 offset-lg-0 mb-md--45">
  
                <div class="footer-widget">
  
                  <h3 class="widget-title mb--35 mb-sm--20">Thông tin liên hệ</h3>
  
                  <div class="footer-widget">
  
                    <ul class="footer-menu">
  
                      <li><b>Địa chỉ trụ sở chính: </b><a href="https://goo.gl/maps/LwrF3uqX1PkzEMh3A">G25, đường 3A, khu Him Lam, P. Tân Hưng, Q7</a></li>
  
                      <li><b>Hotline: </b><a href="tel:0988 09 65 29">0988 09 65 29</a> - <a href="tel:0985 09 65 29">0985 09 65 29</a></li>
  
                      <li><b>Địa chỉ tên miền: </b><a href="http://kobevietnam.com.vn/">kobevietnam.com.vn</a></li>

                      <li>Giấy chứng nhận đăng ký doanh nghiệp số 0311241512 do UBND Thành phố Hồ Chí Minh cấp lần đầu tiên ngày 07/10/2011</li>

  
                    </ul>
  
                  </div>
  
                </div>
  
              </div>
              <div class="col-lg-2 col-md-4 col-sm-12 mb-xs--45">
  
                  <div class="footer-widget">
  
                    <h3 class="widget-title mb--35 mb-sm--20">Kết nối với chúng tôi</h3>
  
                    <div class="social">
                        <a href="{{setting('site.facebook')}}" class="social__link">
                          <img src="/assets/img/icons/ic-facebook.svg" width="10">
                        </a>
                        <a href="{{setting('site.youtube')}}" class="social__link">
                            <img src="/assets/img/icons/ic-youtube.svg" width="30">
                        </a>
                        <a href="tel:{{setting('site.zalo')}}" class="social__link">
                            <img src="/assets/img/icons/ic-zalo.svg" width="30">
                        </a>
                      </div>
                      
                    <p style="font-size:14px;">Đăng ký nhận tin tức mới về sản phẩm và khuyến mãi</p>
                     @include('error.flash-message')
                    <form action="{{route('newletter')}}" method="POST" class="form">
                        @csrf
                      <input type="email" class="form__input-newsletter mb--20" id="inputEmail" name="email" placeholder="Nhập email của bạn">
                      <button class="btn btn-size-sm" type="submit">
                        <span>Đăng ký</span>
                      </button>
                    </form>
                    
                    
                      
                  </div>
  
                </div>
  
              </div>
              
            </div>
  
          </div>
          <div class="footer-bottom">

              <div class="container-fluid">
      
                <div class="row ptb--20">
      
                  <div class="col-12 text-center">
      
                    <p class="copyright-text">© 2019 - Bản quyền của Công ty Bò Kobe Việt Nam</p>
      
                  </div>
      
                </div>
      
              </div>
      
            </div>
        </footer>


  
    <!-- Footer End-->
    
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-L0K8VLLWQQ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-L0K8VLLWQQ');
</script>



    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v4.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your customer chat code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="655527234920042"
  theme_color="#EB1B21"
  logged_in_greeting="Kobe Vietnam xin chào quý khách"
  logged_out_greeting="Kobe Vietnam xin chào quý khách">
      </div>
