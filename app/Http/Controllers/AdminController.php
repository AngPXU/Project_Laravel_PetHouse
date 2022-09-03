<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Models\Social;
use App\Models\Login;
use App\Models\Post;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\SocialCustomers;
use App\Models\Statistic;
use App\Models\Visitors;
use App\Models\Video;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
session_start();

class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function index(){
        return view('admin_login');
    }

    public function show_dashboard(Request $request){
        $this->AuthLogin();
        $user_ip_address = $request->ip();
        $early_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $end_of_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        $early_this_month = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $oneyears = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $visitor_of_lastmonth = Visitors::whereBetween('date_visitor', [$early_last_month, $end_of_last_month])->get();
        $visitor_last_month_count = $visitor_of_lastmonth->count();
        $visitor_of_thismonth = Visitors::whereBetween('date_visitor', [$early_this_month, $now])->get();
        $visitor_this_month_count = $visitor_of_thismonth->count();
        $visitor_of_year = Visitors::whereBetween('date_visitor', [$oneyears, $now])->get();
        $visitor_year_count = $visitor_of_year->count();
        $visitor_current = Visitors::where('ip_address', [$user_ip_address])->get();
        $visitor_count = $visitor_current->count();
        if($visitor_count<1){
            $visitor = new Visitors();
            $visitor->ip_address = $user_ip_address;
            $visitor->date_visitor = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
            $visitor->save();
        }
        $visitors = Visitors::all();
        $visitor_total = $visitors->count();
        // $product_views = Product::orderBy('product_views', 'desc')->take(20)->get();
        
        // $post_views = Post::orderBy('post_views', 'desc')->take(20)->get();
        $post_ad = Post::all()->count();
        $product = Product::all()->count();
        $order_ad = Order::all()->count();
        $video = Video::all()->count();
        $customer = Customer::all()->count();
        $product_views = Product::orderBy('product_views', 'desc')->take(5)->get();
        $post_views = Post::orderBy('post_views', 'desc')->take(5)->get();
        return view('admin.dashboard')->with(compact('visitor_total','visitor_count','visitor_last_month_count','visitor_this_month_count',
        'visitor_year_count','product','post_ad','order_ad','video','customer','product_views','post_views'));
    }

    public function login_google(){
        return Socialite::driver('google')->redirect();
   }
