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

<section class="shop-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__cart__table">
                    <?php
                        $message = Session::get('message');
                        if($message){
                            echo $message;
                            Session::put('message',null);
                        }
                    ?>
                    <?php
                        $content = Cart::content();
                    ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($content as $v_content)
                            <tr>
                                <td class="cart__product__item">
                                    <img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" alt="Ảnh lỗi">
                                    <div class="cart__product__item__title">
                                        <h6>{{$v_content->name}}</h6>
                                    </div>
                                </td>
                                <td class="cart__price">{{number_format($v_content->price,0,'.','.').' đ'}}</td>
                                <td class="cart__quantity">
                                    <div class="pro-qty">
                                        <form action="{{URL::to('/update-cart-quantity')}}" method="post">
                                            {{ csrf_field() }}
                                            <input type="number" name="cart_quantity" value="{{$v_content->qty}}">
                                            <input value="{{$v_content->rowId}}" type="hidden" name="rowId_cart"/>
                                            <input type="hidden" name="rowId_cart" value="{{$v_content->rowId}}"/>
                                        </form>
                                    </div>
                                </td>
                                <td class="cart__total"><?php $subtotal = $v_content->price * $v_content->qty;
                                    echo number_format($subtotal,0,'.','.').' đ'; ?>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6"></div>
            <div class="col-lg-4 offset-lg-2">
                <div class="checkout__order">
                    <h5>Chọn hình thức thanh toán</h5>
                    <form action="{{URL::to('/order-place')}}" method="post">
                        {{ csrf_field() }}
                        <div class="checkout__order__widget">
                                <label for="o-acc">
                                    Thanh toán bằng tài khoản ngân hàng (Bảo trì)
                                    <input type="checkbox" id="o-acc" name="payment_option" value="1">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="check-payment">
                                    Thanh toán bằng tiền mặt
                                    <input type="checkbox" id="check-payment" name="payment_option" value="2">
                                    <span class="checkmark"></span>
                                </label>
                                <label for="paypal">
                                    Thanh toán bằng ví MoMo (Bảo trì)
                                    <input type="checkbox" id="paypal" name="payment_option" value="3">
                                    <span class="checkmark"></span>
                                </label>
                        </div>
                        <button type="submit" name="send_order_place" class="site-btn">Mua hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection