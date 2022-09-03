<!DOCTYPE html>
<html lang="en">
<head>
  <title>Xác nhận đơn hàng</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    * {
  box-sizing: border-box;
}
.column {
  float: left;
  width: 100%;
  padding: 10px;
  height: auto;
}
h2{
  font-size: 22px;
  font-weight: 600;
}
h2 span{
  color: #fbaf32;
}
p{
  font-size: 16px;
}
.column1 {
  float: left;
  width: 35%;
  padding: 10px;
  height: auto;
}
.column1 span{
  color: #fbaf32;
}
.column2 {
  float: left;
  width: 65%;
  padding: 10px;
  height: auto;
}
.column2 span{
  color: #fbaf32;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: center;
  padding: 16px;
  font-size: 16px;
}

th:first-child, td:first-child {
  text-align: left;
}

tr:nth-child(even) {
  background-color: #f2f2f2
}
  </style>


</head>
<body>

<div class="container" style="border: 2px solid #000000; padding: 10px;background: #ffffff; ">
    <div class="jumbotron text-center" style="background: #ffffff;margin-bottom: -60px;">
      <h1 style="color:#fbab32;font-size:40px;font-weight:600;">CỬA HÀNG THÚ CƯNG PETHOUSE</h1>
      <p style="font-weight: 600;font-size: 25px;">SHOP ĐANG TIẾN HÀNH GIAO HÀNG</p>
      <hr style="size: 2px;">
    </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="column">
        <h2>Chào bạn <span>{{$shipping_array['customer_name']}}</span></h2>
        <p>Chúng tôi vừa xác nhận đơn đặt hàng của bạn tại cửa hàng thú cưng PetHouse. Chúng tôi hiện đang tiến hành đóng gói và giao hàng.</p>
      </div>
      <div class="column1">
        <h2>THÔNG TIN ĐƠN HÀNG</h2>
        <p><b>Mã đơn hàng:</b>&ensp;&nbsp;<span>{{$code['order_code']}}</span></p>
        <p><b>Mã khuyến mãi:</b>&ensp;&nbsp;<span></span></p>
        {{-- {{$code['order_coupon']}} --}}
        <p><b>Dịch vụ:</b>&ensp;&nbsp;<span>ĐẶT HÀNG TRỰC TUYẾN</span></p>
        <p><b>Hình thức thanh toán:</b>&ensp;&nbsp;<span>
            @if($shipping_array['shipping_method'] == 0)
                Thanh toán ATM
            @else
                Tiền mặt
            @endif
            </span></p>
        <p><b>Phí giao hàng:</b>&ensp;&nbsp;<span>{{$shipping_array['fee']}}</span></p>
      </div>
      <div class="column2">
        <h2>THÔNG TIN NGƯỜI NHẬN</h2>
        <p><b>Họ và tên:</b>&ensp;&nbsp;<span>
            @if($shipping_array['shipping_name'] == '')
                KHÔNG CÓ
            @else
                {{$shipping_array['shipping_name']}}
            @endif
          </span></p>
        <p><b>Email:</b>&ensp;&nbsp;<span>
            @if($shipping_array['shipping_email'] == '')
                KHÔNG CÓ
            @else
                {{$shipping_array['shipping_email']}}
            @endif
            </span></p>
        <p><b>Số điện thoại:</b>&ensp;&nbsp;<span>
            @if($shipping_array['shipping_phone'] == '')
                KHÔNG CÓ
            @else
                {{$shipping_array['shipping_phone']}}
            @endif
            </span></p>
        <p><b>Địa chỉ nhận hàng:</b>&ensp;&nbsp;<span>
            @if($shipping_array['shipping_address'] == '')
                KHÔNG CÓ
            @else
                {{$shipping_array['shipping_address']}}
            @endif
            </span></p>
        <p><b>Ghi chú đơn hàng:</b>&ensp;&nbsp;<span>
            @if($shipping_array['shipping_notes'] == '')
                KHÔNG CÓ
            @else
                {{$shipping_array['shipping_notes']}}
            @endif
            </span></p>
      </div>
      <h2>SẢN PHẨM ĐÃ ĐẶT</h2>
      <table>
        <tr>
          <th>Sản phẩm</th>
          <th>Giá tiền</th>
          <th>Số lượng</th>
          <th>Thành tiền</th>
        </tr>
        @php
        $sub_total = 0;
        $total = 0;
        @endphp
        @foreach($cart_array as $cart)
        @php
        $sub_total = $cart['product_qty']*$cart['product_price'];
        $total += $sub_total;
        @endphp
        <tr>
          <td>{{$cart['product_name']}}</td>
          <td>{{$cart['product_price']}}</td>
          <td>{{$cart['product_qty']}}</td>
          <td>{{$sub_total}}</td>
        </tr>
        @endforeach
        <tr>
          <td colspan="4" style="font-weight:600;font-size:18px;text-align:center;">Tổng thanh toán: {{$total}}</td>
        </tr>
      </table>
      <hr>
      <p style="margin-top: 30px;font-weight: 600;"><span style="color:#fbaf32">*</span> Đơn hàng của bạn sẽ tự động được duyệt trong vòng 30 phút. Nếu thông tin có gì sai sót xin liên hệ với chúng tôi tại website <a target="_blank" href="https//adpethouse.com/"><span style="color:#fbaf32">adpethouse.com</span></a> hoặc số điện thoại <span style="color:#fbaf32">0334301474</span>. Xin trâng trọng cảm ơn</p>
    </div>
  </div>
</div>

</body>
</html>
