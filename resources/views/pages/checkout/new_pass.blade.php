@extends('layout')
@section('content')
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{URL::to('/')}}"><i class="fas fa-home"></i> Trang chủ</a><i class="fas fa-angle-double-right"></i>
                    <span>{{$meta_title}}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row py-5 mt-4 align-items-center">
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="{{asset('public/frontend/img/nhomk.png')}}" alt="Ảnh đăng nhập" class="img-fluid mb-3 d-none d-md-block">
        </div>
        <div class="col-md-7 col-lg-6 ml-auto">
            @if(session()->has('massage'))
                <div class="alert alert-success">
                    {{session()->get('massage')}}
                </div>
                @elseif(session()->has('error'))
                    <div class="alert alert-danger">
                        {{session()->get('error')}}
                    </div>
                @endif
            @php
                $token = $_GET['token'];
                $email = $_GET['email'];
            @endphp
            <form action="{{URL('/reset-new-pass')}}" method="post">
                @csrf
                <div class="row">
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input type="hidden" name="email" class="form-control" value="{{$email}}">
                        <input type="hidden" name="token" class="form-control" value="{{$token}}">
                        <input id="ipnPassword" type="password" name="password_account" placeholder="Nhập lại mật khẩu" class="form-control bg-white border-left-0 border-md" required>
                        <button class="btn btn-outline-secondary" type="button" id="btnPassword">
                            <span class="fas fa-eye"></span>
                        </button>
                    </div>
                    <div class="form-group col-lg-12 mx-auto mb-0">
                        <button type="submit" class="btn btn-primary btn-block py-2">
                            <span class="font-weight-bold">Gửi</span>
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
                            <span class="font-weight-bold">Đăng nhập bằng Facebook</span>
                        </a>
                        <a href="{{URL::to('/login-customer-google')}}" class="btn btn-primary btn-block py-2 btn-twitter">
                            <i class="fab fa-google"></i> 
                            <span class="font-weight-bold">Đăng nhập bằng Google</span>
                        </a>
                    </div>
                    <div class="text-center w-100">
                        <p class="text-muted font-weight-bold">Bạn đã nhớ tài khoản? <a href="{{URL('/login-checkout')}}" class="text-primary ml-2">Đăng nhập</a> | Nếu chưa thì hãy? <a href="{{URL('/register-checkout')}}" class="text-primary ml-2">Đăng ký</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection