@extends('layout')
@section('content')

<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="section-title">
                    <h4>Tag tìm kiếm: "{{$product_tag}}"</h4>
                </div>
            </div>
        </div>
        <div class="row property__gallery">
            @foreach($pro_tag as $key => $product)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <form>
                        @csrf
                        <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
                        <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
                        <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
                        <div class="product__item__pic set-bg" data-setbg="{{URL::to('public/uploads/product/'.$product->product_image)}}">
                            <ul class="product__hover">
                                <li><a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" title="Xem chi tiết sản phẩm"><span><i class="fas fa-eye"></i></span></a></li>
                                <li><a class="button_wishlist" id="{{$product->product_id}}" onclick="add_wishlist(this.id);" title="Thêm vào yêu thích"><span><i class="fas fa-heart"></i></span></a></li>
                                <li><a type="button" data-toggle="modal" data-target="#xemnhanh" class="xemnhanh" data-id_product="{{$product->product_id}}" title="Xem nhanh sản phẩm"><span><i class="fas fa-expand-alt"></i></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">{{$product->product_name}}</a></h6>
                            <i>Mã SP: {{$product->product_id}}</i>
                            <div class="product__price">
                                <button type="button" class="btn-product add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart"><i class="fas fa-cart-plus"></i> | {{number_format($product->product_price,0,',','.').' đ'}}</button>
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
                <span id="product_quickview_gallery"></span>
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



@endsection