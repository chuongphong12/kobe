@extends('master')
@section('content')
<!-- Main Content Wrapper Start -->
<div class="main-content-wrapper">
  <div class="page-content-inner pt--105 pb--120">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ml-auto mr-auto">
          <div class="register-box">
            <h4 class="heading__tertiary mb--30 text-center">Đăng ký</h4>
            @include('error.flash-message')
            <form class="form form--login" action="{{route('register')}}" method="post">
              @csrf

              <!--@if(Session::has('thongbao'))-->
              <!--<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>-->
              <!--<div class="alert alert-success">{{Session::get('thongbao')}}</div>-->
              <!--@endif-->
              <div class="form__group mb--20" {{ $errors->has('cusname') ? 'has-error' : '' }}>
                <label class="form__label" for="register_name">Tên Hiển Thị: <span class="required">*</span></label>
                <input type="text" class="form__input" id="register_name" name="cusname" placeholder="Nhập họ tên" value="{{ old('cusname') }}" />
                @if ($errors->has('cusname'))
                    <span class="text-danger">{{ $errors->first('cusname') }}</span>
                @endif
              </div>
              <div class="form__group mb--20" {{ $errors->has('phone') ? 'has-error' : '' }}>
                <label class="form__label" for="register_tel">Điện thoại <span class="required">*</span></label>
                <input type="number" class="form__input" id="register_tel" name="phone"
                  placeholder="Nhập số điện thoại của bạn" value="'{{ old('phone') }}"/>
                @if ($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
              </div>
              <div class="form__group mb--20" {{ $errors->has('email') ? 'has-error' : '' }}>
                <label class="form__label" for="email">Địa chỉ email <span class="required">*</span></label>
                <input type="email" class="form__input" id="email" name="email" placeholder="Nhập địa chỉ email" value="{{ old('email') }}"/>
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
              </div>
              <div class="form__group mb--20" {{ $errors->has('password') ? 'has-error' : '' }}>
                <label class="form__label" for="register_password">Mật khẩu <span class="required">*</span></label>
                <input type="password" class="form__input" id="register_password" name="password"
                  placeholder="Nhập mật khẩu"/>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
              </div>
              <div class="form__group mb--20" {{ $errors->has('re_password') ? 'has-error' : '' }}>
                <label class="form__label" for="re_password">Xác nhận mật khẩu
                  <span class="required">*</span></label>
                <input type="password" class="form__input" id="re_password" name="re_password"
                  placeholder="Nhập lại mật khẩu"/>
                @if ($errors->has('re_password'))
                    <span class="text-danger">{{ $errors->first('re_password') }}</span>
                @endif
              </div>
              <p class="privacy-text mb--20">
                Khi bạn nhấn Đăng ký, bạn đã đồng ý thực hiện mọi giao
                dịch mua bán theo
                <a href="#" style="color:#EB1B21;">điều kiện sử dụng và chính sách của Bò Kobe Việt
                  Nam</a>
              </p>
              <div class="form__group">
                <input type="submit" value="Đăng ký" class="btn btn-size-sm mr-2" />
              </div>
              <br />
              <a class="forgot-pass" href="{{route('dang-nhap')}}">Bạn đã có tài khoản? Đăng nhập</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Main Content Wrapper Start -->
@endsection