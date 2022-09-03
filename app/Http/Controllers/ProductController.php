<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use App\Models\CatePost;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Rating;
use App\Imports\ExcelImportsProduct;
use App\Exports\ExportProduct;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
session_start();

class ProductController extends Controller
{
    //--------------------------------------------------------------------------------------------------------------------------------//
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function export_csv_product(){
        return Excel::download(new ExportProduct , 'product.xlsx');
    }

    public function import_csv_product(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new ExcelImportsProduct, $path); 
        return back();
    }
    //----------------------------------------------------------//--------------------------------------------------------------------//
    //-----------------------------------------------------Bình luận------------------------------------------------------------------//
    public function load_comment(Request $request){
        $product_id = $request->product_id;
        $comment = Comment::where('comment_product_id', $product_id)->where('comment_status', 0)->orderBy('comment_status','desc')->orderby('comment_id','desc')->take(5)->get();
        $output = '';
        foreach($comment as $key =>$comm){
            $output .= '<div class="blog__comment__item">
            <div class="blog__comment__item__pic">
                <img src="'.url('/public/frontend/img/user.png').'" alt="">
            </div>
            <div class="blog__comment__item__text">
                <h6>'.$comm->comment_name.'</h6>
                <p>'.$comm->comment.'</p>
                <ul>
                    <li><i class="fa fa-clock-o"></i>'.$comm->comment_date.'</li>
                </ul>
            </div>
        </div>';                             
        }
        echo $output;
    }

    public function send_comment(Request $request){
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;
        $comment = new Comment();
        $comment->comment = $comment_content;
        $comment->comment_name = $comment_name;
        $comment->comment_product_id = $product_id;
        $comment->comment_status = 0;
        $comment->save();
    }
    
    public function list_comment(){
        $comment = Comment::with('product')->orderBy('comment_id','desc')->get();
        return view('admin.comment.list_comment')->with('comment',$comment);
    }

    public function delete_comment($comment_id){
        DB::table('tbl_comment')->where('comment_id',$comment_id)->delete();
        Session::put('message','Xóa bình luận thành công');
        return Redirect::to('comment');
    }
    //----------------------------//-----------------------Bình luận---------------------------------------//-------------------------//
    //-------------------------------------------------------Admin--------------------------------------------------------------------//
    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        return view('admin.product.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }

    public function all_product(){
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->orderby('tbl_product.product_id','desc')->get();
        $manager_product = view('admin.product.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.product.all_product',$manager_product);
    }

    public function save_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_slug'] = $request->product_slug;
        $data['product_tags'] = $request->product_tags;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_price'] = $request->product_price;
        $data['price_cost'] = $request->price_cost;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        $path = 'public/uploads/product/';
        $path_gallery = 'public/uploads/gallery/';
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode(',',$get_name_image));
            $new_image = $name_image.rand(0,9999999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            File::copy($path.$new_image, $path_gallery.$new_image);
            $data['product_image'] = $new_image;
        }
        $pro_id = DB::table('tbl_product')->insertGetId($data);
        $gallery = new Gallery();
        $gallery->gallery_image = $new_image;
        $gallery->gallery_name = $new_image;
        $gallery->product_id = $pro_id;
        $gallery->save();
        Session::put('message','Thêm thành công');
        return Redirect::to('all-product');
    }

    public function update_product(Request $request, $product_id){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_slug'] = $request->product_slug;
        $data['product_tags'] = $request->product_tags;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_price'] = $request->product_price;
        $data['price_cost'] = $request->price_cost;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode(',',$get_name_image));
            $new_image = $name_image.rand(0,9999999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('message','Cập nhật thú cưng thành công');
            return Redirect::to('all-product');
        }
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message','Cập nhật thú cưng thành công');
        return Redirect::to('all-product');
    }

    public function unactive_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','Kích hoạt thú cưng thành công');
        return Redirect::to('all-product');
    }

    public function active_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message','Bỏ kích hoạt thú cưng thành công');
        return Redirect::to('all-product');
    }

    public function edit_product($product_id){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product = view('admin.product.edit_product')->with('edit_product',$edit_product)
        ->with('cate_product',$cate_product)->with('brand_product',$brand_product);
        return view('admin_layout')->with('admin.product.edit_product',$manager_product);
    }

    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','Xóa thú cưng thành công');
        return Redirect::to('all-product');
    }
    //------------------------//-----------------------------Admin-----------------------------------------//-------------------------//
    //-------------------------------------------------Chi tiết sản phẩm--------------------------------------------------------------//
    public function details_product($product_id, Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        $details_product = DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->where('tbl_product.product_id',$product_id)->get();
        foreach($details_product as $key => $value){
            $category_id = $value->category_id;
            $product_id = $value->product_id;
            $product_cate = $value->category_name;
            //--------SEO---------
            $meta_desc = $value->product_desc;
            $meta_keywords = $value->product_name; 
            $meta_title = $value->product_name;
            $url_canonical = $request->url();
            $share_image = url('public/frontend/img/sharefb.png');
            //--------SEO---------
        }
        $product = Product::where('product_id', $product_id)->first();
        $product->product_views = $product->product_views + 1; 
        $product->save();
        $rating = Rating::where('product_id',$product_id)->avg('rating');
        $rating = round($rating);
        $gallery = Gallery::where('product_id', $product_id)->get();
        $related_product = DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->take(4)->get();
        return view('pages.products.show_details')->with('category',$cate_product)->with('brand',$brand_product)->with('category_post',$category_post)
        ->with('product_details',$details_product)->with('relate',$related_product)->with('gallery',$gallery)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('product_cate',$product_cate)->with('rating',$rating)->with('share_image',$share_image);
    }

    public function tag(Request $request, $product_tag){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        $tag = str_replace("-"," ",$product_tag);
        $pro_tag = Product::where('product_status', 1)->where('product_name','LIKE','%'.$tag.'%')->orWhere('product_tags','LIKE','%'.$tag.'%')->get();
        //--------SEO---------
        $meta_desc = 'Tags: '.$product_tag;
        $meta_keywords = 'Tags: '.$product_tag;
        $meta_title = 'Tags: '.$product_tag;
        $url_canonical = $request->url();
        $share_image = url('public/frontend/img/sharefb.png');
        //--------SEO---------

        return view('pages.products.tag')->with('category',$cate_product)->with('brand',$brand_product)->with('category_post',$category_post)
        ->with('product_tag',$product_tag)->with('pro_tag',$pro_tag)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('share_image',$share_image);
    }

    public function insert_rating(Request $request){
        $data = $request->all();
        $rating = new Rating();
        $rating->product_id = $data['product_id'];
        $rating->rating = $data['index'];
        $rating->save();
        echo 'done';
    }
    //---------------------------//--------------------Chi tiết sản phẩm------------------------------------//------------------------//
    //------------------------------------------------Nhiều ảnh sản phẩm--------------------------------------------------------------//
    public function add_gallery($product_id){
        $pro_id = $product_id;
        return view('admin.gallery.add_gallery')->with(compact('pro_id'));
    }

    public function select_gallery(Request $request){
        $product_id = $request->pro_id;
        $gallery = Gallery::where('product_id', $product_id)->get();
        $gallery_count = $gallery->count();
        $output = '
                <form>
                    '.csrf_field().'
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên hình ảnh</th>
                                <th>Hình ảnh</th>
                                <th>Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
        ';
        if($gallery_count>0){
            $i = 0;
            foreach($gallery as $key => $gal){
                $i++;
                $output.='
                    
                        <tr>
                            <td>'.$i.'</td>
                            <td contenteditable class="edit_gal_name" data-gal_id="'.$gal->gallery_id.'">'.$gal->gallery_name.'</td>
                            <td>
                                <img src="'.url('public/uploads/gallery/'.$gal->gallery_image).'" class="img-thumbnail" alt="Ảnh hỏng" width="100px" height="100px">
                                <input type="file" class="file_image" data-gal_id="'.$gal->gallery_id.'" id="file-'.$gal->gallery_id.'" name="file" accept="image/*">
                            </td>
                            <td>
                                <a href="" type="button" class="btn btn-icon icon-left btn-danger delete-gallery" data-gal_id="'.$gal->gallery_id.'"><i class="fas fa-edit"></i>&nbsp;Xóa</a>
                            </td>
                        </tr>
                    </form>
                ';
            }
        }else{
            $output.='
                    <tr>
                        <td colspan="4">Sản phẩm này chưa có thư viện ảnh</td>
                    </tr>
            ';
        }
            $output.='
                        </tbody>
                    </table>
                </form>
            ';
        echo $output;
    }

    public function insert_gallery(Request $request, $pro_id){
        $get_image = $request->file('file');
        if($get_image){
            foreach($get_image as $image){
                $get_name_image = $image->getClientOriginalName();
                $name_image = current(explode(',',$get_name_image));
                $new_image = $name_image.rand(0,9999999).'.'.$image->getClientOriginalExtension();
                $image->move('public/uploads/gallery',$new_image);
                $gallery = new Gallery();
                $gallery->gallery_name = $new_image;
                $gallery->gallery_image = $new_image;
                $gallery->product_id = $pro_id;
                $gallery->save();
            }
        }
        Session::put('message','Thêm thư viện ảnh thành công');
                return Redirect::to('all-product');
    }

    public function update_gallery_name(Request $request){
        $gal_id = $request->gal_id;
        $gal_text = $request->gal_text;
        $gallery = Gallery::find($gal_id);
        $gallery->gallery_name = $gal_text;
        $gallery->save();
    }

    public function delete_gallery(Request $request){
        $gal_id = $request->gal_id;
        $gallery = Gallery::find($gal_id);
        unlink('public/uploads/gallery/'.$gallery->gallery_image);
        $gallery->delete();
    }

    public function update_gallery(Request $request){
        $get_image = $request->file('file');
        $gal_id = $request->gal_id;
        if($get_image){
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode(',',$get_name_image));
                $new_image = $name_image.rand(0,9999999).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('public/uploads/gallery',$new_image);
                $gallery = Gallery::find();
                unlink('public/uploads/gallery/'.$gallery->gallery_image);
                $gallery->gallery_image = $new_image;
                $gallery->save();
        }
    }

    //---------------------------//--------------------Nhiều ảnh sản phẩm-----------------------------------//------------------------//
    //------------------------------------------------Xem nhanh sản phẩm--------------------------------------------------------------//
    public function quickview(Request $request){
        $product_id = $request->product_id;
        $product = Product::find($product_id);
        $gallery = Gallery::where('product_id', $product_id)->get();
        $output['product_gallery'] = '';
        foreach($gallery as $key => $gal){
            $output['product_gallery'].='<p><img width="100%" src="public/uploads/gallery/'.$gal->gallery_image.'"</p>';
        }
        $output['product_name'] = $product->product_name;
        $output['product_id'] = $product->product_id;
        $output['product_desc'] = $product->product_desc;
        $output['product_content'] = $product->product_content;
        $output['product_price'] = number_format($product->product_price,0,',','.').' đ';
        $output['product_image'] ='<p><img width="100%" src="public/uploads/product/'.$product->product_image.'"</p>';
        echo json_encode($output);
    }
}
