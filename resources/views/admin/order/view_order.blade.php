@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Chi tiết đơn hàng</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item"><a href="{{URL::to('/manage-order')}}">Đơn hàng</a></div>
            <div class="breadcrumb-item">Chi tiết đơn hàng</div>
        </div>
    </div>

    {{-- <div class="section-body">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Thông tin người mua</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Tên người mua</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                </tr>
                                <tr>
                                    <td>{{$customer->customer_name}}</td>
                                    <td>{{$customer->customer_email}}</td>
                                    <td>{{$customer->customer_phone}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Thông tin vận chuyển</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Tên người vận chuyển</th>
                                    <th>Địa chỉ</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Lời nhắn</th>
                                    <th>Hình thức</th>
                                </tr>
                                <tr>
                                    <td>{{$shipping->shipping_name}}</td>
                                    <td>{{$shipping->shipping_address}}</td>
                                    <td>{{$shipping->shipping_email}}</td>
                                    <td>{{$shipping->shipping_phone}}</td>
                                    <td>{{$shipping->shipping_notes}}</td>
                                    <td>
                                        @if($shipping->shipping_method == 0) Thanh toán ATM @else Tiền mặt @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Thông tin sản phẩm</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
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
                                        <input type="number" min="1" name="product_sales_quantity" value="{{$details->product_sales_quantity}}">
                                        <input type="hidden" name="order_product_id" class="order_product_id" value="{{$details->product_id}}">
                                        <button class="btn btn-default" name="update_quantity">Cập nhật</button>
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
                                <tr>
                                    <td colspan="6"><strong> 
                                        @php
                                            $total_coupon = 0;
                                        @endphp
                                        @if($coupon_condition == 0)
                                            @php
                                            $total_after_coupon = ($total * $coupon_number)/100;
                                            echo 'Mã giảm: '.number_format($total_after_coupon,0,',','.').' đ<br>';
                                            $total_coupon = $total - $total_after_coupon + $details->product_feeship;
                                            @endphp
                                        @else
                                            @php
                                            echo 'Mã giảm: '.number_format($coupon_number,0,',','.').' đ<br>';
                                            $total_coupon = $total - $coupon_number + $details->product_feeship;
                                            @endphp
                                        @endif
                                        Phí giao hàng: {{number_format($details->product_feeship,0,',','.').' đ'}}<br>
                                        Tổng tiền: {{number_format($total_coupon,0,',','.').' đ'}}
                                    </strong></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="card-header-action">
                        @foreach ($order as $key => $or)
                        @if($or->order_status == 1)
                        <form>
                        @csrf
                        <div class="form-group col-md-12">
                            <label for="inputState">Tình trạng đơn hàng</label>
                            <select class="form-control order_details" name="accessory_product_status" required="">
                                <option id="{{$or->order_id}}" value="1" selected> Chưa xử lý </option>
                                <option id="{{$or->order_id}}" value="2"> Đã xử lý </option>
                            </select>
                            <div class="invalid-feedback">Vui lòng chọn tình trạng </div>
                        </div>
                        </form>
                        @else
                        <form>
                            @csrf
                            <div class="form-group col-md-12">
                                <label for="inputState">Tình trạng đơn hàng</label>
                                <select class="form-control order_details" name="accessory_product_status" required="">
                                    <option id="{{$or->order_id}}" value="1"> Chưa xử lý </option>
                                    <option id="{{$or->order_id}}" value="2" selected> Đã xử lý </option>
                                </select>
                                <div class="invalid-feedback">Vui lòng chọn tình trạng đặt hàngs</div>
                            </div>
                        </form>
                        @endif
                        @endforeach
                    </div>
                    <br>
                    <div class="card-body-action">
                        <a href="{{URL::to('/print-order/'.$details->order_code)}}" class="btn btn-icon icon-left btn-primary" target="_blank">
                            <i class="fas fa-print"></i>&nbsp;In đơn hàng
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div> --}}




    <div class="section-body">
        <div class="invoice">
          <div class="invoice-print">
            <div class="row">
              <div class="col-lg-12">
                <div class="invoice-title">
                  <h2>Đơn hàng của {{$customer->customer_name}}</h2>
                  <div class="invoice-number">Mã đơn hàng #</div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-6">
                    <address>
                      <strong class="section-title">Thông tin người mua</strong><br>
                      <i class="fas fa-user"></i>&ensp;{{$customer->customer_name}}<br>
                      <i class="fas fa-envelope"></i>&ensp;{{$customer->customer_email}}<br>
                      <i class="fas fa-phone"></i>&ensp;{{$customer->customer_phone}}<br>
                    </address>
                  </div>
                  <div class="col-md-6 text-md-right">
                    <address>
                      <strong class="section-title">Thông tin vận chuyển</strong><br>
                      <i class="fas fa-user"></i>&ensp;{{$shipping->shipping_name}}<br>
                      <i class="fas fa-map-marker-alt"></i>&ensp;{{$shipping->shipping_address}}<br>
                      <i class="fas fa-envelope"></i>&ensp;{{$shipping->shipping_email}}<br>
                      <i class="fas fa-phone"></i>&ensp;{{$shipping->shipping_phone}}<br>
                      <i class="fas fa-comment"></i>&ensp;{{$shipping->shipping_notes}}<br>
                    </address>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row mt-4">
              <div class="col-md-12">
                <div class="section-title">Thông tin sản phẩm</div>
                <div class="table-responsive">
                  <table class="table table-striped table-hover table-md">
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
                    <tr class="color_qty_{{$details->product_id}}">
                        <td>{{$i}}</td>
                        <td>{{$details->product_name}}</td>
                        <td>{{$details->product->product_quantity}}</td>
                        <td>
                            <input type="number" min="1" class="order_qty_{{$details->product_id}}" name="product_sales_quantity" value="{{$details->product_sales_quantity}}" {{$order_status == 2 ? 'disabled' : ''}} style="text-align:center;">
                            <input type="hidden" name="order_product_id" class="order_product_id" value="{{$details->product_id}}">
                            <input type="hidden" name="order_code" class="order_code" value="{{$details->order_code}}">
                            <input type="hidden" name="order_qty_storage" class="order_qty_storage_{{$details->product_id}}" value="{{$details->product->product_quantity}}">
                            @if($order_status != 2)
                            <button class="btn btn-default update_quantity_order" name="update_quantity_order" data-product_id="{{$details->product_id}}">Cập nhật</button>
                            @endif
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

                  </table>
                </div>
                <div class="row mt-4">
                  <div class="col-lg-8">
                    <div class="section-title">Hình thức thanh toán</div>
                    <p class="section-lead">@if($shipping->shipping_method == 0) Thanh toán ATM 
                                            @elseif($shipping->shipping_method == 1) Tiền mặt
                                            @elseif($shipping->shipping_method == 2) Đã thanh toán bằng PayPal
                                            @endif</p>
                  </div>
                  <div class="col-lg-4 text-right">
                    <div class="invoice-detail-item">
                        <div class="invoice-detail-name">Mã giảm giá</div>
                        <div class="invoice-detail-value">
                            @php
                                $total_coupon = 0;
                            @endphp
                            @if($coupon_condition == 0)
                                @php
                                $total_after_coupon = ($total + $coupon_number)/100;
                                echo ''.number_format($total_after_coupon,0,',','.').' đ<br>';
                                $total_coupon = $total - $total_after_coupon + $details->product_feeship;
                                @endphp
                            @else
                                @php
                                echo ''.number_format($coupon_number,0,',','.').' đ<br>';
                                $total_coupon = $total - $coupon_number + $details->product_feeship;
                                @endphp
                            @endif
                        </div>
                      </div>
                    <div class="invoice-detail-item">
                      <div class="invoice-detail-name">Phí giao hàng</div>
                      <div class="invoice-detail-value">{{number_format($details->product_feeship,0,',','.').' đ'}}</div>
                    </div>
                    <hr class="mt-2 mb-2">
                    <div class="invoice-detail-item">
                      <div class="invoice-detail-name">Tổng tiền</div>
                      <div class="invoice-detail-value invoice-detail-value-lg">{{number_format($total_coupon,0,',','.').' đ'}}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <hr>
            <div class="text-md-right">
                <div class="float-lg-left mb-lg-0 mb-3">
                    @foreach ($order as $key => $or)
                        @if($or->order_status == 1)
                            <form>
                            @csrf
                            <div class="form-group col-md-12">
                                <label for="inputState">Tình trạng đơn hàng</label>
                                <select class="form-control order_details" name="accessory_product_status" required="">
                                    <option value=""> ----- Chọn ------ </option>
                                    <option id="{{$or->order_id}}" value="1" selected> Chưa xử lý </option>
                                    <option id="{{$or->order_id}}" value="2"> Đã xử lý </option>
                                    <option id="{{$or->order_id}}" value="3"> Huỷ đơn hàng </option>
                                </select>
                                <div class="invalid-feedback">Vui lòng chọn tình trạng đặt hàng</div>
                            </div>
                            </form>
                            @elseif($or->order_status == 2)
                            <form>
                                @csrf
                                <div class="form-group col-md-12">
                                    <label for="inputState">Tình trạng đơn hàng</label>
                                    <select class="form-control order_details" name="accessory_product_status" required="">
                                        <option value=""> ----- Chọn ------ </option>
                                        <option id="{{$or->order_id}}" value="1"> Chưa xử lý </option>
                                        <option id="{{$or->order_id}}" value="2" selected> Đã xử lý </option>
                                        <option id="{{$or->order_id}}" value="3"> Huỷ đơn hàng </option>    
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn tình trạng đặt hàng</div>
                                </div>
                            </form>
                            @else
                            <form>
                                @csrf
                                <div class="form-group col-md-12">
                                    <label for="inputState">Tình trạng đơn hàng</label>
                                    <select class="form-control order_details" name="accessory_product_status" required="">
                                        <option value=""> ----- Chọn ------ </option>
                                        <option id="{{$or->order_id}}" value="1"> Chưa xử lý </option>
                                        <option id="{{$or->order_id}}" value="2"> Đã xử lý </option>
                                        <option id="{{$or->order_id}}" value="3" selected> Huỷ đơn hàng </option>    
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn tình trạng đặt hàng</div>
                                </div>
                            </form>
                        @endif
                    @endforeach
                </div>
                <a href="{{URL::to('/print-order/'.$details->order_code)}}" target="_blank">
                    <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i>&nbsp;In đơn hàng</button>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection