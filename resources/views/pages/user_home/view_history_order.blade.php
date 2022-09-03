@extends('layout')
@section('content')

<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Trang chủ</a>
					<span>{{$meta_title}}</span>
				</div>
			</div>
		</div>
	</div>
</div>


<style>
    .container {
  margin-top: 50px;
  margin-bottom: 50px;
}
.card {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 1px solid rgba(0, 0, 0, 0.1);
  border-radius: 0.1rem;
}
.card-header:first-child {
  border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0;
}
.card-header {
  padding: 0.75rem 1.25rem;
  margin-bottom: 0;
  background-color: #fff;
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}
.track {
  position: relative;
  background-color: #ddd;
  height: 7px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  margin-bottom: 60px;
  margin-top: 50px;
}
.track .step {
  -webkit-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
  width: 25%;
  margin-top: -18px;
  text-align: center;
  position: relative;
}
.track .step.active:before {
  background: #ff5722;
}
.track .step::before {
  height: 7px;
  position: absolute;
  content: "";
  width: 100%;
  left: 0;
  top: 18px;
}
.track .step.active .icon {
  background: #ee5435;
  color: #fff;
}
.track .icon {
  display: inline-block;
  width: 40px;
  height: 40px;
  line-height: 40px;
  position: relative;
  border-radius: 100%;
  background: #ddd;
}
.track .step.active .text {
  font-weight: 400;
  color: #000;
}
.track .text {
  display: block;
  margin-top: 7px;
}
.itemside {
  position: relative;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  width: 100%;
}
.itemside .aside {
  position: relative;
  -ms-flex-negative: 0;
  flex-shrink: 0;
}
.img-sm {
  width: 80px;
  height: 80px;
  padding: 7px;
}
ul.row,
ul.row-sm {
  list-style: none;
  padding: 0;
}
.itemside .info {
  padding-left: 15px;
  padding-right: 7px;
}
.itemside .title {
  display: block;
  margin-bottom: 5px;
  color: #212529;
}
p {
  margin-top: 0;
  margin-bottom: 1rem;
}
.btn-warning {
  color: #ffffff;
  background-color: #ee5435;
  border-color: #ee5435;
  border-radius: 1px;
}
.btn-warning:hover {
  color: #ffffff;
  background-color: #ff2b00;
  border-color: #ff2b00;
  border-radius: 1px;
}
</style>

<div class="container">
    <article class="card">
        <header class="card-header"> 
            <span style="float:left;font-size:20px;font-weight:600;">Cảm ơn <span style="color:#fbaf32;">{{$customer->customer_name}}</span> đã đặt hàng</span>
            <span style="float:right;font-size:20px;font-weight:600;">Mã đơn hàng: #</span>
        </header>
        <div class="card-body">
            <article class="card">
                <div class="card-body row">

                    <table class="table">
                        <thead>
                          <tr>
                            <th>Tên người mua</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>{{$customer->customer_name}}</td>
                            <td>{{$customer->customer_email}}</td>
                            <td>{{$customer->customer_phone}}</td>
                          </tr>
                        </tbody>
                    </table>
                    <br>
                    <table class="table">
                        <thead>
                          <tr>
                            <th>Tên người vận chuyển</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Lời nhắn</th>
                            <th>Hình thức</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>{{$shipping->shipping_name}}</td>
                            <td>{{$shipping->shipping_address}}</td>
                            <td>{{$shipping->shipping_email}}</td>
                            <td>{{$shipping->shipping_phone}}</td>
                            <td>{{$shipping->shipping_notes}}</td>
                            <td>
                                @if($shipping->shipping_method == 0) Thanh toán ATM 
                                @elseif($shipping->shipping_method == 1) Tiền mặt
                                @elseif($shipping->shipping_method == 2) Đã thanh toán bằng PayPal
                                @endif
                            </td>
                          </tr>
                        </tbody>
                    </table>
                    <br>
                    <table class="table">
                        <thead>
                          <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>SL kho</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Mã giảm giá</th>
                            <th>Phí giao hàng</th>
                            <th>Tổng tiền</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                                $total = 0;
                            @endphp
                            @foreach($order_details as $key => $details)
                            @php
                                $i++;
                                $subtotal = $details->product_price*$details->product_sales_quantity;
                                $total += $subtotal;
                            @endphp
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$details->product_name}}</td>
                                <td>{{$details->product->product_quantity}}</td>
                                <td>
                                    {{$details->product_sales_quantity}}
                                    <input type="hidden" name="order_product_id" class="order_product_id" value="{{$details->product_id}}">
                                </td>
                                <td>{{number_format($details->product_price,0,',','.').' đ'}}</td>
                                <td>
                                    @if($details->product_coupon != 0) 
                                        {{$details->product_coupon}}
                                        @else
                                        Không có mã
                                    @endif
                                </td>
                                <td>{{number_format($details->product_feeship,0,',','.').' đ'}}</td>
                                <td>{{number_format($subtotal,0,',','.').' đ'}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <div class="col"> 
                        @php
                            $total_coupon = 0;
                        @endphp
                        @if($coupon_condition == 0)
                            @php
                            $total_after_coupon = ($total - $coupon_number)/100;
                            echo '<strong><i class="fas fa-code"></i> Mã giảm:</strong>'.'<br>'.number_format($total_after_coupon,0,',','.').' đ<br>';
                            $total_coupon = $total - $total_after_coupon + $details->product_feeship;
                            @endphp
                        @else
                            @php
                            echo '<strong><i class="fas fa-code"></i> Mã giảm</strong>'.'<br>'.number_format($coupon_number,0,',','.').' đ<br>';
                            $total_coupon = $total - $coupon_number + $details->product_feeship;
                            @endphp
                        @endif
                    </div>
                    <div class="col"> <strong><i class="fas fa-shipping-fast"></i> Phí giao hàng:</strong> <br> {{number_format($details->product_feeship,0,',','.').' đ'}} </div>
                    <div class="col"> <strong><i class="fas fa-dollar-sign"></i> Tổng tiền:</strong> <br> {{number_format($total_coupon,0,',','.').' đ'}} </div>
                </div>
            </article>

            <div class="track">
                @if($order_status == 1)
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Đặt hàng thành công</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fas fa-spinner"></i> </span> <span class="text"> Đang chờ xử lý</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Đã xử lý - Đang giao hàng </span> </div>
                    <div class="step "> <span class="icon"> <i class="fas fa-home"></i> </span> <span class="text">Đã giao hàng</span> </div>
                @elseif($order_status == 2)
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Đặt hàng thành công</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fas fa-spinner"></i> </span> <span class="text"> Đang chờ xử lý</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Đã xử lý - Đang giao hàng </span> </div>
                    <div class="step active"> <span class="icon"> <i class="fas fa-home"></i> </span> <span class="text">Đã giao hàng</span> </div>
                @else
                    <div class="step"> <span class="icon"> <i class="fas fa-ban"></i> </span> <span class="text">Đã hủy đơn</span> </div>
                @endif
            </div>

            <hr>
            <a href="{{URL::to('/home-user/')}}" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Quay lại</a>
            <a href="{{URL::to('/print-order/'.$details->order_code)}}" target="_blank" class="btn btn-warning" data-abc="true"> <i class="fas fa-print"></i> In đơn hàng</a>
        </div>
    </article>
</div>

@endsection