@extends('layout')
@section('content')

<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Trang chủ</a>
                    <a href="#">Phụ kiện </a>
                    <span>{{$meta_title}}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="product-details spad">
    <div class="container">
        @foreach ($accessory_details as $key => $value)
        <div class="row">
            <div class="col-lg-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__left product__thumb nice-scroll">
                        <a class="pt active" href="#product-1">
                            <img src="{{URL::to('/public/uploads/accessory/'.$value->acsr_image)}}" alt="">
                        </a>
                        <a class="pt" href="#product-2">
                            <img src="{{URL::to('/public/uploads/accessory/'.$value->acsr_image)}}" alt="">
                        </a>
                        <a class="pt" href="#product-3">
                            <img src="{{URL::to('/public/uploads/accessory/'.$value->acsr_image)}}" alt="">
                        </a>
                    </div>
                    <div class="product__details__slider__content">
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-hash="product-1" class="product__big__img" src="{{URL::to('/public/uploads/accessory/'.$value->acsr_image)}}" alt="">
                            <img data-hash="product-2" class="product__big__img" src="{{URL::to('/public/uploads/accessory/'.$value->acsr_image)}}" alt="">
                            <img data-hash="product-3" class="product__big__img" src="{{URL::to('/public/uploads/accessory/'.$value->acsr_image)}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product__details__text">
                    <h3>{{$value->acsr_name}} <span>Mã phụ kiện: {{$value->acsr_id}}</span></h3>
                    <div class="product__details__price">{{number_format($value->acsr_price,0,'.','.').' đ'}}</div>
                    <p>{!!$value->acsr_desc!!}</p>
                    <div class="product__details__button">
                        <form action="{{URL::to('/save-cart-accessory')}}" method="post">
                            {{ csrf_field() }}
                            <div class="quantity">
                                <span>Số lượng:</span>
                                <div class="pro-qty">
                                    <input name="qty" type="number" min="1" value="1">
                                    <input name="accessoryid_hidden" type="hidden" value="{{$value->acsr_id}}" />
                                </div>
                            </div>
                            <button type="submit" class="cart-btn">Thêm giỏ hàng</button>
                        </form>
                        <ul>
                            <li><a href="#"><span><i class="fas fa-heart"></i></span></a></li>
                            <li><a href="#"><span><i class="fas fa-list"></i></span></a></li>
                        </ul>
                    </div>
                    <div class="product__details__widget">
                        <ul>
                            <li>
                                <span>Tình trạng:</span>
                                <p>Còn</p>
                            </li>
                            <li>
                                <span>Danh mục:</span>
                                <p>{{$value->accessory_name}}</p>
                            </li>
                            <li>
                                <span>Loại:</span>
                                <p>{{$value->acsr_content}}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Mô tả</a>
                        </li>
                        <li class="nav-item">
                            |
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Nội dung</a>
                        </li>
                        <li class="nav-item">
                            |
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Bình luận</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <p>{{$value->acsr_content}}</p>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <p>{{$value->acsr_desc}}</p>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="blog__details__comment">
                                <div class="contact__form">
                                    <h5>Gửi bình luận</h5>
                                    <form>
                                        @csrf
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-6 col-sm-6">
                                                    <div class="checkout__form__input">
                                                        <p>Tên <span>*</span></p>
                                                        <input type="text" class="comment_name" placeholder="Nhập tên của bạn.." required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7 col-md-6 col-sm-6">
                                                    <div class="checkout__form__input">
                                                        <p>Nội dung <span>*</span></p>
                                                        <input type="text" id="message" class="comment_content" placeholder="Nhập nội dung bình luận.." required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-6 col-sm-6">
                                                    <div class="checkout__form__input">
                                                        <p> <span>*</span></p>
                                                        <button type="submit" class="site-btn send-comment-accessory">Đăng</button>
                                                    </div>
                                                </div>
                                                <div id="notify_comment"></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <h5>Bình luận</h5>
                                <form>
                                    @csrf
                                    <input type="hidden" name="comment_accessory_id" class="comment_accessory_id" value="{{$value->acsr_id}}">
                                    <div id="comment_accessory_show"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="related__title">
                    <h5>SẢN PHẨM LIÊN QUAN</h5>
                </div>
            </div>
            @foreach($relate as $key => $lienquan)
            <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                <div class="product__item">
                    <a href="{{URL::to('/chi-tiet-phu-kien/'.$lienquan->acsr_id)}}">
                        <div class="product__item__pic set-bg" data-setbg="{{URL::to('public/uploads/product/'.$lienquan->acsr_image)}}"></div>
                    </a>
                    <div class="product__item__text">
                        <h6><a href="{{URL::to('/chi-tiet-phu-kien/'.$lienquan->acsr_id)}}">{{$lienquan->acsr_name}}</a></h6>
                        <i>Mã SP: {{$lienquan->acsr_id}}</i>
                        <div class="product__price">
                            <form action="{{URL::to('/save-cart-accessory')}}" method="post">
                                {{ csrf_field() }}
                                <input name="qty" type="hidden" min="1" value="1" />
                                <input name="accessoryid_hidden" type="hidden" value="{{$lienquan->acsr_id}}" />
                                <button type="submit" class="btn-product"><i class="fas fa-cart-plus"></i> | {{number_format($lienquan->acsr_price,0,'.','.').' đ'}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection