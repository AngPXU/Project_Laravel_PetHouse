<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\Models\CatePost;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;
use App\Models\Customer;
use App\Models\Statistic;
use Carbon\Carbon;
use Illuminate\Support\Facades\pdf;
use Illuminate\Support\Facades\Redirect;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

session_start();

class OrderController extends Controller
{
    public function manage_order(){
        $order = Order::orderby('created_at', 'DESC')->get();
        return view('admin.order.manage_order')->with(compact('order'));
    }

    public function view_order($order_code){
        $order_details = OrderDetails::with('product')->where('order_code', $order_code)->get();
        $order = Order::where('order_code', $order_code)->get();
        foreach($order as $key => $ord){
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
            $order_status = $ord->order_status;
        }
        $customer = Customer::where('customer_id', $customer_id)->first();
        $shipping = Shipping::where('shipping_id', $shipping_id)->first();
        $order_details_product = OrderDetails::with('product')->where('order_code', $order_code)->get();
        foreach($order_details_product as $key => $order_d){
            $product_coupon = $order_d->product_coupon;
        }
        if($product_coupon != 0){
            $coupon = Coupon::where('coupon_code', $product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
        }else{
            $coupon_condition = 1;
            $coupon_number = 0;
        }
        return view('admin.order.view_order')->with(compact('order_details','customer','shipping','order_details_product','coupon_condition',
        'coupon_number','order','order_status'));
    }

    public function print_order($checkout_code){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));
        return $pdf->stream();
    }

    public function print_order_convert($checkout_code){
        $order_details = OrderDetails::with('product')->where('order_code', $checkout_code)->get();
        $order = Order::where('order_code', $checkout_code)->get();
        foreach($order as $key => $ord){
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
        }
        $customer = Customer::where('customer_id', $customer_id)->first();
        $shipping = Shipping::where('shipping_id', $shipping_id)->first();
        $order_details_product = OrderDetails::with('product')->where('order_code', $checkout_code)->get();
        foreach($order_details_product as $key => $order_d){
            $product_coupon = $order_d->product_coupon;
        }
        if($product_coupon != 0){
            $coupon = Coupon::where('coupon_code', $product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
            if($coupon_condition == 0){
                $coupon_echo = $coupon_number.'%';
            }else{
                $coupon_echo = number_format($coupon_number,0,',','.').' đ';
            }
        }else{
            $coupon_condition = 1;
            $coupon_number = 0;
            $coupon_echo = '0';
        }
        $output = '';
        $output.='
            <style>body{font-family: DejaVu Sans;}</style>
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 style="text-align:center;color:#fbaf32;font-size:25px;margin-top:10px;">CỬA HÀNG THÚ CƯNG PETHOUSE</h4>
                        <hr>
                        <h6 style="text-align:center;color:#fbaf32;font-size:18px;margin-top:10px;">HÓA ĐƠN MUA HÀNG</h6>
                    </div>
                    <div class="card-body">
                    <p>Người mua hàng</p>
                    <table class="table" style="border: 1px solid #000;padding:10px;border-radius:10px;">
                      <thead style="border-bottom: 1px solid #000;">
                        <tr>
                          <th style="width:14em;">Tên người đặt</th>
                          <th style="width:14em;">Số điện thoại</th>
                          <th style="width:14em;">Email</th>
                        </tr>
                      </thead>
                      <tbody>
        '; 
                    $output.='
                        <tr>
                          <td>'.$customer->customer_name.'</td>
                          <td>'.$customer->customer_phone.'</td>
                          <td>'.$customer->customer_email.'</td>
                        </tr>
                    ';
        $output.='
                      </tbody>
                    </table>


                    <p>Giao hàng</p>
                    <table class="table" style="border: 1px solid #000;padding:10px;border-radius:10px;">
                      <thead style="border-bottom: 1px solid #000;">
                        <tr>
                          <th>Tên người nhận</th>
                          <th>Địa chỉ</th>
                          <th>Số điện thoại</th>
                          <th>Email</th>
                          <th>Ghi chú</th>
                        </tr>
                      </thead>
                      <tbody>
        '; 
                    $output.='
                        <tr>
                          <td>'.$shipping->shipping_name.'</td>
                          <td>'.$shipping->shipping_address.'</td>
                          <td>'.$shipping->shipping_phone.'</td>
                          <td>'.$shipping->shipping_email.'</td>
                          <td>'.$shipping->shipping_notes.'</td> 
                        </tr>
                    ';
        $output.='
                      </tbody>
                    </table>
                    

                    <p>Đơn đặt hàng</p>
                    <table class="table" style="border: 1px solid #000;padding:10px;border-radius:10px;">
                      <thead style="border-bottom: 1px solid #000;">
                        <tr>
                          <th>Tên sản phẩm</th>
                          <th>Số lượng</th>
                          <th>Giá</th>
                          <th>Mã giảm giá</th>
                          <th>Phí giao hàng</th>
                          <th>Tổng tiền</th>
                        </tr>
                      </thead>
                      <tbody>
        '; 
                    $total = 0;
                    
                    foreach($order_details_product as $key => $product){
                        $subtotal = $product->product_price*$product->product_sales_quantity;
                        $total+=$subtotal;
                        $feeship = $total - $product->product_feeship;
                        if($product->product_coupon != 0){
                            $product_coupon = $product->product_coupon;
                        }else{
                            $product_coupon = 'Không có mã';
                        }
                    $output.='
                        <tr>
                          <td>'.$product->product_name.'</td>
                          <td>'.$product->product_sales_quantity.'</td>
                          <td>'.number_format($product->product_price,0,',','.').' đ'.'</td>
                          <td>'.$product_coupon.'</td>
                          <td>'.number_format($product->product_feeship,0,',','.').' đ'.'</td>
                          <td>'.number_format($subtotal,0,',','.').' đ'.'</td>
                        </tr>
                    ';
                    }
                    if($coupon_condition == 0){
                        $total_after_coupon = ($total * $coupon_number)/100;
                        $total_coupon = $total - $total_after_coupon;
                    }else{
                        $total_coupon = $total - $coupon_number;
                    }
                    $output.='
                        <tr>
                            <td colspan="2">
                            <p>Tổng giảm: '.$coupon_echo.'</p>
                            <p>Phí ship: '.number_format($product->product_feeship,0,',','.').' đ'.'</p>
                            <p>Thanh toán: '.number_format($total_coupon + $product->product_feeship,0,',','.').' đ'.'</p>
                            </td>
                        </tr>
                    ';
        $output.='
                      </tbody>
                    </table>

                    <p>Ký nhận</p>
                    <table class="table" style="padding:10px;border-radius:10px;">
                      <thead>
                        <tr>
                          <th style="width:21em;">PETHOUSE</th>
                          <th style="width:21em;">KHÁCH HÀNG</th>
                        </tr>
                      </thead>
                      <tbody>
        '; 
                    $output.='
                        <tr>
                          <td style="width:21em;text-align:center;"></td>
                          <td style="width:21em;text-align:center;"></td>
                        </tr>
                    ';
        $output.='
                      </tbody>
                    </table>
                    </div>
                </div>
            </div>
        ';
        return $output;
    }

    public function update_order_qty(Request $request){
        $data = $request->all();
        $order = Order::find($data['order_id']);
        $order->order_status = $data['order_status'];
        $order->save();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_mail = "Đơn đặt hàng đã được xác nhận".' '.$now;
        $customer = Customer::where('customer_id', $order->customer_id)->first();
        $data['email'][] = $customer->customer_email;

        foreach($data['order_product_id'] as $key => $product){
            $product_mail = Product::find($product);
            foreach($data['quantity'] as $key2 => $qty){
                if($key == $key2){
                    $cart_array[] = array(
                        'product_name' => $product_mail['product_name'],
                        'product_price' => $product_mail['product_price'],
                        'product_qty' => $qty
                    );
                }
            }
        }

        $details = OrderDetails::where('order_code', $order->order_code)->first();
        $fee_ship = $details->product_feeship;
        $coupon_mail = $details->product_coupon;
        $shipping = Shipping::where('shipping_id', $order->shipping_id)->first();
        $shipping_array = array(
            'fee_ship' => $fee_ship,
            'customer_name' => $customer->customer_name,
            'shipping_name' => $shipping->shipping_name,
            'shipping_email' => $shipping->shipping_email,
            'shipping_phone' => $shipping->shipping_phone,
            'shipping_address' => $shipping->shipping_address,
            'shipping_notes' => $shipping->shipping_notes,
            'shipping_method' => $shipping->shipping_method
        );

        $ordercode_mail = array(
            'coupon_code' => $coupon_mail,
            'order_code' => $details->order_code
        );

        Mail::send('pages.checkout.confirm_order', ['cart_array'=>$cart_array,'shipping_array'=>$shipping_array,'code'=>$ordercode_mail], function($message) use ($title_mail, $data){
            $message->to($data['email'])->subject($title_mail);
            $message->from($data['email'], $title_mail);
        });

        $order_date = $order->order_date;
        $statistic = Statistic::where('order_date', $order_date)->get();
        if($statistic){
            $statistic_count = $statistic->count();
        }else{
            $statistic_count = 0;
        }

        if($order->order_status == 2){
            $total_order = 0;
            $sales = 0;
            $profit = 0;
            $quantity = 0;
            foreach($data['order_product_id'] as $key => $product_id){
                $product = Product::find($product_id);
                $product_quantity = $product->product_quantity;
                $product_sold = $product->product_sold;
                $product_price = $product->product_price;
                $product_cost = $product->price_cost;
                $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
                foreach($data['quantity'] as $key2 => $qty){
                    if($key == $key2){
                        $pro_remain = $product_quantity - $qty;
                        $product->product_quantity = $pro_remain;
                        $product->product_sold = $product_sold + $qty;
                        $product->save();

                        $quantity += $qty;
                        $total_order += 1;
                        $sales += $product_price * $qty;
                        $profit = $sales - ($product_cost * $qty);
                    }
                }
            }
            if($statistic_count > 0){
                $statistic_update = Statistic::where('order_date', $order_date)->first();
                $statistic_update->sales = $statistic_update->sales + $sales;
                $statistic_update->profit = $statistic_update->profit + $profit;
                $statistic_update->quantity = $statistic_update->quantity + $quantity;
                $statistic_update->total_order = $statistic_update->total_order + $total_order;
                $statistic_update->save();
            }else{
                $statistic_new = new Statistic();
                $statistic_new->order_date = $order_date;
                $statistic_new->sales = $sales;
                $statistic_new->profit = $profit;
                $statistic_new->quantity = $quantity;
                $statistic_new->total_order = $total_order;
                $statistic_new->save();
            }
        }elseif($order->order_status != 2 && $order->order_status != 3){
            $total_order = 0;
            $sales = 0;
            $profit = 0;
            $quantity = 0;
            foreach($data['order_product_id'] as $key => $product_id){
                $product = Product::find($product_id);
                $product_quantity = $product->product_quantity;
                $product_sold = $product->product_sold;
                $product_price = $product->product_price;
                $product_cost = $product->price_cost;
                $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
                foreach($data['quantity'] as $key2 => $qty){
                    if($key == $key2){
                        $pro_remain = $product_quantity + $qty;
                        $product->product_quantity = $pro_remain;
                        $product->product_sold = $product_sold - $qty;
                        $product->save();

                        $quantity += $qty;
                        $total_order += 1;
                        $sales += $product_price * $qty;
                        $profit = $sales - ($product_cost * $qty);
                    }
                }
            }
            if($statistic_count > 0){
                $statistic_update = Statistic::where('order_date', $order_date)->first();
                $statistic_update->sales = $statistic_update->sales + $sales;
                $statistic_update->profit = $statistic_update->profit + $profit;
                $statistic_update->quantity = $statistic_update->quantity + $quantity;
                $statistic_update->total_order = $statistic_update->total_order + $total_order;
                $statistic_update->save();
            }else{
                $statistic_new = new Statistic();
                $statistic_new->order_date = $order_date;
                $statistic_new->sales = $sales;
                $statistic_new->profit = $profit;
                $statistic_new->quantity = $quantity;
                $statistic_new->total_order = $total_order;
                $statistic_new->save();
            }
        }
    }

    public function update_qty(Request $request){
        $data = $request->all();
        $order_details = OrderDetails::where('product_id', $data['order_product_id'])->where('order_code', $data['order_code'])->first();
        $order_details->product_sales_quantity = $data['order_qty'];
        $order_details->save();
    }
}
