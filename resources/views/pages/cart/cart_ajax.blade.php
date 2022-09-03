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

<section class="shop-cart spad">
    <div class="container">
        <form action="{{url('/update-cart')}}" method="post">
            @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__cart__table">
                    @if(session()->has('massage'))
                        <div class="alert alert-success">
                            {{session()->get('massage')}}
                        </div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-danger">
                                {{session()->get('error')}}
                            </div>
                    @endif
                    
                    <table>
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(Session::get('cart') == true)
                            @php
                                $total = 0;
                            @endphp
                            @foreach(Session::get('cart') as $key =>$cart)
                            @php
                                $subtotal = $cart['product_price'] * $cart['product_qty'];
                                $total += $subtotal;
                            @endphp
                            <tr>
                                <td class="cart__product__item">
                                    <img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" alt="{{$cart['product_name']}}">
                                    <div class="cart__product__item__title">
                                        <h6>{{$cart['product_name']}}</h6>
                                        <div class="rating">
                                            <i>Mã SP: {{$cart['product_id']}}</i>
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">{{number_format($cart['product_price'],0,',','.').' đ'}}</td>
                                <td class="cart__quantity">
                                    <div class="pro-qty">
                                        <input type="number" name="cart_qty[{{$cart['session_id']}}]" min="1" class="cart_quantity" value="{{$cart['product_qty']}}" style="border:1px solid #e4e4e4;border-radius:10px;">
                                    </div>
                                </td>
                                <td class="cart__total">{{number_format($subtotal,0,',','.').' đ'}}</td>
                                <td class="cart__close">
                                    <a href="{{url('/del-product/'.$cart['session_id'])}}"><span><i class="fas fa-trash"></i></span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn">
                    <a href="{{URL::to('/')}}"><i class="fas fa-shopping-cart"></i> Tiếp tục mua hàng</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="cart__btn update__btn">
                    <button type="submit" name="update_qty" class="primary-btn-cart"><i class="fas fa-spinner"></i> Cập nhật</button>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="cart__btn update__btn">
                    <a href="{{url('/del-all-product')}}"><i class="fas fa-ban"></i> Xóa tất cả</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">

            </div>
            <div class="col-lg-4 offset-lg-2">
                <div class="cart__total__procced">
                    <h6>Tổng thanh toán</h6>
                    <hr>
                    <ul>
                        <li>Tổng tiền: <span>{{number_format($total,0,',','.').' đ'}}</span></li>
                        <li>
                            @if(Session::get('coupon'))
                                @foreach(Session::get('coupon') as $key =>$cou)
                                    @if($cou['coupon_condition']==0)
                                        Mã giảm: {{$cou['coupon_number']}} %
                                        <p>
                                            @php
                                                $total_coupon = ($subtotal * $cou['coupon_number'])/100;
                                                echo '<li>Tổng giảm:<span>'.number_format($total_coupon,0,',','.').' đ</span></li>';

                                            @endphp
                                        </p>
                                        <li>Tổng thanh toán: <span>{{number_format($subtotal - $total_coupon,0,',','.')}} đ</span></li>
                                    @elseif($cou['coupon_condition']==1)
                                        Mã giảm: {{number_format($cou['coupon_number'],0,',','.')}} đ
                                        <p>
                                            @php
                                                $total_coupon = $subtotal - $cou['coupon_number'];
                                            @endphp
                                        </p>
                                        <li>Tổng thanh toán: <span>{{number_format($total_coupon,0,',','.')}} đ</span></li>
                                    @endif
                                @endforeach
                            @endif
                        </li>
                    </ul>
                    <?php
                        $customer_id = Session::get('customer_id');
                        if($customer_id != NULL){	
                    ?>
                        <a href="{{ URL::to('/checkout')}}" class="primary-btn">Thanh toán</a>
                    <?php
                        }else{
                    ?>
                        <a href="{{ URL::to('/login-checkout')}}" class="primary-btn">Thanh toán</a>
                    <?php
                        }
                    ?>
                </div>
            </div>
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
        </form>
    </div>
</section>

@endsection