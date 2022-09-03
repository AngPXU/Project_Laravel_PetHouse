@extends('layout')
@section('content')

<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Trang chủ</a>
                    <a href="#">{{$product_cate}}</a>
                    <span>{{$meta_title}}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="product-details spad">
    <div class="container">
        @foreach ($product_details as $key => $value)
        <div class="row">
            <div class="col-lg-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__left product__thumb nice-scroll">
                        @foreach($gallery as $key => $gal)
                        <a class="pt active" href="#{{$gal->gallery_id}}">
                            <img src="{{URL::to('/public/uploads/gallery/'.$gal->gallery_image)}}" alt="{{$gal->gallery_image}}">
                        </a>
                        @endforeach
                    </div>
                    <div class="product__details__slider__content">
                        <div class="product__details__pic__slider owl-carousel">
                            @foreach($gallery as $key => $gal)
                            <img data-hash="{{$gal->gallery_id}}" class="product__big__img" src="{{URL::to('/public/uploads/gallery/'.$gal->gallery_image)}}" alt="{{$gal->gallery_image}}">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="product__details__text">
                    <h3>{{$value->product_name}} <span>Mã sản phẩm: {{$value->product_id}} |
                         Số lượng đã bán:
                         <?php
                            if($value->product_sold >= 1){
                        ?>
                            {{$value->product_sold}}
                        <?php
                            }elseif($value->product_sold <= 1){
                        ?>
                            0
                        <?php
                            }
                        ?>
                        
                    </span></h3>
                    <div class="rating">
                        @for($count=1;$count<=5;$count++)
                        @php
                            if($count<=$rating){
                                $color = 'color:#ffcc00;';
                            }else{
                                $color = 'color:#ccc;';
                            }
                        @endphp
                        <i class="fa fa-star" id="{{$value->product_id}}-{{$count}}" data-index="{{$count}}" data-product_id="{{$value->product_id}}"
                            data-rating="{{$rating}}" style="cursor:pointer; {{$color}}"></i>
                        @endfor
                    </div>

                    <div class="product__details__price">{{number_format($value->product_price,0,'.','.').' đ'}}</div>
                    <p>{!!$value->product_desc!!}</p>
                    <div class="product__details__button">
                        <form>
                            @csrf
                            <input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
                            <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
                            <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
                            <input type="hidden" value="{{$value->product_quantity}}" class="cart_product_quantity_{{$value->product_id}}">
                            <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                            <input type="hidden" value="1" class="cart_product_qty_{{$value->product_id}}">
                            <div class="quantity">
                                <span>Số lượng:</span>
                                <div class="pro-qty">
                                    <input name="qty" type="number" min="1" max="{{$value->product_quantity}}" value="1">
                                    <input name="productid_hidden" type="hidden" value="{{$value->product_id}}" />
                                </div>
                            </div>
                            @if($value->product_quantity >= 1)
                            <button type="button" class="cart-btn add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">Thêm giỏ hàng</button>
                            @elseif($value->product_quantity <= 0)
                            <button type="button" class="cart-btn" disabled="disabled">Tạm hết hàng</button>
                            @endif
                        </form>
                        <ul>
                            <li><a type="button" class="button_wishlist" title="Thêm {{$value->product_name}} vào yêu thích" id="{{$value->product_id}}" onclick="add_wistlist(this.id);"><span><i class="fas fa-heart"></i></span></a></li>
                            <li><a href="#"><span><i class="fas fa-list"></i></span></a></li>
                        </ul>
                    </div>
                    <div class="product__details__widget">
                        <ul>
                            <li>
                                <span>Tình trạng:</span>
                                <p>
                                    <?php
                                        if($value->product_quantity > 0){
                                    ?>
                                        Còn pet ({{$value->product_quantity}})
                                    <?php
                                        }else{
                                    ?>
                                        Hết pet
                                    <?php
                                        }
                                    ?>
                                </p>
                            </li>
                            <li>
                                <span>Danh mục:</span>
                                <p>{{$value->category_name}}</p>
                            </li>
                            <li>
                                <span>Loại:</span>
                                <p>{{$value->brand_name}}</p>
                            </li>
                        </ul>
                    </div>
                    <div class="blog__sidebar__item">
                        <div class="section-title">
                            <h4>Tags sản phẩm</h4>
                        </div>
                        <div class="blog__sidebar__tags">
                            @php
                                $tags = $value->product_tags;
                                $tags = explode(",",$tags);
                            @endphp
                            @foreach($tags as $tag)
                                <a href="{{url('/tag/'.$tag)}}">{{$tag}}</a>
                            @endforeach
                        </div>
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
                            <p>{!!$value->product_desc!!}</p>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <p>{!!$value->product_content!!}</p>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="blog__details__comment">
                                <div class="contact__form">
                                    <h5>Gửi bình luận</h5>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="ratings rating">
                                                    <i style="font-size:17px;color:#000000;">Đánh giá sao: </i>
                                                    @for($count=1;$count<=5;$count++)
                                                        @php
                                                            if($count<=$rating){
                                                                $color = 'color:#ffcc00;';
                                                            }else{
                                                                $color = 'color:#ccc;';
                                                            }
                                                        @endphp
                                                        <i class="fa fa-star rating" id="{{$value->product_id}}-{{$count}}" data-index="{{$count}}" data-product_id="{{$value->product_id}}"
                                                            data-rating="{{$rating}}" style="cursor:pointer; {{$color}}"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                        $customer_id = Session::get('customer_id');
                                        if($customer_id != NULL){	
                                    ?>
                                    <form>
                                        @csrf
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-6 col-sm-6">
                                                    <div class="checkout__form__input">
                                                        <input type="text" class="comment_name" placeholder="Nhập tên của bạn.." value="{{Session::get('customer_name')}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7 col-md-6 col-sm-6">
                                                    <div class="checkout__form__input">
                                                        <input type="text" id="message" class="comment_content" placeholder="Nhập nội dung bình luận.." required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-6 col-sm-6">
                                                    <div class="checkout__form__input">
                                                        <button type="submit" class="site-btn send-comment">Đăng</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                        }else{
                                    ?>
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-6 col-sm-6">
                                                <div class="checkout__form__input">
                                                    <a href="{{URL::to('/login-checkout')}}"><button type="submit" class="site-btn send-comment">Đăng nhập để bình luận</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <h5>Bình luận</h5>
                                <form>
                                    @csrf
                                    <input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$value->product_id}}">
                                    <div id="comment_show"></div>
                                    <div class="comment-list"></div>
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
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <form>
                        @csrf
                        <input type="hidden" value="{{$lienquan->product_id}}" class="cart_product_id_{{$lienquan->product_id}}">
                        <input type="hidden" value="{{$lienquan->product_name}}" class="cart_product_name_{{$lienquan->product_id}}">
                        <input type="hidden" value="{{$lienquan->product_image}}" class="cart_product_image_{{$lienquan->product_id}}">
                        <input type="hidden" value="{{$lienquan->product_price}}" class="cart_product_price_{{$lienquan->product_id}}">
                        <input type="hidden" value="1" class="cart_product_qty_{{$lienquan->product_id}}">
                        <div class="product__item__pic set-bg" data-setbg="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}">
                            <ul class="product__hover">
                                <li><a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_id)}}" title="Xem chi tiết sản phẩm"><span><i class="fas fa-eye"></i></span></a></li>
                                <li><a class="button_wishlist" id="{{$lienquan->product_id}}" onclick="add_wishlist(this.id);" title="Thêm vào yêu thích"><span><i class="fas fa-heart"></i></span></a></li>
                                <li><a type="button" data-toggle="modal" data-target="#xemnhanh" class="xemnhanh" data-id_product="{{$lienquan->product_id}}" title="Xem nhanh sản phẩm"><span><i class="fas fa-expand-alt"></i></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_id)}}">{{$lienquan->product_name}}</a></h6>
                            <i>Mã SP: {{$lienquan->product_id}}</i>
                            <div class="product__price">
                                @if($lienquan->product_quantity >= 1)
                                <button type="button" class="btn-product add-to-cart" data-id_product="{{$lienquan->product_id}}" name="add-to-cart"><i class="fas fa-cart-plus"></i> | {{number_format($lienquan->product_price,0,',','.').' đ'}}</button>
                                @elseif($lienquan->product_quantity <= 0)
                                <button type="button" class="btn-product add-to-cart" disabled="disabled"><i class="fas fa-sad-tear"></i> | Tạm hết hàng</button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection