<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial
}

* {
  box-sizing: border-box;
}

/* The browser window */
.container {
  border: 3px solid #f1f1f1;
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
}

/* Container for columns and the top "toolbar" */
.row {
  padding: 10px;
  background: #f1f1f1;
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
}

/* Create three unequal columns that floats next to each other */
.column {
  float: left;
}

.left {
  width: 15%;
}

.right {
  width: 10%;
}

.middle {
  width: 75%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Three dots */
.dot {
  margin-top: 4px;
  height: 17px;
  width: 17px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
}

/* Style the input field */
input[type=text] {
  width: 100%;
  border-radius: 3px;
  border: none;
  font-size: 18px;
  background-color: white;
  margin-top: -8px;
  height: 35px;
  color: #666;
  padding: 5px;
}

/* Three bars (hamburger menu) */
.bar {
  width: 25px;
  height: 5px;
  background-color: #aaa;
  margin: 3px 0;
  display: block;
}

/* Page content */
.content {
  padding: 10px;
}

.column-row {
  float: left;
  width: 50%;
  padding: 10px;
  height: 310px; /* Should be removed. Only for demonstration */
}

.column-row img {
  width: 100%;
  height: 300px;
}
.coupon {
  width: 100%;
  border-radius: 15px;
  margin: 0 auto;
}

.promo {
  background: #ccc;
  padding: 7px;
  color: red;
}

.expire {
  color: red;
}

.coupon span {
  color:#fbaf32;
}

.coupon h2 {
  text-align: center;
  font-weight: 600;
  color: #fbaf32;
  font-size: 30px;
}
.coupon h3 {
  text-align: center;
  font-size: 20px;
}
</style>
</head>
<body>

<div class="container" style="margin-left: 100px;margin-right: 100px;">
  <div class="row">
    <div class="column left">
      <span class="dot" style="background:#ED594A;"></span>
      <span class="dot" style="background:#FDD800;"></span>
      <span class="dot" style="background:#5AC05A;"></span>
    </div>
    <div class="column middle">
      <input type="text" value="http://www.pethouse.com" style="width: 100%;border-radius: 3px;border: none;font-size: 15px;background-color: white;margin-top: -8px;height: 28px;color: #666;padding: 5px;">
    </div>
    <div class="column right">
      <div style="float:right">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <h2 style="text-align:center;font-size:30px;font-weight:600;color:#fbaf32;">CỬA HÀNG THÚ CƯNG PETHOUSE</h2>
      <h2 style="text-align:center;font-size:23px;font-weight:600;">ĐƠN XÁC NHẬN ĐẶT HÀNG</h2>
      <hr style="width:60%;text-align:center;">
    </div>
    <div class="col-md-12">
      <p style="font-size:20px;padding:20px;">Chào bạn <span style="color:#fbaf32;padding-right:10px;">{{$shipping_array['customer_name']}}</span>.Chúng tôi vừa nhận được đơn đặt hàng của bạn tại cửa hàng thú cưng PetHouse với các thông tin hóa đơn mua hàng của bạn như sau... </p>
    </div>
    <div class="column-row" style="padding-left:50px;">
        <h3>THÔNG TIN ĐƠN HÀNG</h3>
        <p><b>Mã đơn hàng:</b>&emsp;{{$code['order_code']}}</p>
        <p><b>Mã khuyến mãi:</b>&emsp;
            {{-- @if($code['order_coupon'] == '')
                KHÔNG CÓ
            @else
                {{$code['order_coupon']}}
            @endif --}}
        </p>
        <p><b>Dịch vụ:</b>&emsp;ĐẶT HÀNG TRỰC TUYẾN</p>
        <p><b>Hình thức thanh toán:</b>&emsp;
            @if($shipping_array['shipping_method'] == 0)
                Thanh toán ATM
            @else
                Tiền mặt
            @endif
        </p>
        <p><b>Phí giao hàng:</b>&emsp;
            @if($shipping_array['fee'] == '')
                KHÔNG CÓ
            @else
                {{$shipping_array['fee']}}
            @endif
        </p>
    </div>
    <div class="column-row" style="padding-right:50px;">
        <h3>THÔNG TIN NGƯỜI NHẬN</h3>
        <p><b>Họ và tên:</b>&emsp;
                           @if($shipping_array['shipping_name'] == '')
                               KHÔNG CÓ
                           @else
                               {{$shipping_array['shipping_name']}}
                           @endif
                        </p>
                        <p><b>Email:</b>&emsp;
                           @if($shipping_array['shipping_email'] == '')
                               KHÔNG CÓ
                           @else
                               {{$shipping_array['shipping_email']}}
                           @endif
                        </p>
                        <p><b>Số điện thoại:</b>&emsp;
                           @if($shipping_array['shipping_phone'] == '')
                               KHÔNG CÓ
                           @else
                               {{$shipping_array['shipping_phone']}}
                           @endif
                        </p>
                        <p><b>Địa chỉ nhận hàng:</b>&emsp;
                           @if($shipping_array['shipping_address'] == '')
                               KHÔNG CÓ
                           @else
                               {{$shipping_array['shipping_address']}}
                           @endif
                        </p>
                        <p><b>Ghi chú đơn hàng:</b>&emsp;
                           @if($shipping_array['shipping_notes'] == '')
                               KHÔNG CÓ
                           @else
                               {{$shipping_array['shipping_notes']}}
                           @endif
                        </p>
    </div>
    <div class="col-md-12">
        <h3 style="padding-left:50px;">SẢN PHẨM ĐÃ ĐẶT</h3>
        <table style="padding-left:50px;padding-right:50px;width: 100%;" border="1px" cellspacing="0">
            <thead>
                <tr style="width:100%;">
                    <th style="width:10%;padding:8px;">STT</th>
                    <th style="width:30%;padding:8px;">Sản phẩm</th>
                    <th style="width:20%;padding:8px;">Giá tiền</th>
                    <th style="width:20%;padding:8px;">Số lượng</th>
                    <th style="width:20%;padding:8px;">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                    $sub_total = 0;
                    $total = 0;
                @endphp
                @foreach($cart_array as $cart)
                @php
                    $i++;
                    $sub_total = $cart['product_qty']*$cart['product_price'];
                    $total += $sub_total;
                @endphp
                <tr>
                    <td style="width:10%;text-align:center;padding:20px;">{{$i}}</td>
                    <td style="width:30%;text-align:center;padding:20px;">{{$cart['product_name']}}</td>
                    <td style="width:20%;text-align:center;padding:20px;">{{number_format($cart['product_price'],0,',','.').' đ'}}</td>
                    <td style="width:20%;text-align:center;padding:20px;">{{$cart['product_qty']}}</td>
                    <td style="width:20%;text-align:center;padding:20px;">{{number_format($sub_total,0,',','.').' đ'}}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="5" style="text-align:center;padding:10px;font-weight:bold;">Tổng thanh toán: &emsp;{{number_format($total,0,',','.').' đ'}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-12">
      <p style="font-size:20px;padding:20px;">Đơn hàng của bạn sẽ tự động được duyệt trong vòng <span style="color:#fbaf32;">30 phút</span>. Nếu thông tin có gì sai sót xin liên hệ với chúng tôi tại website <span style="color:#fbaf32;">pethouse.com</span> hoặc số điện thoại <span style="color:#fbaf32;">0334301474</span>. Xin trâng trọng cảm ơn</p>
    </div>
  </div>
</div>

</body>
</html> 
