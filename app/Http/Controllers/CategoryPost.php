<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Models\CatePost;
use App\Imports\ExcelImportsCategoryPost;
use App\Exports\ExportCategoryPost;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
session_start();

class CategoryPost extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function export_csv_catepost(){
        return Excel::download(new ExportCategoryPost , 'category_post.xlsx');
    }

    public function import_csv_catepost(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new ExcelImportsCategoryPost, $path); 
        return back();
    }

    public function add_category_post(){
        $this->AuthLogin();
        return view('admin.category_post.add_category');
    }

    public function all_category_post(){
        $this->AuthLogin();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        return view('admin.category_post.list_category')->with(compact('category_post'));
    }

    public function save_category_post(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $category_post = new CatePost();
        $category_post->cate_post_name = $data['cate_post_name'];
        $category_post->cate_post_slug = $data['cate_post_slug'];
        $category_post->cate_post_desc = $data['cate_post_desc'];
        $category_post->cate_post_status = $data['cate_post_status'];
        $category_post->save();
        Session::put('message','Thêm danh mục bài viết thành công');
        return redirect('/all-category-post');
    }

    public function unactive_category_post($cate_id){
        $this->AuthLogin();
        DB::table('tbl_category_post')->where('cate_post_id',$cate_id)->update(['cate_post_status'=>1]);
        Session::put('message','Kích hoạt danh mục bài viết thành công');
        return Redirect::to('all-category-post');
    }

    public function active_category_post($cate_id){
        $this->AuthLogin();
        DB::table('tbl_category_post')->where('cate_post_id',$cate_id)->update(['cate_post_status'=>0]);
        Session::put('message','Bỏ kích hoạt danh mục bài viết thành công');
        return Redirect::to('all-category-post');
    }

    public function edit_category_post($cate_post_id){
        $this->AuthLogin();
        $category_post = CatePost::find($cate_post_id);
        return view('admin.category_post.edit_category')->with(compact('category_post'));
    }

    public function update_category_post(Request $request, $cate_id){
        $this->AuthLogin();
        $data = $request->all();
        $category_post = CatePost::find($cate_id);
        $category_post->cate_post_name = $data['cate_post_name'];
        $category_post->cate_post_slug = $data['cate_post_slug'];
        $category_post->cate_post_desc = $data['cate_post_desc'];
        $category_post->cate_post_status = $data['cate_post_status'];
        $category_post->save();
        Session::put('message','Cập nhật danh mục bài viết thành công');
        return redirect('/all-category-post');
    }

    public function delete_category_post($cate_id){
        $this->AuthLogin();
        $category_post = CatePost::find($cate_id);
        $category_post->delete();
        Session::put('message','Xoa danh mục bài viết thành công');
        return redirect()->back();
    }

    public function danh_muc_bai_viet($cate_post_slug){
        
    }
}
