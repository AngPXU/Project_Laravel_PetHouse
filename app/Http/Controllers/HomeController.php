<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Models\CatePost;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Product;
use App\Models\CategoryProductModel;
use App\Models\Post;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Shipping;
use App\Models\Coupon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
session_start();

class HomeController extends Controller
{
    public function error_page_404(){
        return view('errors.404');
    }

    public function error_page_500(){
        return view('errors.500');
    }

    public function index(Request $request){
        //------------------------SEO-------------------------
        $meta_desc = "Chuyên cung cấp những em pet và phụ kiện cho pet tốt nhất hiện nay"; //Dòng mô tả phía dưới tiêu đề Website trên web 
        $meta_keywords = "Thú cưng, Phụ kiện thú cưng";
        $meta_title = "PetHouse";
        $url_canonical = $request->url();
        $share_image = url('public/frontend/img/sharefb.png');
        //------------------------SEO--------------------------
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->where('brand_id',1)->orderby('product_id','desc')->limit(4)->get();
        $all_product_corgi = DB::table('tbl_product')->where('product_status','1')->where('category_id',34)->orderby('product_id','desc')->limit(3)->get();
        $all_product_poodle = DB::table('tbl_product')->where('product_status','1')->where('category_id',32)->orderby('product_id','desc')->limit(3)->get();
        $all_product_cat = DB::table('tbl_product')->where('product_status','1')->where('brand_id',2)->orderby('product_id','desc')->limit(4)->get();
        $all_accessory = DB::table('tbl_product')->where('product_status','1')->where('brand_id',12)->orderby('product_id','desc')->limit(4)->get();
        $slider = Slider::orderby('slider_id','desc')->get();
        $all_posts = DB::table('tbl_posts')->where('post_status','1')->orderby('post_id','desc')->limit(2)->get();
        $product_view_l = DB::table('tbl_product')->where('product_status','1')->where('brand_id',1)->orderby('product_views','desc')->limit(3)->get();
        $product_view_n = DB::table('tbl_product')->where('product_status','1')->where('brand_id',1)->orderby('product_views','asc')->limit(3)->get();
        $accessory_view_l = DB::table('tbl_product')->where('product_status','1')->where('brand_id',12)->orderby('product_views','desc')->limit(3)->get();
        $accessory_view_n = DB::table('tbl_product')->where('product_status','1')->where('brand_id',12)->orderby('product_views','asc')->limit(3)->get();
        $post_view_l = DB::table('tbl_posts')->where('post_status','1')->orderby('post_views','desc')->limit(3)->get();
        $post_view_n = DB::table('tbl_posts')->where('post_status','1')->orderby('post_views','asc')->limit(3)->get();
        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('all_product',$all_product)->with('all_accessory',$all_accessory)->with('category_post',$category_post)->with('slider',$slider)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('all_posts',$all_posts)->with('all_product_cat',$all_product_cat)->with('all_product_corgi',$all_product_corgi)->with('all_product_poodle',$all_product_poodle)
        ->with('share_image',$share_image)->with('product_view_l',$product_view_l)->with('product_view_n',$product_view_n)->with('accessory_view_l',$accessory_view_l)
        ->with('accessory_view_n',$accessory_view_n)->with('post_view_l',$post_view_l)->with('post_view_n',$post_view_n);
    }

    public function search(Request $request){
        //--------SEO---------
        $meta_desc = "Tìm kiếm";
        $meta_keywords = "Thú cưng, Phụ kiện thú cưng";
        $meta_title = "Tìm kiếm";
        $url_canonical = $request->url();
        $share_image = url('public/frontend/img/sharefb.png');
        //--------SEO---------
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();
        return view('pages.products.search')->with('category',$cate_product)->with('brand',$brand_product)->with('category_post',$category_post)
        ->with('search_product',$search_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)
        ->with('url_canonical',$url_canonical)->with('share_image',$share_image);
    }
    public function home_product(Request $request){
        //------------------------SEO-------------------------
        $meta_desc = "Chuyên cung cấp những em pet và phụ kiện cho pet tốt nhất hiện nay"; //Dòng mô tả phía dưới tiêu đề Website trên web 
        $meta_keywords = "Thú cưng, Phụ kiện thú cưng";
        $meta_title = "PetHouse";
        $url_canonical = $request->url();
        $share_image = url('public/frontend/img/sharefb.png');
        //------------------------SEO--------------------------
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->where('brand_id',1)->orderby('product_id','desc')->paginate(12);
        $all_product_corgi = DB::table('tbl_product')->where('product_status','1')->where('product_name','like','%'.'corgi'.'%')->orderby('product_id','desc')->limit(3)->get();
        $all_product_poodle = DB::table('tbl_product')->where('product_status','1')->where('product_name','like','%'.'poodle'.'%')->orderby('product_id','desc')->limit(3)->get();
        $all_product_cat = DB::table('tbl_product')->where('product_status','1')->where('brand_id',2)->orderby('product_id','desc')->limit(4)->get();
        $slider = Slider::orderby('slider_id','desc')->get();
        $all_posts = DB::table('tbl_posts')->where('post_status','1')->orderby('post_id','desc')->limit(2)->get();
        $max_price = Product::max('product_price');
        foreach($all_product as $key => $cate){
            $category_id = $cate->category_id;
        }
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'giam_dan'){
                $all_product = Product::with('category')->where('category_id',$category_id)->orderby('product_price','desc')->paginate(12)
                ->appends(request()->query());
            }elseif($sort_by == 'tang_dan'){
                $all_product = Product::with('category')->where('category_id',$category_id)->orderby('product_price','asc')->paginate(12)
                ->appends(request()->query());
            }elseif($sort_by == 'kytu_za'){
                $all_product = Product::with('category')->where('category_id',$category_id)->orderby('product_name','desc')->paginate(12)
                ->appends(request()->query());
            }elseif($sort_by == 'kytu_az'){
                $all_product = Product::with('category')->where('category_id',$category_id)->orderby('product_name','asc')->paginate(12)
                ->appends(request()->query());
            }
        }elseif(isset($_GET['start_price']) && $_GET['end_price']){
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];
            $all_product = DB::table('tbl_product')->where('brand_id',1)->whereBetween('product_price',[$min_price,$max_price])->orderBy('product_price','asc')->paginate(12);
        }else{
            $all_product = Product::with('category')->where('category_id',$category_id)->orderby('product_id','desc')->paginate(12)
            ->appends(request()->query());
        }
        return view('pages.home_product')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('all_product',$all_product)->with('category_post',$category_post)->with('slider',$slider)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('all_posts',$all_posts)->with('all_product_cat',$all_product_cat)->with('all_product_corgi',$all_product_corgi)->with('all_product_poodle',$all_product_poodle)
        ->with('share_image',$share_image)->with('max_price',$max_price);
    }

    public function autocomplete_ajax(Request $request){
        $data = $request->all();
        if($data['query']){
            $product = Product::where('product_status',1)->where('product_name','LIKE','%'.$data['query'].'%')->get();
            $output = '<ul class="dropdown" style="display:block;position:relative;">';
                foreach($product as $key => $val){
                    $output .='
                        <li><a href="#">'.$val->product_name.'</a></li>
                    ';
                }
            $output .= '</ul>';
            echo $output;
        }
    }
    //------------------------------------------------- Gửi mail --------------------------------------------------
    public function send_mail(){
        $to_name = "AnhKee";
        $to_email = "anhtuank17pxu@gmail.com";

        $data = array("name"=>"Mail từ tài khoản khách hàng","body"=>'Mail gửi về vấn đề hàng hóa');

        Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('test mail nhé');
            $message->from($to_email,$to_name);
        });
       return redirect('/')->with('message','');
   }
   //------------------------------------------------- Trang giới thiệu --------------------------------------------------
    public function show_intro(Request $request){
        //--------SEO---------
        $meta_desc = "Giới thiệu";
        $meta_keywords = "Thú cưng, Phụ kiện thú cưng";
        $meta_title = "Giới thiệu";
        $url_canonical = $request->url();
        $share_image = url('public/frontend/img/sharefb.png');
        //--------SEO---------
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(12)->get();
        $all_video = DB::table('tbl_videos')->paginate(6);
        return view('pages.intro.show_intro')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('category_post',$category_post)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('all_video',$all_video)
        ->with('share_image',$share_image);
    }
    //------------------------------------------------- Trang liên hệ --------------------------------------------------
    public function show_contact(Request $request){
        //--------SEO---------
        $meta_desc = "Liên hệ";
        $meta_keywords = "Thú cưng, Phụ kiện thú cưng";
        $meta_title = "Liên hệ";
        $url_canonical = $request->url();
        $share_image = url('public/frontend/img/sharefb.png');
        //--------SEO---------
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(12)->get();
        return view('pages.contact.show_contact')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('category_post',$category_post)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('share_image',$share_image);
    }

    public function list_contact(){
        $contact = Contact::orderby('contact_id','desc')->get();
        return view('admin.contact.list_contact')->with(compact('contact'));
    }

    public function save_contact(Request $request){
        $data = $request->all();
        $contact = new Contact();
        $contact->contact_name = $data['contact_name'];
        $contact->contact_email = $data['contact_email'];
        $contact->contact_phone = $data['contact_phone'];
        $contact->contact_notes = $data['contact_notes'];
        $contact->contact_status = 0;
        $contact->save();
        Session::put('message','Thêm danh mục bài viết thành công');
        return redirect('/show-contact');
    }

    public function unactive_contact($contact_id){
        DB::table('tbl_contact')->where('contact_id',$contact_id)->update(['contact_status'=>1]);
        Session::put('message','Đã liên hệ người dùng');
        return Redirect::to('list-contact');
    }

    public function active_contact($contact_id){
        DB::table('tbl_contact')->where('contact_id',$contact_id)->update(['contact_status'=>0]);
        Session::put('message','Chưa liên hệ người dùng');
        return Redirect::to('list-contact');
    }
    //------------------------------------------------- Trang dịch vụ --------------------------------------------------
    public function show_service(Request $request){
        //--------SEO---------
        $meta_desc = "Dịch vụ";
        $meta_keywords = "Thú cưng, Phụ kiện thú cưng";
        $meta_title = "Dịch vụ";
        $url_canonical = $request->url();
        $share_image = url('public/frontend/img/sharefb.png');
        //--------SEO---------
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(12)->get();
        return view('pages.service.show_service')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('category_post',$category_post)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('share_image',$share_image);
    }
    //------------------------------------------------- Slider --------------------------------------------------
    public function manage_banner(){
        $all_slide = Slider::orderby('slider_id','desc')->get();
        return view('admin.slider.list_slider')->with('all_slide',$all_slide);
    }

    public function add_slider(){
        return view('admin.slider.add_slider');
    }

    public function insert_slider(Request $request){
        $data = $request->all();

        $get_image = $request->file('slider_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode(',',$get_name_image));
            $new_image = $name_image.rand(0,9999999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/slider',$new_image);
            $data['slider_image'] = $new_image;
            $slider = new Slider();
            $slider->slider_name = $data['slider_name'];
            $slider->slider_image = $new_image;
            $slider->slider_status = $data['slider_status'];
            $slider->save();
            Session::put('message','Thêm thành công');
            return Redirect::to('manage-banner');
        }else{
            Session::put('message','Thêm thành công');
            return Redirect::to('add-slider');
        }
    }

    public function unactive_slider($slider_id){
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['slider_status'=>1]);
        Session::put('message','Kích hoạt slider thành công');
        return Redirect::to('manage-banner');
    }

    public function active_slider($slider_id){
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['slider_status'=>0]);
        Session::put('message','Bỏ kích hoạt slider thành công');
        return Redirect::to('manage-banner');
    }

    //------------------------------------------------- Farm --------------------------------------------------
    public function farm_corgi(Request $request){
        //--------SEO---------
        $meta_desc = "Trại Corgi thuần chủng tại PetHouse";
        $meta_keywords = "Trại Corgi thuần chủng tại PetHouse";
        $meta_title = "Trại Corgi thuần chủng tại PetHouse";
        $url_canonical = $request->url();
        $share_image = url('public/frontend/img/sharefb.png');
        //--------SEO---------
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(12)->get();
        return view('pages.intro.farm_corgi')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('category_post',$category_post)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('share_image',$share_image);
    }

    public function farm_phoc(Request $request){
        //--------SEO---------
        $meta_desc = "Trại Phốc Sóc thuần chủng tại PetHouse";
        $meta_keywords = "Trại Phốc Sóc thuần chủng tại PetHouse";
        $meta_title = "Trại Phốc Sóc thuần chủng tại PetHouse";
        $url_canonical = $request->url();
        $share_image = url('public/frontend/img/sharefb.png');
        //--------SEO---------
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(12)->get();
        return view('pages.intro.farm_phoc')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('category_post',$category_post)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('share_image',$share_image);
    }

    public function farm_poodle(Request $request){
        //--------SEO---------
        $meta_desc = "Trại Poodle thuần chủng tại PetHouse";
        $meta_keywords = "Trại Poodle thuần chủng tại PetHouse";
        $meta_title = "Trại Poodle thuần chủng tại PetHouse";
        $url_canonical = $request->url();
        $share_image = url('public/frontend/img/sharefb.png');
        //--------SEO---------
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(12)->get();
        return view('pages.intro.farm_poodle')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('category_post',$category_post)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('share_image',$share_image);
    }

    public function farm_bull(Request $request){
        //--------SEO---------
        $meta_desc = "Trại Bull French thuần chủng tại PetHouse";
        $meta_keywords = "Trại Bull French thuần chủng tại PetHouse";
        $meta_title = "Trại Bull French thuần chủng tại PetHouse";
        $url_canonical = $request->url();
        $share_image = url('public/frontend/img/sharefb.png');
        //--------SEO---------
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(12)->get();
        return view('pages.intro.farm_bull')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('category_post',$category_post)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('share_image',$share_image);
    }

    public function farm_chow(Request $request){
        //--------SEO---------
        $meta_desc = "Trại Chow Chow thuần chủng tại PetHouse";
        $meta_keywords = "Trại Chow Chow thuần chủng tại PetHouse";
        $meta_title = "Trại Chow Chow thuần chủng tại PetHouse";
        $url_canonical = $request->url();
        $share_image = url('public/frontend/img/sharefb.png');
        //--------SEO---------
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(12)->get();
        return view('pages.intro.farm_chow')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('category_post',$category_post)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('share_image',$share_image);
    }

    public function home_user(Request $request){
        //--------SEO---------
        $meta_desc = "Thông tin người dùng";
        $meta_keywords = "Thông tin người dùng";
        $meta_title = "Thông tin người dùng";
        $url_canonical = $request->url();
        $share_image = url('public/frontend/img/sharefb.png');
        //--------SEO---------
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(12)->get();
        if(!Session::get('customer_id')){
            return redirect('login-checkout')->with('error', 'Vui lòng đăng nhập để xem lịch sử mua hàng...');
        }else{
            $getorder = Order::where('customer_id',Session::get('customer_id'))->orderby('order_id','DESC')->paginate(10);
            return view('pages.user_home.home_user')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('category_post',$category_post)
            ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('share_image',$share_image)
            ->with('getorder',$getorder);
        }
    }

    public function view_history_order(Request $request,$order_code){
        //--------SEO---------
        $meta_desc = "Xem lịch sử đơn hàng";
        $meta_keywords = "Xem lịch sử đơn hàng";
        $meta_title = "Xem lịch sử đơn hàng";
        $url_canonical = $request->url();
        $share_image = url('public/frontend/img/sharefb.png');
        //--------SEO---------
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(12)->get();
        if(!Session::get('customer_id')){
            return redirect('login-checkout')->with('error', 'Vui lòng đăng nhập để xem lịch sử mua hàng...');
        }else{
            $order_details = OrderDetails::with('product')->where('order_code', $order_code)->get();
            $order = Order::where('order_code', $order_code)->first();

            $customer_id = $order->customer_id;
            $shipping_id = $order->shipping_id;
            $order_status = $order->order_status;

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
            return view('pages.user_home.view_history_order')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('category_post',$category_post)
            ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('share_image',$share_image)
            ->with('order_details',$order_details)->with('customer',$customer)->with('shipping',$shipping)->with('coupon_condition',$coupon_condition)
            ->with('coupon_number',$coupon_number)->with('order_status',$order_status)->with('order_status',$order_status)->with('order',$order);
        }
    }

    public function huy_don_hang(Request $request){
        $data = $request->all();
        $order = Order::where('order_code',$data['order_code'])->first();
        $order->order_destroy = $data['lydo'];
        $order->order_status = 3;
        $order->save();
    }

    public function edit_home_user(Request $request, $customer_id){
        $data = $request->all();
        $customer = Customer::find($customer_id);
        return view('pages.home_user')->with('customer',$customer);
    }

    public function like(Request $request){
        //--------SEO---------
        $meta_desc = "Sản phẩm yêu thích";
        $meta_keywords = "Sản phẩm yêu thích";
        $meta_title = "Sản phẩm yêu thích";
        $url_canonical = $request->url();
        $share_image = url('public/frontend/img/sharefb.png');
        //--------SEO---------
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(12)->get();
        return view('pages.like')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('category_post',$category_post)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('share_image',$share_image);
    }
}