public function callback_google(){
        $users = Socialite::driver('google')->user(); 
        // return $users->id;
        $authUser = $this->findOrCreateUser($users,'google');
        if($authUser){
            $account_name = Login::where('admin_id',$authUser->user)->first();
            Session::put('admin_name',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
        }else{
            $account_name = Login::where('admin_id',$authUser->user)->first();
            Session::put('admin_name',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
        }
        return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');   
        // $account_name = Login::where('admin_id',$authUser->user)->first();
        // Session::put('admin_name',$account_name->admin_name);
        // Session::put('admin_id',$account_name->admin_id);
        // return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
      
       
    }
    public function findOrCreateUser($users,$provider){
        $authUser = Social::where('provider_user_id', $users->id)->first();
        if($authUser){
            return $authUser;
        }else{
            $customer_new = new Social([
                'provider_user_id' => $users->id,
                'provider_user_email' => $users->email,
                'provider' => strtoupper($provider)
            ]);
            $orang = Login::where('admin_email',$users->email)->first();
                if(!$orang){
                    $orang = Login::create([
                        'admin_name' => $users->name,
                        'admin_email' => $users->email,
                        'admin_password' => '',
                        'admin_phone' => '',
                        'admin_status' => 1
                    ]);
                }
            $customer_new->login()->associate($orang);
            $customer_new->save();
            return $customer_new;
        }
    }

    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();       
    }
        public function callback_facebook(){
            $provider = Socialite::driver('facebook')->user();
            $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
                if($account){
                    //login in vao trang quan tri
                    $account_name = Login::where('admin_id',$account->user)->first();
                    Session::put('admin_id',$account_name->admin_id);
                    Session::put('login_normal',true);
                    Session::put('admin_name',$account_name->admin_name);
                    return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
                }else{
                    $hieu = new Social([
                        'provider_user_id' => $provider->getId(),
                        'provider' => 'facebook'
                    ]);
                    $orang = Login::where('admin_email',$provider->getEmail())->first();
                    if(!$orang){
                        $orang = Login::create([
                            'admin_name' => $provider->getName(),
                            'admin_email' => $provider->getEmail(),
                            'admin_password' => '',
                            'admin_phone' => ''
                        ]);
                    }
                    $hieu->login()->associate($orang);
                    $hieu->save();
                    $account_name = Login::where('admin_id',$account->user)->first();
                    Session::put('admin_id',$account_name->admin_id);
                    Session::put('login_normal',true);
                    Session::put('admin_name',$account_name->admin_id);
                    return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
                }       
        }





        public function login_customer_google(){
            config(['services.google.redirect' => env('GOOGLE_CLIENT_URL')]);
            return Socialite::driver('google')->redirect();
       }

       public function callback_customer_google(){
        config(['services.google.redirect' => env('GOOGLE_CLIENT_URL')]);
        $users = Socialite::driver('google')->user(); 
        $authUser = $this->findOrCreateCustomer($users,'google');
        if($authUser){
            $account_name = Customer::where('customer_id',$authUser->user)->first();
            Session::put('customer_id',$account_name->customer_id);
            Session::put('customer_picture',$account_name->customer_picture);
            Session::put('customer_name',$account_name->customer_name);
        }elseif($customer_new){
            $account_name = Customer::where('customer_id',$authUser->user)->first();
            Session::put('customer_id',$account_name->customer_id);
            Session::put('customer_picture',$account_name->customer_picture);
            Session::put('customer_name',$account_name->customer_name);
        }
        return redirect('/trang-chu')->with('message', 'Đăng nhập'.$account_name->customer_email.'thành công');   
    }
    public function findOrCreateCustomer($users,$provider){
        $authUser = SocialCustomers::where('provider_user_id', $users->id)->first();
        if($authUser){
            return $authUser;
        }else{
            $customer_new = new SocialCustomers([
                'provider_user_id' => $users->id,
                'provider_user_email' => $users->email,
                'provider' => strtoupper($provider)
            ]);
            $customer = Customer::where('customer_email',$users->email)->first();
                if(!$customer){
                    $customer = Customer::create([
                        'customer_name' => $users->name,
                        'customer_email' => $users->email,
                        'customer_password' => '',
                        'customer_phone' => '',
                        'customer_picture' => $users->avatar,
                    ]);
                }
            $customer_new->customer()->associate($customer);
            $customer_new->save();
            return $customer_new;
        }
    }


    public function login_facebook_customer(){
        config(['services.facebook.redirect' => env('FACEBOOK_CLIENT_REDIRECT')]);
        return Socialite::driver('facebook')->redirect();       
    }
        public function callback_facebook_customer(){
            config(['services.facebook.redirect' => env('FACEBOOK_CLIENT_REDIRECT')]);
            $provider = Socialite::driver('facebook')->user();
            $account = SocialCustomers::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
                if($account != null){
                    $account_name = Customer::where('customer_id',$account->user)->first();
                    Session::put('customer_id',$account_name->customer_id);
                    Session::put('customer_name',$account_name->customer_name);
                    return redirect('/trang-chu')->with('message', 'Đăng nhập'.$account_name->customer_email.'thành công');
                }elseif($account==null){
                    $customer_login = new SocialCustomers([
                        'provider_user_id' => $provider->getId(),
                        'provider_user_email' => $provider->getEmail(),
                        'provider' => 'facebook'
                    ]);
                    $customer = Customer::where('customer_email',$provider->getEmail())->first();
                    if(!$customer){
                        $customer = Customer::create([
                            'customer_name' => $provider->getName(),
                            'customer_email' => $provider->getEmail(),
                            'customer_picture' => '',
                            'customer_password' => '',
                            'customer_phone' => ''
                        ]);
                    }
                    $customer_login->customer()->associate($customer);
                    $customer_login->save();
                    $account_new = Customer::where('customer_id',$customer_login->user)->first();
                    Session::put('customer_id',$account_new->customer_id);
                    Session::put('customer_name',$account_new->customer_name);
                    return redirect('/trang-chu')->with('message', 'Đăng nhập'.$account_new->customer_email.'thành công');
                }       
        }



























    public function dashboard(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $admin_email = $data['admin_email'];
        $admin_password = md5($data['admin_password']);
        $login = Login::where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        $login_count = $login->count();
        if($login_count){
            Session::put('admin_name', $login->admin_name);
            Session::put('admin_id', $login->admin_id);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message', 'Tài khoản hoặc mật khẩu không đúng... Mời nhập lại');
            return Redirect::to('/admin');
        }

        // $this->AuthLogin();
        // $admin_email = $request->admin_email;
        // $admin_password = md5($request->admin_password);
        // $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        // if($result){
        //     Session::put('admin_name',$result->admin_name);
        //     Session::put('admin_id',$result->admin_id);
        //     return Redirect::to('/dashboard');
        // }else{
        //     Session::put('message','Tài khoản hoặc mật khẩu không đúng... Mời nhập lại');
        //     return Redirect::to('/admin');
        // }
    }

    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }


    public function filter_by_date(Request $request){
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $get = Statistic::whereBetween('order_date', [$from_date, $to_date])->orderBy('order_date', 'ASC')->get();
        foreach ($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity,
            );
        }
        echo $data = json_encode($chart_data);
    }

    public function order_date(Request $request){
        $order_date = $_GET['date'];
        $order = Order::where('order_date', $order_date)->orderby('created_at', 'desc')->get();
        return view('admin.order_date')->with(compact('order'));
    }

    public function dashboard_filter(Request $request){
        $data = $request->all();
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        if($data['dashboard_value']=='7ngay'){
            $get = Statistic::whereBetween('order_date', [$sub7days,$now])->orderBy('order_date','ASC')->get();
        }elseif($data['dashboard_value']=='thangtruoc'){
            $get = Statistic::whereBetween('order_date', [$dau_thangtruoc,$cuoi_thangtruoc])->orderBy('order_date','ASC')->get();
        }elseif($data['dashboard_value']=='thangnay'){
            $get = Statistic::whereBetween('order_date', [$dauthangnay,$now])->orderBy('order_date','ASC')->get();
        }else{
            $get = Statistic::whereBetween('order_date', [$sub365days,$now])->orderBy('order_date','ASC')->get();
        }
        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity,
            );
        }
        echo $data = json_encode($chart_data);
    }

    public function days_order(){
        $sub60days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = Statistic::whereBetween('order_date', [$sub60days,$now])->orderBy('order_date','ASC')->get();
        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity,
            );
        }
        echo $data = json_encode($chart_data);
    }


}
