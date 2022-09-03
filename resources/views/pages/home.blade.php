@extends('layout')
@section('content')

<section class="categories">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 ">
                <div class="banner__slider owl-carousel">
                    @foreach($slider as $key => $slide)
                    <div class="banner__item set-bg" data-setbg="public/uploads/slider/{{$slide->slider_image}}" alt="{{$slide->slider_name}}"></div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="{{asset('public/frontend/img/categories/category-3.png')}}">
                            <div class="categories__text">
                                <h4>Chó cưng</h4>
                                <a href="{{url('/home-product')}}">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="{{asset('public/frontend/img/categories/category-4.png')}}">
                            <div class="categories__text">
                                <h4>Mèo cưng</h4>
                                <a href="#">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="{{asset('public/frontend/img/categories/category-5.png')}}">
                            <div class="categories__text">
                                <h4>Phụ kiện</h4>
                                <a href="#">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="{{asset('public/frontend/img/categories/category-6.png')}}">
                            <div class="categories__text">
                                <h4>Dịch vụ</h4>
                                <a href="{{URL::to('/show-service')}}">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="categories">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-home">
                    <h4>TRANG TRẠI CHÓ CẢNH</h4>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <a href="{{URL::to('farm-corgi')}}"><div class="categories__item set-bg" data-setbg="{{asset('public/frontend/img/categories/homepage1.jpg')}}" style="height: 250px"></div></a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <a href="{{URL::to('farm-phoc')}}"><div class="categories__item set-bg" data-setbg="{{asset('public/frontend/img/categories/homepage2.jpg')}}" style="height: 250px"></div></a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 p-0">
                        <a href="{{URL::to('farm-poodle')}}"><div class="categories__item set-bg" data-setbg="{{asset('public/frontend/img/categories/homepage3.jpg')}}" style="height: 200px"></div></a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 p-0">
                        <a href="{{URL::to('farm-bull')}}"><div class="categories__item set-bg" data-setbg="{{asset('public/frontend/img/categories/homepage4.jpg')}}" style="height: 200px"></div></a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 p-0">
                        <a href="{{URL::to('farm-chow')}}"><div class="categories__item set-bg" data-setbg="{{asset('public/frontend/img/categories/homepage5.jpg')}}" style="height: 200px"></div></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!----------------------------------------------------- Thú cưng mới trang chủ ----------------------------------------------------->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="section-title">
                    <h4>Thú cưng mới</h4>
                    <a href="{{URL::to('/home-product')}}"><button type="button" class="btn btn-warning"><i class="fas fa-eye"></i>&ensp;Xem thêm</button></a>
                </div>
            </div>
        </div>
        <div class="row property__gallery">
            @foreach($all_product as $key => $product)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <form>
                        @csrf
                        <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_name}}" id="wishlist_productname{{$product->product_id}}" class="cart_product_name_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_price}}" id="wishlist_productprice{{$product->product_id}}" class="cart_product_price_{{$product->product_id}}" value="{{number_format($product->product_price,0,',','.')}} đ">
                        <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
                        <div class="product__item__pic set-bg">
                            <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" id="wishlist_productimage{{$product->product_id}}">
                            <ul class="product__hover">
                                <li><a id="wishlist_producturl{{$product->product_id}}" href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" title="Xem chi tiết sản phẩm"><span><i class="fas fa-eye"></i></span></a></li>
                                <li><a class="button_wishlist" id="{{$product->product_id}}" onclick="add_wistlist(this.id);"><span><i class="fas fa-heart"></i></span></a></li>
                                <li><a type="button" data-toggle="modal" data-target="#xemnhanh" class="xemnhanh" data-id_product="{{$product->product_id}}" title="Xem nhanh sản phẩm"><span><i class="fas fa-expand-alt"></i></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">{{$product->product_name}}</a></h6>
                            <i>Mã SP: {{$product->product_id}}</i>
                            <div class="product__price">
                                @if($product->product_quantity >= 1)
                                <button type="button" class="btn-product add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart"><i class="fas fa-cart-plus"></i> | {{number_format($product->product_price,0,',','.').' đ'}}</button>
                                @elseif($product->product_quantity <= 0)
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
<!-- Modal -->
<div class="modal fade" id="xemnhanh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 100%">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title product_quickview_title" id="" style="color:#fbaf32;font-size:25px;font-weight:500;">
            <span id="product_quickview_title"></span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-5">
                <span id="product_quickview_image"></span>
            </div>
            <div class="col-md-7">
                <h2><span id="product_quickview_title"></span></h2>
                <p><i>Mã ID: <span id="product_quickview_id"></span></i></p>
                <span>
                    <h3 style="font-size:25px;font-weight:bold;">Giá: <span id="product_quickview_price"></span></h3>
                    <label>Số lượng: </label>
                    <input name="qty" type="number" min="1" class="cart_product_qty_" value="1">
                    <input type="hidden" name="productid_hidden" value="">
                </span>
                <p class="quickview">Mô tả sản phẩm: </p>
                <fieldset>
                    <span id="product_quickview_desc"></span>
                    <span id="product_quickview_content"></span>
                </fieldset>
                <input type="button" value="Mua ngay" class="btn btn-primary add-to-cart" data-id_product="" name="add-to-cart">
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary">Xem tiếp</button>
      </div>
    </div>
  </div>
