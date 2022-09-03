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

<div class="portfolio">
    <div class="container">
        <div class="row portfolio-container">
            <div class="col-lg-12 col-md-6 col-sm-12 portfolio-item first">
                <div class="portfolio-wrap">
                    <a href="{{asset('public/frontend/img/thank.png')}}" data-lightbox="portfolio">
                        <img src="{{asset('public/frontend/img/thank.png')}}" alt="Portfolio Image">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection