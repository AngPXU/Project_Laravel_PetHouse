<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Models\Customer;
use Carbon\Carbon;
use App\Models\Slider;
use App\Models\CatePost;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;
session_start();

class MailController extends Controller
{
    public function send_coupon(){
        $customer_vip = Customer::where('customer_vip', 1)->get();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_mail = "Max khuyến mãi ngày".' '.$now;
        $data = [];
        foreach ($customer_vip as $vip){
            $data['email'][] = $vip->customer_email;
        }
        Mail::send('pages.send_coupon', $data , function($message) use ($title_mail, $data){
            $message->to($data['email'])->subject($title_mail);
            $message->from($data['email'], $title_mail);
        });
        return redirect()->back()->with('message', 'Gửi mã khuyến mãi thành công');
    }

    public function mail_example(){
        return view('pages.send_coupon');
    }

    //------------------------------Gửi mail để lấy lại mật khẩu------------------------------//
    public function recover_pass(Request $request){
        $data = $request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title_mail = "Lấy lại mật khẩu tại PetHouse.com".' '.$now;
        $customer = Customer::where('customer_email', '=', $data['email_account'])->first();

        if($customer){
            $count_customer = $customer->count();
            if($count_customer == 0){
                return redirect()->back()->with('error', 'Mail này chưa được đăng ký để khôi phục mật khẩu');
            }else{
                $token_random = Str::random();
                $customer = Customer::find($customer->customer_id);
                $customer->customer_token = $token_random;
                $customer->save();
                $to_email = $data['email_account'];
                $link_reset_pass = url('/update-new-pass?email='.$to_email.'&token='.$token_random);
                $data = array("name"=>$title_mail,"body"=>$link_reset_pass,'email'=>$data['email_account']);
                Mail::send('pages.checkout.forget_pass_notify', ['data'=>$data], function($message) use ($title_mail, $data){
                    $message->to($data['email'])->subject($title_mail);
                    $message->from($data['email'], $title_mail);
                });
                return redirect()->back()->with('massage', 'Gửi mail thành công, vui lòng kiểm tra email để reset mật khẩu.');
            }
        }
    }

    public function update_new_pass(Request $request){
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
        return view('pages.checkout.new_pass')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('all_product',$all_product)->with('category_post',$category_post)->with('slider',$slider)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('all_posts',$all_posts)->with('share_image',$share_image);
    }

    public function reset_new_pass(Request $request){
        $data = $request->all();
        $token_random = Str::random();
        $customer = Customer::where('customer_email','=',$data['email'])->where('customer_token','=',$data['token'])->get();
        $count = $customer->count();
        if($count>0){
            foreach($customer as $key => $cus){
                $customer_id = $cus->customer_id;
            }
            $reset = Customer::find($customer_id);
            $reset->customer_password = md5($data['password_account']);
            $reset->customer_token = $token_random;
            $reset->save();
            return redirect('login-checkout')->with('success', 'Mật khẩu đã được cập nhật mới.');
        }else{
            return redirect('login-checkout')->with('error', 'Link qúa hạn, vui lòng nhập lại email.');
        }
    }
}
