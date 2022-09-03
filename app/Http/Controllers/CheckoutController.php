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
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;
use App\Models\Slider;
use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
    
    public function login_checkout(Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        //--------SEO---------
        $meta_desc = "Đăng nhập để thanh toán"; 
        $meta_keywords = "Thú cưng, Phụ kiện thú cưng";
        $meta_title = "Đăng nhập để thanh toán";
        $url_canonical = $request->url();
        $share_image = url('public/frontend/img/sharefb.png');
        //--------SEO---------
        return view('pages.checkout.login_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('category_post',$category_post)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('share_image',$share_image)
        ->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }

    public function register_checkout(Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        //--------SEO---------
        $meta_desc = "Đăng ký để mua hàng"; 
        $meta_keywords = "Đăng ký để mua hàng";
        $meta_title = "Đăng ký để mua hàng";
        $url_canonical = $request->url();
        $share_image = url('public/frontend/img/sharefb.png');
        //--------SEO---------
        return view('pages.checkout.register_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('category_post',$category_post)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('share_image',$share_image)
        ->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
    }

    public function add_customert(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = DB::table('tbl_customers')->insertGetId($data);
        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);
        return Redirect::to('/checkout');
    }

    public function checkout(Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        $city = City::orderby('matp','asc')->get();
        //--------SEO---------
        $meta_desc = "Thông tin thanh toán"; 
        $meta_keywords = "Thú cưng, Phụ kiện thú cưng";
        $meta_title = "Thông tin thanh toán";
        $url_canonical = $request->url();
        $share_image = url('public/frontend/img/sharefb.png');
        //--------SEO---------
        return view('pages.checkout.show_checkout')->with('category',$cate_product)->with('brand',$brand_product)->with('category_post',$category_post)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('city',$city)
        ->with('share_image',$share_image);
    }

    public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_notes'] = $request->shipping_notes;
        $data['shipping_address'] = $request->shipping_address;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id', $shipping_id);
        return Redirect::to('/payment');
    }

    public function payment(Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        //--------SEO---------
        $meta_desc = "Xem lại giỏ hàng"; 
        $meta_keywords = "Thú cưng, Phụ kiện thú cưng";
        $meta_title = "Xem lại giỏ hàng";
        $url_canonical = $request->url();
        $share_image = url('public/frontend/img/sharefb.png');
        //--------SEO---------
        return view('pages.checkout.payment')->with('category',$cate_product)->with('brand',$brand_product)->with('category_post',$category_post)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('share_image',$share_image);
    }

    public function logout_checkout(){
        Session::forget('customer_id');
        Session::forget('coupon');
        return Redirect::to('/login-checkout');
    }

    public function login_customert(Request $request){
        $email = $request->email_account;
        $password = md5($request->password_account) ;
        $result = DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();
        if(Session::get('coupon')==true){
            Session::forget('coupon');
        }
        if($result){
            Session::put('customer_id', $result->customer_id);
            Session::put('customer_name', $result->customer_name);
            return Redirect::to('/gio-hang');
        }else{
            Session::put('error-login', 'Tài khoản hoặc mật khẩu không đúng.');
            return Redirect::to('/login-checkout');
        }
        Session::save();
    }

    public function forgot_pass(Request $request){
        //------------------------SEO-------------------------
        $meta_desc = "Lấy lại mật khẩu"; //Dòng mô tả phía dưới tiêu đề Website trên web 
        $meta_keywords = "Lấy lại mật khẩu";
        $meta_title = "Lấy lại mật khẩu";
        $url_canonical = $request->url();
        $share_image = url('public/frontend/img/sharefb.png');
        //------------------------SEO--------------------------
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(4)->get();
        $slider = Slider::orderby('slider_id','desc')->get();
        $all_posts = DB::table('tbl_posts')->where('post_status','1')->orderby('post_id','desc')->limit(2)->get();
        return view('pages.checkout.forgot_password')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('all_product',$all_product)->with('category_post',$category_post)->with('slider',$slider)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('all_posts',$all_posts)->with('share_image',$share_image);
    }

    public function order_place(Request $request){
        //--------SEO---------
        $meta_desc = "Cảm ơn bạn đã thanh toán"; 
        $meta_keywords = "Thú cưng, Phụ kiện thú cưng";
        $meta_title = "Cảm ơn bạn đã thanh toán";
        $url_canonical = $request->url();
        $share_image = url('public/frontend/img/sharefb.png');
        //--------SEO---------
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        $content = Cart::content();
        foreach ($content as $v_content) {
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sales_quantity'] = $v_content->qty;
            DB::table('tbl_order_details')->insert($order_d_data);
        }
        if($data['payment_method']==1){
            echo 'Thanh toan bang ATM';
        }elseif($data['payment_method']==2){
            Cart::destroy();
            $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
            $category_post = CatePost::orderby('cate_post_id','desc')->get();
            return view('pages.checkout.handcash')->with('category',$cate_product)->with('brand',$brand_product)->with('category_post',$category_post)
            ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
            ->with('share_image',$share_image);
        }else{
            echo 'Thanh toan bang the gi no';
        }
        return Redirect::to('/payment');
    }

    public function manage_order(){
        $all_order = DB::table('tbl_order')->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->select('tbl_order.*','tbl_customers.customer_name')
        ->orderby('tbl_order.order_id','desc')->get();
        $manager_order = view('admin.order.manage_order')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.order.manage_order',$manager_order);
    }

    public function view_order($orderId){
        $order_by_id = DB::table('tbl_order')
        ->join('tbl_customers','tbl_order.customer_id','=','tbl_customers.customer_id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->select('tbl_order.*','tbl_customers.*','tbl_shipping.*','tbl_order_details.*')->first();
        $manager_order_by_id = view('admin.order.view_order')->with('order_by_id',$order_by_id);
        return view('admin_layout')->with('admin.order.view_order',$manager_order_by_id);
    }

    public function select_delivery_home(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action'] == "city"){
                $select_province = Province::where('matp', $data['ma_id'])->orderby('maqh', 'asc')->get();
                $output.='<option>--- Chọn quận huyện ---</option>';
                foreach($select_province as $key => $province){
                $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
                }
            }else{
                $select_wards = Wards::where('maqh', $data['ma_id'])->orderby('xaid', 'asc')->get();
                $output.='<option>--- Chọn xã phường ---</option>';
                foreach($select_wards as $key => $ward){
                $output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
                }
            }
        }
        echo $output;
    }

    public function calculate_fee(Request $request){
        $data = $request->all();
        if($data['matp']){
            $feeship = Feeship::where('fee_matp', $data['matp'])->where('fee_maqh', $data['maqh'])->where('fee_xaid', $data['xaid'])->get();
            if($feeship){
                $count_feeship = $feeship->count();
                if($count_feeship>0){
                    foreach($feeship as $key => $fee){
                        Session::put('fee', $fee->fee_feeship);
                        Session::save();
                    }
                }else{
                    Session::put('fee', 100000);
                    Session::save();
                }
            }
        }
    }

    public function del_fee(){
        Session::forget('fee');
        return Redirect()->back();
    }

    public function confirm_order(Request $request){
        $data = $request->all();

        // if($data['order_coupon'] != 'no'){
        //     $coupon = Coupon::where('coupon_code', $data['order_coupon'])->first();
        //     $coupon->coupon_used = $coupon->coupon_used.','.Session::get('customer_id');
        //     $coupon->coupon_time = $coupon->coupon_time - 1;
        //     $coupon_mail = $coupon->coupon_code;
        //     $coupon->save();
        // }else{
        //     $coupon_mail = 'Không có mã';
        // }

        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_notes = $data['shipping_notes'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
        $shipping_id = $shipping->shipping_id;

        $checkout_code = substr(md5(microtime()),rand(0,26),5);
        $order = new Order;
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        $order->order_code = $checkout_code;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $order->created_at = $today;
        $order->order_date = $order_date;
        $order->save();

        if(Session::get('cart')){
            foreach(Session::get('cart') as $key => $cart){
                $order_details = new OrderDetails;
                $order_details->order_code = $checkout_code;
                $order_details->product_id = $cart['product_id'];
                $order_details->product_name = $cart['product_name'];
                $order_details->product_price = $cart['product_price'];
                $order_details->product_sales_quantity = $cart['product_qty'];
                $order_details->product_coupon = $data['order_coupon'];
                $order_details->product_feeship = $data['order_fee'];
                $order_details->save();
            }
        }

        //Gửi mail xác nhận đặt hàng
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $title_mail = "Xác nhận đơn hàng ngày".' '.$now;
        $customer = Customer::find(Session::get('customer_id'));
        $data['email'][] = $customer->customer_email;
        if(Session::get('cart') == true){
            foreach(Session::get('cart') as $key => $cart_mail){
                $cart_array[] = array(
                    'product_name' => $cart_mail['product_name'],
                    'product_price' => $cart_mail['product_price'],
                    'product_qty' => $cart_mail['product_qty']
                );
            }
        }
        if(Session::get('fee') == true){
            $fee = Session::get('fee').'đ';
        }else{
            $fee = '100.000000 đ';
        }
        $shipping_array = array(
            'fee' => $fee,
            'customer_name' => $customer->customer_name,
            'shipping_name' => $data['shipping_name'],
            'shipping_email' => $data['shipping_email'],
            'shipping_phone' => $data['shipping_phone'],
            'shipping_address' => $data['shipping_address'],
            'shipping_notes' => $data['shipping_notes'],
            'shipping_method' => $data['shipping_method']
        );
        $ordercode_mail = array(
            // 'coupon_code' => $coupon_mail,
            'order_code' => $checkout_code
        );
        Mail::send('pages.checkout.mail_order', ['cart_array'=>$cart_array,'shipping_array'=>$shipping_array,'code'=>$ordercode_mail], function($message) use ($title_mail, $data){
            $message->to($data['email'])->subject($title_mail);
            $message->from($data['email'], $title_mail);
        });
        Session::forget('coupon');
        Session::forget('fee');
        Session::forget('cart');
        Session::forget('success_paypal');
        Session::forget('total_paypal');
    }

    public function vnpay_payment(Request $request){
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = $request->all();
        $code_cart = rand(0000,99999);
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://pethouse.com/pethouse/checkout";
        $vnp_TmnCode = "4T02K1CW";//Mã website tại VNPAY 
        $vnp_HashSecret = "EHTLBQZFIHSIITNRGREFTURLTRUBJBEC"; //Chuỗi bí mật

        $vnp_TxnRef = $code_cart; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán đơn hàng VNPay';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $data['total_vnpay'] * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = '';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        //Add Params of 2.0.1 Version
        
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
            // vui lòng tham khảo thêm tại code demo
    }
}