</div>

<section class="shop spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3">
				<div class="shop__sidebar">
					<div class="sidebar__categories">
						<div class="categories__accordion">
							<div class="accordion" id="accordionExample">
								<div class="card">
                                    <img src="{{asset('public/frontend/img/categories/homeimage1.jpg')}}" alt="" style="width:100%;height:540px;border-radius:10px;">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="section-title">
                            <h4>CORGI</h4>
                            <a href="{{URL::to('/home-product')}}"><button type="button" class="btn btn-warning"><i class="fas fa-eye"></i>&ensp;Xem thêm</button></a>
                        </div>
                    </div>
                </div>
				<div class="row">
					@foreach($all_product_corgi as $key => $product)
					<div class="col-lg-4 col-md-6">
                        <div class="product__item">
                            <form>
                                @csrf
                                <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                <input type="hidden" value="{{$product->product_name}}" id="wishlist_productname{{$product->product_id}}" class="cart_product_name_{{$product->product_id}}">
                                <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                <input type="hidden" value="{{$product->product_price}}" id="wishlist_productprice{{$product->product_id}}" class="cart_product_price_{{$product->product_id}}" value="{{number_format($product->product_price,0,',','.')}} đ">
                                <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
                                <div class="product__item__pic set-bg">
                                    <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" id="wishlist_productimage{{$product->product_id}}">
                                    <ul class="product__hover">
                                        <li><a id="wishlist_producturl{{$product->product_id}}" href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" title="Xem chi tiết sản phẩm"><span><i class="fas fa-eye"></i></span></a></li>
                                        <li><a class="button_wishlist" id="{{$product->product_id}}" onclick="add_wistlist(this.id);"><span><i class="fas fa-heart"></i></span></a></li>
                                        <li><a type="button" data-toggle="modal" data-target="#xemnhanh" class="xemnhanh" data-id_product="{{$product->product_id}}" title="Xem nhanh sản phẩm"><span><i class="fas fa-expand-alt"></i></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">{{$product->product_name}}</a></h6>
                                    <i>Mã SP: {{$product->product_id}}</i>
                                    <div class="product__price">
                                        @if($product->product_quantity >= 1)
                                        <button type="button" class="btn-product add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart"><i class="fas fa-cart-plus"></i> | {{number_format($product->product_price,0,',','.').' đ'}}</button>
                                        @elseif($product->product_quantity <= 0)
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
		</div>
	</div>
</section>

<section class="shop spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3">
				<div class="shop__sidebar">
					<div class="sidebar__categories">
						<div class="categories__accordion">
							<div class="accordion" id="accordionExample">
								<div class="card">
                                    <img src="{{asset('public/frontend/img/categories/homeimage2.jpg')}}" alt="" style="width:100%;height:540px;border-radius:10px;">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="section-title">
                            <h4>POODLE</h4>
                            <a href="{{URL::to('/home-product')}}"><button type="button" class="btn btn-warning"><i class="fas fa-eye"></i>&ensp;Xem thêm</button></a>
                        </div>
                    </div>
                </div>
				<div class="row">
					@foreach($all_product_poodle as $key => $product)
					<div class="col-lg-4 col-md-6">
                        <div class="product__item">
                            <form>
                                @csrf
                                <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                                <input type="hidden" value="{{$product->product_name}}" id="wishlist_productname{{$product->product_id}}" class="cart_product_name_{{$product->product_id}}">
                                <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                                <input type="hidden" value="{{$product->product_price}}" id="wishlist_productprice{{$product->product_id}}" class="cart_product_price_{{$product->product_id}}" value="{{number_format($product->product_price,0,',','.')}} đ">
                                <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
                                <div class="product__item__pic set-bg">
                                    <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" id="wishlist_productimage{{$product->product_id}}">
                                    <ul class="product__hover">
                                        <li><a id="wishlist_producturl{{$product->product_id}}" href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" title="Xem chi tiết sản phẩm"><span><i class="fas fa-eye"></i></span></a></li>
                                        <li><a class="button_wishlist" id="{{$product->product_id}}" onclick="add_wistlist(this.id);"><span><i class="fas fa-heart"></i></span></a></li>
                                        <li><a type="button" data-toggle="modal" data-target="#xemnhanh" class="xemnhanh" data-id_product="{{$product->product_id}}" title="Xem nhanh sản phẩm"><span><i class="fas fa-expand-alt"></i></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">{{$product->product_name}}</a></h6>
                                    <i>Mã SP: {{$product->product_id}}</i>
                                    <div class="product__price">
                                        @if($product->product_quantity >= 1)
                                        <button type="button" class="btn-product add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart"><i class="fas fa-cart-plus"></i> | {{number_format($product->product_price,0,',','.').' đ'}}</button>
                                        @elseif($product->product_quantity <= 0)
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
		</div>
	</div>
