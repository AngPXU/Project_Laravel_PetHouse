@extends('layout')
@section('content')
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{URL::to('/')}}"><i class="fas fa-home"></i> Trang chủ</a>
                    <span>{{$meta_title}}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row py-5 mt-4 align-items-center">
        <div class="col-md-5 pr-lg-6 mb-5 mb-md-0">
            <img src="{{asset('public/frontend/img/dangky.png')}}" alt="Ảnh đăng ký" class="img-fluid mb-3 d-none d-md-block" style="width:100%;">
        </div>
        <div class="col-md-7 col-lg-6 ml-auto">
            <h1 style="font-weight:bold;font-size:45px;text-align:center;color:#fbaf32;">ĐĂNG KÝ</h1>
            <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                <div class="border-bottom w-100 ml-5"></div>
                <div class="border-bottom w-100 mr-5"></div>
            </div>
            <form action="{{URL::to('/add-customer')}}" method="post">
                @csrf
                <div class="row">
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                        </div>
                        <input id="name" type="text" name="customer_name" placeholder="Tên của bạn" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fas fa-phone"></i>
                            </span>
                        </div>
                        <input id="phone" type="text" name="customer_phone" placeholder="Số điện thoại" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input id="email" type="email" name="customer_email" placeholder="Email đăng nhập" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="ipnPassword" type="password" name="customer_password" placeholder="Mật khẩu" class="form-control bg-white border-left-0 border-md" required>
                        <button class="btn btn-outline-secondary" type="button" id="btnPassword">
                            <span class="fas fa-eye"></span>
                        </button>
                    </div>
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button type="submit" class="btn btn-primary btn-block py-2">
                            <span class="font-weight-bold">Đăng ký</span>
                        </button>
                    </div>
                    <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                        <div class="border-bottom w-100 ml-5"></div>
                        <span class="px-2 small text-muted font-weight-bold text-muted">Hoặc</span>
                        <div class="border-bottom w-100 mr-5"></div>
                    </div>
                    <div class="form-group col-lg-12 mx-auto">
                        <a href="{{URL::to('/login-facebook-customer')}}" class="btn btn-primary btn-block py-2 btn-facebook">
                            <i class="fa fa-facebook-f mr-2"></i>
                            <span class="font-weight-bold">Đăng ký bằng Facebook</span>
                        </a>
                        <a href="{{URL::to('/login-customer-google')}}" class="btn btn-primary btn-block py-2 btn-twitter">
                            <i class="fab fa-google"></i> 
                            <span class="font-weight-bold">Đăng ký bằng Google</span>
                        </a>
                    </div>
                    <div class="text-center w-100">
                        <p class="text-muted font-weight-bold"><a href="{{URL('/forgot-pass')}}" class="text-primary ml-2">Quên mật khẩu</a> | Bạn đã có tài khoản? <a href="{{URL('/login-checkout')}}" class="text-primary ml-2">Đăng nhập</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection