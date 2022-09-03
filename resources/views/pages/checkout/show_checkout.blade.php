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

<section class="checkout spad">
    <div class="container">
        
        <form class="checkout__form" novalidate="">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <h5>Tính phí vận chuyển</h5>
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <div class="checkout__form__input">
                                <p><i class="fas fa-city"></i>&ensp;Chọn thành phố</p>
                                <select class="form-control choose city" name="city" id="city" required="">
                                    <option>----------Chọn thành phố----------</option>
                                    @foreach($city as $key => $ci)
                                    <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <div class="checkout__form__input">
                                <p><i class="fas fa-building"></i>&ensp;Chọn quận huyện</p>
                                <select class="form-control province choose" name="province" id="province" required="">
                                    <option>----------Chọn quận huyện----------</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <div class="checkout__form__input">
                                <p><i class="fas fa-university"></i>&ensp;Chọn xã phường</p>
                                <select class="form-control wards" name="wards" id="wards" required="">
                                    <option>----------Chọn xã phường----------</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="primary-btn-cart calculate_delivery" name="calculate_order"><i class="fas fa-truck"></i> Tính phí vận chuyển</button>
                <p style="float: right;">Lưu ý: <i class="fas fa-shipping-fast"></i>
                    Phí giao hàng mặt định sẽ là 100.000 đ<br>
                </p>
            </div>
        </form>
    </div>
</section>



<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6 class="coupon__link">
                    <form action="{{URL::to('/check-coupon')}}" method="post" class="form-inline">
                        {{ csrf_field() }}
                        <div class="form-group mx-sm-3 mb-2">
                            Bạn có mã giảm giá! <i class="fas fa-code"></i> 
                            <label for="magiamgia" class="sr-only">Password</label>
                            <input type="text" name="coupon" placeholder="Nhập mã giảm giá.." class="form-control" style="text-align:center;background:#f5f5f5;border-bottom:2px solid #fbaf32;border-top:1px;border-left:1px;border-right:1px;">
                        </div>
                        <button type="submit" name="check_coupon" class="btn btn-warning mb-2 check_coupon">Áp dụng</button>
                    </form>
                    @if(Session::get('coupon'))
                        <a href="{{url('/unset-coupon')}}"><span class="icon_loading"></span>Xóa mã giảm</a>
                    @endif
                </h6>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <form class="checkout__form">
                    @csrf
                    <h5>Thông tin thanh toán</h5>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p><i class="fas fa-user"></i>&ensp;Họ và tên <span>*</span></p>
                                <input type="text" name="shipping_email" class="shipping_email" placeholder="Tên bạn là.." required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p><i class="fas fa-phone-alt"></i>&ensp;Số điện thoại <span>*</span></p>
                                <input type="text" name="shipping_phone" class="shipping_phone" placeholder="Nhập số điện thoại.." required>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <div class="checkout__form__input">
                                <p><i class="fas fa-envelope"></i>&ensp;Email <span>*</span></p>
                                <input type="text" name="shipping_name" class="shipping_name" placeholder="Nhập địa chỉ email.." required>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <div class="checkout__form__input">
                                <p><i class="fas fa-map-marker-alt"></i>&ensp;Địa chỉ <span>*</span></p>
                                <input type="text" name="shipping_address" class="shipping_address" placeholder="Nhập địa chỉ giao hàng.." required>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <div class="checkout__form__input">
                                <p><i class="fas fa-comment-alt"></i>&ensp;Lời nhắn <span>*</span></p>
                                <input type="text" name="shipping_notes" class="shipping_notes" placeholder="Lời nhắn.." required>
                            </div>
                        </div>
                        @if(Session::get('fee'))
                            <input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
                        @else
                            <input type="hidden" name="order_fee" class="order_fee" value="100000">
                        @endif
                        @if(Session::get('coupon'))
                            @foreach(Session::get('coupon') as $key => $cou)
                            <input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
                            @endforeach
                        @else
                            <input type="hidden" name="order_coupon" class="order_coupon" value="0">
                        @endif
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <div class="checkout__form__input">
                                <p><i class="fas fa-dollar-sign"></i>&ensp;Hình thức thanh toán <span>*</span></p>
                                @if(!Session::get('success_paypal')==true)
                                <select class="form-control payment_select" name="payment_select" required>
                                    <option value="1">Tiền mặt</option>
                                </select>
                                @else
                                <select class="form-control payment_select" name="payment_select" required readonly>
                                    <option value="2">Đã thanh toán bằng PayPal</option>
                                </select>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" name="send_order" class="primary-btn-cart send_order"><i class="fas fa-check-circle"></i>&ensp;Xác nhận thanh toán</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <form action="{{url('/update-cart')}}" method="post">
                    @csrf
                    <div class="checkout__order">
                            <h5>Đơn hàng của bạn</h5>
                            <div class="checkout__order__product">
                                <ul>
                                    <li>
                                        <span class="top__text">Sản phẩm</span>
                                        <span class="top__text__right">Tổng</span>
                                    </li>
                                    @if(Session::get('cart') == true)
                                    @php
                                        $total = 0;
                                        $i = 0;
                                    @endphp
                                    @foreach(Session::get('cart') as $key =>$cart)
                                    @php
                                        $subtotal = $cart['product_price'] * $cart['product_qty'];
                                        $total += $subtotal;
                                        $i++;
                                    @endphp
                                    <li>0{{$i}} - {{$cart['product_name']}} <span>{{number_format($cart['product_price'],0,',','.').' đ'}}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="checkout__order__total">
                                <ul>
                                    <li>Tổng tiền: <span>{{number_format($total,0,',','.').' đ'}}</span></li>
                                    @if(Session::get('fee'))
                                    <li>
                                        Phí giao hàng: <span>{{number_format(Session::get('fee'),0,',','.').' đ'}}</span>
                                        <a href="{{url('/del-fee/')}}"><span><i class="fas fa-trash"></i></span></a>
                                        @php $total_after_fee = $total + Session::get('fee'); @endphp
                                    </li>
                                    <li>Tổng thanh toán: 
                                        <span>
                                            @php
                                                if(Session::get('fee') && !Session::get('coupon')){
                                                    $total_after = $total_after_fee;
                                                    echo number_format($total_after,0,',','.').' đ';
                                                }elseif(Session::get('fee') && Session::get('coupon')){
                                                    $total_after = $total_after_fee;
                                                    echo number_format($total_after,0,',','.').' đ';
                                                }
                                            @endphp
                                        </span>
                                    </li>
                                    @endif
                                    <li>
                                        @if(Session::get('coupon'))
                                            @foreach(Session::get('coupon') as $key =>$cou)
                                                @if($cou['coupon_condition']==0)
                                                    <li>Mã giảm: {{$cou['coupon_number']}} % tổng:
                                                        <span>
                                                            @php
                                                                $total_coupon = ($total - $cou['coupon_number'])/100;
                                                                echo number_format($total_coupon,0,',','.').' đ';
                                                            @endphp
                                                        </span>
                                                    </li>
                                                    @php
                                                        $total_after_coupon = $total - $total_coupon;
                                                    @endphp
                                                    <li>Tổng thanh toán: 
                                                        <span>
                                                            @php
                                                                if(Session::get('fee') && !Session::get('coupon')){
                                                                    $total_after = $total_after_fee;
                                                                    echo number_format($total_after,0,',','.').' đ';
                                                                }elseif(!Session::get('fee') && Session::get('coupon')){
                                                                    $total_after = $total_after_coupon;
                                                                    echo number_format($total_after,0,',','.').' đ';
                                                                }elseif(Session::get('fee') && Session::get('coupon')){
                                                                    $total_after = $total_after_coupon;
                                                                    $total_after = $total_after + Session::get('fee');
                                                                    echo number_format($total_after,0,',','.').' đ';
                                                                }elseif(!Session::get('fee') && !Session::get('coupon')){
                                                                    $total_after = $total;
                                                                    echo number_format($total_after,0,',','.').' đ';
                                                                }   
                                                            @endphp
                                                        </span>
                                                    </li>
                                                @elseif($cou['coupon_condition']==1)
                                                    <li>Mã giảm: <span>{{number_format($cou['coupon_number'],0,',','.')}} đ</span></li>
                                                    <p>
                                                        @php
                                                            $total_coupon = $total - $cou['coupon_number'];
                                                        @endphp
                                                    </p>
                                                    @php
                                                        $total_after_coupon = $total_coupon;
                                                    @endphp
                                                    <li>Tổng thanh toán: 
                                                        <span>
                                                            @php
                                                                if(Session::get('fee') && !Session::get('coupon')){
                                                                    $total_after = $total_after_fee;
                                                                    echo number_format($total_after,0,',','.').' đ';
                                                                }elseif(!Session::get('fee') && Session::get('coupon')){
                                                                    $total_after = $total_after_coupon;
                                                                    echo number_format($total_after,0,',','.').' đ';
                                                                }elseif(Session::get('fee') && Session::get('coupon')){
                                                                    $total_after = $total_after_coupon;
                                                                    $total_after = $total_after + Session::get('fee');
                                                                    echo number_format($total_after,0,',','.').' đ';
                                                                }elseif(!Session::get('fee') && !Session::get('coupon')){
                                                                    $total_after = $total;
                                                                    echo number_format($total_after,0,',','.').' đ';
                                                                }   
                                                            @endphp
                                                        </span>
                                                    </li>
                                                @endif
                                                
                                                    @php
                                                        $vnd_to_usd = $total_after/23457;
                                                        $total_paypal = round($vnd_to_usd, 2);
                                                        \Session::put('total_paypal', $total_paypal);
                                                    @endphp
                                                    
                                                
                                            @endforeach
                                            
                                        @endif
                                    </li>
                                </ul>
                            </div>
                            <div class="checkout__order__widget">
                                <p>Đơn hàng sẽ được xử lý và Pethouse sẽ liên hệ lại với bạn trong vòng 1 giờ kể từ khi đặt hàng.</p>
                                @if(!Session::get('success_paypal')==true)
                                    <p>Hoặc thanh toán bằng</p>
                                    <a class="btn btn-primary m-3" href="{{route('processTransaction')}}"><i class="fab fa-paypal"></i>&ensp;Paypal</a>
                                                    
                                @else
                                                        
                                @endif
                            </div>
                        @else
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                @php
                                    echo '<h3 style="color:#fbaf32;text-align:center;font-weight:bold;padding:50px;">Chưa có sản phẩm trong giỏ hàng</h3>';
                                @endphp
                            </div>
                        </div>
                        @endif
                    </div>
                </form>
                    <form action="{{URL('/vnpay-payment')}}" method="post">
                        @csrf
                        <input type="hidden" name="total_vnpay" value="13000000">
                        <button type="submit" class="btn btn-primary m-3" name="redirect"><i class="fab fa-paypal"></i>&ensp;VNPay</button>
                    </form>
            </div>
        </div>
    </div>
</section>


    

@endsection