</section>

<section class="categories">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-home">
                    <h4>TRANG TRẠI MÈO CẢNH</h4>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-12">
                        <div class="banner__slider owl-carousel" style="width:100%;height:600px;">
                            <div class="banner__item set-bg" data-setbg="{{asset('public/frontend/img/categories/meo1.jpg')}}" alt="Ảnh mèo"></div>
                            <div class="banner__item set-bg" data-setbg="{{asset('public/frontend/img/categories/meo2.jpg')}}" alt="Ảnh mèo"></div>
                            <div class="banner__item set-bg" data-setbg="{{asset('public/frontend/img/categories/meo3.jpg')}}" alt="Ảnh mèo"></div>
                            <div class="banner__item set-bg" data-setbg="{{asset('public/frontend/img/categories/meo4.jpg')}}" alt="Ảnh mèo"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!----------------------------------------------------- Thú cưng mới trang chủ ----------------------------------------------------->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="section-title">
                    <h4>Mèo cảnh mới</h4>
                    <a href="{{URL::to('/home-product-cat')}}"><button type="button" class="btn btn-warning"><i class="fas fa-eye"></i>&ensp;Xem thêm</button></a>
                </div>
            </div>
        </div>
        <div class="row property__gallery">
            @foreach($all_product_cat as $key => $product)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <form>
                        @csrf
                        <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_name}}" id="wishlist_productname{{$product->product_id}}" class="cart_product_name_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_price}}" id="wishlist_productprice{{$product->product_id}}" class="cart_product_price_{{$product->product_id}}" value="{{number_format($product->product_price,0,',','.')}} đ">
                        <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
                        <div class="product__item__pic set-bg">
                            <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" id="wishlist_productimage{{$product->product_id}}">
                            <ul class="product__hover">
                                <li><a id="wishlist_producturl{{$product->product_id}}" href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" title="Xem chi tiết sản phẩm"><span><i class="fas fa-eye"></i></span></a></li>
                                <li><a class="button_wishlist" id="{{$product->product_id}}" onclick="add_wistlist(this.id);"><span><i class="fas fa-heart"></i></span></a></li>
                                <li><a type="button" data-toggle="modal" data-target="#xemnhanh" class="xemnhanh" data-id_product="{{$product->product_id}}" title="Xem nhanh sản phẩm"><span><i class="fas fa-expand-alt"></i></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">{{$product->product_name}}</a></h6>
                            <i>Mã SP: {{$product->product_id}}</i>
                            <div class="product__price">
                                @if($product->product_quantity >= 1)
                                <button type="button" class="btn-product add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart"><i class="fas fa-cart-plus"></i> | {{number_format($product->product_price,0,',','.').' đ'}}</button>
                                @elseif($product->product_quantity <= 0)
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

