<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Models\CatePost;
use Illuminate\Support\Facades\Redirect;
use App\Models\Coupon;
use Carbon\Carbon;
session_start();

class CartController extends Controller
{
    public function show_cart_menu(){
        $cart = count(Session::get('cart'));
        $output = '';
        if($cart>0){
            $output.= '
                <a href="'.url('/gio-hang').'" title="Hiện có '.$cart.' sản phẩm trong giỏ hàng"><i class="fa fa-shopping-bag"></i> <span>'.$cart.'</span></a>
            ';
        }else{
            $output.= '
            <a href="'.url('/gio-hang').'" title="Hiện có 0 sản phẩm trong giỏ hàng"><i class="fa fa-shopping-bag"></i> <span>0</span></a>
            ';
        }
        echo $output;
    }

    public function check_coupon(Request $request){
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $data = $request->all();
        if(Session::get('customer_id')){
            $coupon = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status', 1)->where('coupon_date_end','>=',$today)
            ->where('coupon_used','LIKE','%'.Session::get('customer_id').'%')->first();
            if($coupon){
                return Redirect()->back()->with('error','Mã giảm giá đã được sử dụng');
            }else{
                $coupon_login = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status', 1)->where('coupon_date_end','>=',$today)->first();
                if($coupon_login){
                    $count_coupon = $coupon_login->count();
                    if($count_coupon>0){
                        $coupon_session = Session::get('coupon');
                        if($coupon_session==true){
                            $is_avaiable = 0;
                            if($is_avaiable==0){
                                $cou[] = array(
                                    'coupon_code' => $coupon_login->coupon_code,
                                    'coupon_condition' => $coupon_login->coupon_condition,
                                    'coupon_number' => $coupon_login->coupon_number,
                                );
                                Session::put('coupon',$cou);
                            }
                        }else{
                            $cou[] = array(
                                'coupon_code' => $coupon_login->coupon_code,
                                'coupon_condition' => $coupon_login->coupon_condition,
                                'coupon_number' => $coupon_login->coupon_number,
                            );
                            Session::put('coupon',$cou);
                        }
                        Session::save();
                        return Redirect()->back()->with('message','Thêm mã giảm giá thành công');
                    }
                }else{
                    return Redirect()->back()->with('error','Mã giảm giá không đúng hoặc đã hết hạn');
                }
            }
        }else{
            $coupon = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status', 1)->where('coupon_date_end','>=',$today)->first();
            if($coupon){
                $count_coupon = $coupon->count();
                if($count_coupon>0){
                    $coupon_session = Session::get('coupon');
                    if($coupon_session==true){
                        $is_avaiable = 0;
                        if($is_avaiable==0){
                            $cou[] = array(
                                'coupon_code' => $coupon->coupon_code,
                                'coupon_condition' => $coupon->coupon_condition,
                                'coupon_number' => $coupon->coupon_number,
                            );
                            Session::put('coupon',$cou);
                        }
                    }else{
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,
                        );
                        Session::put('coupon',$cou);
                    }
                    Session::save();
                    return Redirect()->back()->with('message','Thêm mã giảm giá thành công');
                }
            }else{
                return Redirect()->back()->with('error','Mã giảm giá không đúng hoặc đã hết hạn');
            }
        }
    }


    //--------------------------------------------------------CART AJAX---------------------------------------------------------
    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart == true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id'] == $data['cart_product_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_price'],
                );
                Session::put('cart', $cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
            );
            Session::put('cart', $cart);
        }
        Session::save();
    }

    public function gio_hang(Request $request){
        //--------SEO---------
        $meta_desc = "Giỏ hàng";
        $meta_keywords = "Giỏ hàng";
        $meta_title = "Giỏ hàng";
        $url_canonical = $request->url();
        $share_image = url('public/frontend/img/sharefb.png');
        //--------SEO---------
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        return view('pages.cart.cart_ajax')->with('category',$cate_product)->with('brand',$brand_product)->with('category_post',$category_post)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('share_image',$share_image);
    }

    public function update_cart(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart == true){
            foreach($data['cart_qty'] as $key => $qty){
                foreach($cart as $session => $val){
                    if($val['session_id'] == $key){
                        $cart[$session]['product_qty'] = $qty;
                    }
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('massage','Cập nhật sản phẩm thành công');   
        }else{
            return redirect()->back()->with('massage','Cập nhật sản phẩm thất bại');
        }
    }

    public function del_product($session_id){
        $cart = Session::get('cart');
        if($cart == true){
            foreach($cart as $key => $val){
                if($val['session_id'] == $session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('massage','Xóa sản phẩm thành công');
        }else{
            return redirect()->back()->with('massage','Xóa sản phẩm thất bại');
        }
    }
    
    public function del_all_product(){
        $cart = Session::get('cart');
        if($cart == true){
            Session::forget('coupon');
            Session::forget('fee');
            Session::forget('cart');
            Session::forget('success_paypal');
            Session::forget('total_paypal');
            return redirect()->back()->with('massage','Xóa tất cả sản phẩm thành công');
        }
    }

    public function unset_coupon(){
        $coupon = Session::get('coupon');
        if($coupon == true){
            Session::forget('coupon');
            return redirect()->back()->with('massage','Xóa mã thành công');
        }
    }
}