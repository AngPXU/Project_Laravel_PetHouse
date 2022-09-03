<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Models\CatePost;
use App\Models\CategoryProductModel;
use App\Imports\ExcelImports;
use App\Exports\ExcelExports;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
session_start();

class CategoryProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function export_csv(){
        return Excel::download(new ExcelExports , 'category_product.xlsx');
    }

    public function import_csv(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new ExcelImports, $path); 
        return back();
    }

    public function add_category_product(){
        $this->AuthLogin();
        $category = CategoryProductModel::where('category_parent',0)->orderby('category_id','desc')->get();
        return view('admin.category_product.add_category_product')->with('category',$category);
    }

    public function all_category_product(){
        $this->AuthLogin();
        $category_product = CategoryProductModel::where('category_parent',0)->orderby('category_id','desc')->get();
        $all_category_product = DB::table('tbl_category_product')->orderby('category_parent','desc')->orderby('category_order','asc')->get();
        $manager_category_product = view('admin.category_product.all_category_product')->with('all_category_product',$all_category_product)->with('category_product',$category_product);
        return view('admin_layout')->with('admin.category_product.all_category_product',$manager_category_product);
    }

    public function arrange_category(Request $request){
        $data = $request->all();
        $cate_id = $data["page_id_array"];
        foreach($cate_id as $key => $value){
            $category = CategoryProductModel::find($value);
            $category->category_order = $key;
            $category->save();
        }
        echo 'Đã thay đổi thứ tự danh mục';
    }

    public function save_category_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_slug'] = $request->category_product_slug;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;
        $data['category_parent'] = $request->category_parent;
        $data['meta_keywords'] = $request->category_product_meta_desc;

        DB::table('tbl_category_product')->insert($data);
        Session::put('message','Thêm danh mục thú cưng thành công');
        return Redirect::to('all-category-product');
    }

    public function unactive_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
        Session::put('message','Kích hoạt danh mục thú cưng thành công');
        return Redirect::to('all-category-product');
    }

    public function active_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
        Session::put('message','Bỏ kích hoạt danh mục thú cưng thành công');
        return Redirect::to('all-category-product');
    }

    public function edit_category_product($category_product_id){
        $this->AuthLogin();
        $category = CategoryProductModel::orderby('category_id','desc')->get();
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
        $manager_category_product = view('admin.category_product.edit_category_product')->with('edit_category_product',$edit_category_product)
        ->with('category',$category);
        return view('admin_layout')->with('admin.category_product.edit_category_product',$manager_category_product);
    }

    public function update_category_product(Request $request, $category_product_id){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_slug'] = $request->category_product_slug;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_parent'] = $request->category_parent;
        $data['meta_keywords'] = $request->category_product_meta_desc;
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message','Cập nhật danh mục thú cưng thành công');
        return Redirect::to('all-category-product');
    }

    public function delete_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        Session::put('message','Xóa danh mục thú cưng thành công');
        return Redirect::to('all-category-product');
    }

    //--------ADMIN---------

    public function show_category_home(Request $request, $category_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        $max_price = Product::max('product_price');
        $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
        ->where('tbl_product.category_id',$category_id)->get();
        $category_by_id = CategoryProductModel::where('category_id',$category_id)->get();
        foreach($category_by_id as $key => $val){
            //------------------------SEO-------------------------
            $meta_desc = $val->category_desc; 
            $meta_keywords = $val->meta_keywords;
            $meta_title = $val->category_name;
            $url_canonical = $request->url();
            $share_image = url('public/frontend/img/sharefb.png');
            //------------------------SEO--------------------------
        }
        foreach($category_by_id as $key => $cate){
            $category_id = $cate->category_id;
        }
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'giam_dan'){
                $category_by_id = Product::with('category')->where('category_id',$category_id)->orderby('product_price','desc')->paginate(12)
                ->appends(request()->query());
            }elseif($sort_by == 'tang_dan'){
                $category_by_id = Product::with('category')->where('category_id',$category_id)->orderby('product_price','asc')->paginate(12)
                ->appends(request()->query());
            }elseif($sort_by == 'kytu_za'){
                $category_by_id = Product::with('category')->where('category_id',$category_id)->orderby('product_name','desc')->paginate(12)
                ->appends(request()->query());
            }elseif($sort_by == 'kytu_az'){
                $category_by_id = Product::with('category')->where('category_id',$category_id)->orderby('product_name','asc')->paginate(12)
                ->appends(request()->query());
            }
        }elseif(isset($_GET['cate'])){
            $category_filter = $_GET['cate'];
            $category_arr = explode(",",$category_filter);
            $category_by_id = Product::with('category')->whereIn('category_id',$category_arr)->orderby('product_price','desc')->paginate(12);
        }elseif(isset($_GET['start_price']) && $_GET['end_price']){
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];
            $category_by_id = DB::table('tbl_product')->where('tbl_product.category_id',$category_id)->whereBetween('product_price',[$min_price,$max_price])->orderBy('product_id','ASC')->paginate(12);
        }else{
            $category_by_id = Product::with('category')->where('category_id',$category_id)->orderby('product_id','desc')->paginate(12)
            ->appends(request()->query());
        }
        
        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();
        
        return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('category_by_id',$category_by_id)->with('category_name',$category_name)->with('category_post',$category_post)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('share_image',$share_image)->with('max_price',$max_price);
    }
}