<!-- Banner Section Begin -->
<section class="banner set-bg" data-setbg="{{asset('public/frontend/img/categories/category-pk.png')}}" style="height: 488px;">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 m-auto">
                <div class="banner__slider owl-carousel" style="padding:100px 0 0;">
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>PETHOUSE</span>
                            <h1>Phụ kiện <br> cho cún</h1>
                            <a href="#">Xem ngay</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>PETHOUSE</span>
                            <h1>Phụ kiện <br> cho mèo</h1>
                            <a href="#">Xem ngay</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>PETHOUSE</span>
                            <h1>Thức ăn -<br> Thuốc bổ</h1>
                            <a href="#">Xem ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!------------------------------------------------------- Phụ kiện mới trang chủ --------------------------------------------------------->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="section-title">
                    <h4>Phụ kiện mới</h4>
                    <a href="{{URL::to('/home-product')}}"><button type="button" class="btn btn-warning"><i class="fas fa-eye"></i>&ensp;Xem thêm</button></a>
                </div>
            </div>
        </div>
        <div class="row property__gallery">
            @foreach($all_accessory as $key => $product)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <form>
                        @csrf
                        <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_name}}" id="wishlist_productname{{$product->product_id}}" class="cart_product_name_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_price}}" id="wishlist_productprice{{$product->product_id}}" class="cart_product_price_{{$product->product_id}}" value="{{number_format($product->product_price,0,',','.')}} đ">
                        <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
                        <div class="product__item__pic set-bg">
                            <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" id="wishlist_productimage{{$product->product_id}}">
                            <ul class="product__hover">
                                <li><a id="wishlist_producturl{{$product->product_id}}" href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" title="Xem chi tiết sản phẩm"><span><i class="fas fa-eye"></i></span></a></li>
                                <li><a class="button_wishlist" id="{{$product->product_id}}" onclick="add_wistlist(this.id);"><span><i class="fas fa-heart"></i></span></a></li>
                                <li><a type="button" data-toggle="modal" data-target="#xemnhanh" class="xemnhanh" data-id_product="{{$product->product_id}}" title="Xem nhanh sản phẩm"><span><i class="fas fa-expand-alt"></i></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">{{$product->product_name}}</a></h6>
                            <i>Mã SP: {{$product->product_id}}</i>
                            <div class="product__price">
                                @if($product->product_quantity >= 1)
                                <button type="button" class="btn-product add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart"><i class="fas fa-cart-plus"></i> | {{number_format($product->product_price,0,',','.').' đ'}}</button>
                                @elseif($product->product_quantity <= 0)
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

<!-- Blog Start -->
<div class="blog">
    <div class="container">
        <div class="col-lg-4 col-md-4">
            <div class="section-title">
                <h4>Bài viết mới</h4>
            </div>
        </div>
        <div class="col-lg-8 col-md-8">

        </div>
        <div class="row">
            @foreach($all_posts as $key => $pos)
            <div class="col-md-6">
                <div class="blog-item">
                    <div class="blog-img"><a href="{{URL::to('/bai-viet/'.$pos->post_slug)}}">
                        <img src="{{URL::to('public/uploads/post/'.$pos->post_image)}}" alt="Blog">
                    </a></div>
                    <div class="blog-content">
                        <h2 class="blog-title">{{substr_replace($pos->post_title, "...", 47)}}</h2>
                        <div class="blog-meta">
                            <p><i class="far fa-user"></i>{{$pos->post_poster}}</p>
                            <p><i class="far fa-calendar-alt"></i>{{$pos->time}}</p>
                        </div>
                        <div class="blog-text">
                            <p>{!!substr_replace($pos->post_desc, "...", 355)!!}</p>
                            <a class="btn btn-warning" href="{{URL::to('/bai-viet/'.$pos->post_slug)}}">Đọc ngay</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Blog End -->

<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Thú cưng nổi bậc</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            @foreach($product_view_l as $key => $pvl)
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$pvl->product_id)}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{URL::to('public/uploads/product/'.$pvl->product_image)}}" style="width:100px;height:110px;">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$pvl->product_name}}</h6>
                                        <span>{{number_format($pvl->product_price,0,',','.').' đ'}}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div class="latest-prdouct__slider__item">
                            @foreach($product_view_n as $key => $pvn)
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$pvn->product_id)}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{URL::to('public/uploads/product/'.$pvn->product_image)}}" style="width:100px;height:110px;">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$pvn->product_name}}</h6>
                                        <span>{{number_format($pvn->product_price,0,',','.').' đ'}}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Phụ kiện nổi bậc</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            @foreach($accessory_view_l as $key => $avl)
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$avl->product_id)}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{URL::to('public/uploads/product/'.$avl->product_image)}}" style="width:100px;height:110px;">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$avl->product_name}}</h6>
                                        <span>{{number_format($avl->product_price,0,',','.').' đ'}}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div class="latest-prdouct__slider__item">
                            @foreach($accessory_view_n as $key => $avn)
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$avn->product_id)}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{URL::to('public/uploads/product/'.$avn->product_image)}}" style="width:100px;height:110px;">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$avn->product_name}}</h6>
                                        <span>{{number_format($avn->product_price,0,',','.').' đ'}}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Bài viết nổi bậc</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            @foreach($post_view_l as $key => $povl)
                                <a href="{{URL::to('/bai-viet/'.$povl->post_slug)}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{URL::to('public/uploads/post/'.$povl->post_image)}}" style="width:100px;height:110px;">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$povl->post_title}}</h6>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div class="latest-prdouct__slider__item">
                            @foreach($post_view_n as $key => $povn)
                                <a href="{{URL::to('/bai-viet/'.$povn->post_slug)}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{URL::to('public/uploads/post/'.$povn->post_image)}}" style="width:100px;height:110px;">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$povn->post_title}}</h6>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection