<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Models\CatePost;
use App\Models\Brand;
use App\Imports\ExcelImportsBrand;
use App\Exports\ExcelExportsBrand;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
session_start();

class BrandProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function export_csv_brand(){
        return Excel::download(new ExcelExportsBrand , 'brand_product.xlsx');
    }

    public function import_csv_brand(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new ExcelImportsBrand, $path); 
        return back();
    }

    public function add_brand_product(){
        $this->AuthLogin();
        return view('admin.brand_product.add_brand_product');
    }

    public function all_brand_product(){
        $this->AuthLogin();
        $all_brand_product = DB::table('tbl_brand')->get();
        $manager_brand_product = view('admin.brand_product.all_brand_product')->with('all_brand_product',$all_brand_product);
        return view('admin_layout')->with('admin.brand_product.all_brand_product',$manager_brand_product);
    }

    public function save_brand_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['meta_keywords'] = $request->brand_product_meta_desc;
        $data['brand_status'] = $request->brand_product_status;

        DB::table('tbl_brand')->insert($data);
        Session::put('message','Thêm loại thú cưng thành công');
        return Redirect::to('all-brand-product');
    }

    public function unactive_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
        Session::put('message','Kích hoạt loại thú cưng thành công');
        return Redirect::to('all-brand-product');
    }

    public function active_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
        Session::put('message','Bỏ kích hoạt loại thú cưng thành công');
        return Redirect::to('all-brand-product');
    }

    public function edit_brand_product($brand_product_id){
        $this->AuthLogin();
        $edit_brand_product = DB::table('tbl_brand')->where('brand_id',$brand_product_id)->get();
        $manager_brand_product = view('admin.brand_product.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
        return view('admin_layout')->with('admin.brand_product.edit_brand_product',$manager_brand_product);
    }

    public function update_brand_product(Request $request, $brand_product_id){
        $this->AuthLogin();
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['meta_keywords'] = $request->brand_product_meta_desc;
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update($data);
        Session::put('message','Cập nhật loại thú cưng thành công');
        return Redirect::to('all-brand-product');
    }

    public function delete_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->delete();
        Session::put('message','Xóa loại thú cưng thành công');
        return Redirect::to('all-brand-product');
    }

    public function show_brand_home(Request $request,$brand_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_id',$brand_id)->first();
        //--------SEO---------
        $meta_desc = $brand_name->brand_desc;
        $meta_keywords = $brand_name->meta_keywords;
        $meta_title = $brand_name->brand_name;
        $url_canonical = $request->url();
        $share_image = url('public/frontend/img/sharefb.png');
        //--------SEO---------
        if(isset($_GET['brand'])){
            $brand_id = $_GET['brand'];
            $brand_arr = explode(",",$brand_id);
            $brand_by_id = DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')->whereIn('tbl_product.brand_id',$brand_arr)
            ->orderby('tbl_product.brand_id','desc')->paginate(12);
        }else{
            $brand_by_id = DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')->where('tbl_product.brand_id',$brand_name->brand_id)
            ->orderby('tbl_product.brand_id','desc')->paginate(12);
        }

        return view('pages.brand.show_brand')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name)->with('category_post',$category_post)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('share_image',$share_image);
    }
}
