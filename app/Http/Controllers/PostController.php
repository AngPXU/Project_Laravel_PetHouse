<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Models\CatePost;
use App\Models\Post;
use App\Models\CommentPost;
use App\Imports\ExcelImportsPost;
use App\Exports\ExportPost;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
session_start();

class PostController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function export_csv_post(){
        return Excel::download(new ExportPost , 'post.xlsx');
    }

    public function import_csv_post(Request $request){
        $path = $request->file('file')->getRealPath();
        Excel::import(new ExcelImportsPost, $path); 
        return back();
    }

    // public function load_comment(Request $request){
    //     $product_id = $request->product_id;
    //     $comment = Comment::where('comment_product_id', $product_id)->where('comment_status', 0)->get();
    //     $output = '';
    //     foreach($comment as $key =>$comm){
    //         $output .= '<div class="blog__comment__item">
    //         <div class="blog__comment__item__pic">
    //             <img src="'.url('/public/frontend/img/user.jpg').'" alt="">
    //         </div>
    //         <div class="blog__comment__item__text">
    //             <h6>'.$comm->comment_name.'</h6>
    //             <p>'.$comm->comment.'</p>
    //             <ul>
    //                 <li><i class="fa fa-clock-o"></i>'.$comm->comment_date.'</li>
    //             </ul>
    //         </div>
    //     </div>';                             
    //     }
    //     echo $output;
    // }

    // public function send_comment(Request $request){
    //     $product_id = $request->product_id;
    //     $comment_name = $request->comment_name;
    //     $comment_content = $request->comment_content;
    //     $comment = new Comment();
    //     $comment->comment = $comment_content;
    //     $comment->comment_name = $comment_name;
    //     $comment->comment_product_id = $product_id;
    //     $comment->comment_status = 0;
    //     $comment->save();
    // }  
    
    // public function list_comment(){
    //     $comment = Comment::with('product')->orderBy('comment_status','DESC')->get();
    //     return view('admin.comment.list_comment')->with('comment',$comment);
    // }

    public function add_post(){
        $this->AuthLogin();
        $cate_post = CatePost::orderBy('cate_post_id','asc')->get();
        return view('admin.post.add_post')->with(compact('cate_post'));
    }

    public function all_post(){
        $this->AuthLogin();
        $all_post = Post::orderBy('post_id','desc')->get();
        return view('admin.post.all_post')->with(compact('all_post'));
    }

    public function save_post(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $post = new Post();
        $post->post_title = $data['post_title'];
        $post->post_slug = $data['post_slug'];
        $post->post_desc = $data['post_desc'];
        $post->post_content = $data['post_content'];
        $post->post_meta_desc = $data['post_meta_desc'];
        $post->post_meta_keywords = $data['post_meta_keywords'];
        $post->post_status = $data['post_status'];
        $post->post_poster = $data['post_poster'];
        $post->cate_post_id = $data['cate_post_id'];

        $get_image = $request->file('post_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();      //Lấy tên của hình ảnh
            $name_image = current(explode(',',$get_name_image));        //Tên đầu tiên của hình ảnh
            $new_image = $name_image.rand(0,9999999).'.'.$get_image->getClientOriginalExtension();  // Cộng cho random số phía sau đuôi
            $get_image->move('public/uploads/post',$new_image);         //Gửi hình ảnh với "tên mới" đến đường dẫn lưu file 
            $post->post_image = $new_image;                             //Lưu "tên mới"
            $post->save();                                              //Lưu bài viết
            Session::put('message','Thêm thành công');                  //Thông báo
            return Redirect::to('all-post');                            //Trả về 
        }else{
            Session::put('message','Vui lòng thêm hình ảnh');           //Nếu không có ảnh trả về thông báo yêu cầu thêm
            return redirect()->back(); 
        }
    }

    public function unactive_post($post_id){
        $this->AuthLogin();
        DB::table('tbl_posts')->where('post_id',$post_id)->update(['post_status'=>1]);
        Session::put('message','Kích hoạt bài viết thành công');
        return Redirect::to('all-post');
    }

    public function active_post($post_id){
        $this->AuthLogin();
        DB::table('tbl_posts')->where('post_id',$post_id)->update(['post_status'=>0]);
        Session::put('message','Bỏ kích hoạt bài viết thành công');
        return Redirect::to('all-post');
    }

    public function edit_post($post_id){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        $cate_post = CatePost::orderBy('cate_post_id','desc')->get();
        $edit_post = DB::table('tbl_posts')->where('post_id',$post_id)->get();
        $manager_post = view('admin.post.edit_post')->with('edit_post',$edit_post)->with('cate_product',$cate_product)->with('brand_product',$brand_product)
        ->with('cate_post',$cate_post);
        return view('admin_layout')->with('admin.post.edit_post',$manager_post);
    }

    public function update_post(Request $request, $post_id){
        $this->AuthLogin();
        $data = array();
        $data['post_title'] = $request->post_title;
        $data['post_slug'] = $request->post_slug;
        $data['post_desc'] = $request->post_desc;
        $data['post_content'] = $request->post_content;
        $data['post_meta_desc'] = $request->post_meta_desc;
        $data['post_meta_keywords'] = $request->post_meta_keywords;
        $data['post_status'] = $request->post_status;
        $data['post_poster'] = $request->post_poster;
        $data['cate_post_id'] = $request->cate_post_id;
        $get_image = $request->file('post_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode(',',$get_name_image));
            $new_image = $name_image.rand(0,9999999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/post',$new_image);
            $data['post_image'] = $new_image;
            DB::table('tbl_posts')->where('post_id',$post_id)->update($data);
            Session::put('message','Cập nhật thú cưng thành công');
            return Redirect::to('all-post');
        }
        DB::table('tbl_posts')->where('post_id',$post_id)->update($data);
        Session::put('message','Cập nhật thú cưng thành công');
        return Redirect::to('all-post');
    }

    public function delete_post($post_id){
        $this->AuthLogin();
        $post = Post::find($post_id);
        $post_image = $post->post_image;
        if($post_image){
            $path = 'public/uploads/post/'.$post_image;
            unlink($path);
        }
        $post->delete();
        Session::put('message','Xóa bài viết thành công');
        return Redirect::to('all-post');
    }

    public function danh_muc_bai_viet(Request $request, $post_slug){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        $catepost = CatePost::where('cate_post_slug',$post_slug)->take(1)->get();
        foreach($catepost as $key => $cate){
            //--------SEO---------
            $meta_desc = $cate->cate_post_desc;
            $meta_keywords = $cate->cate_post_slug;
            $meta_title = $cate->cate_post_name;
            $cate_id = $cate->cate_post_id;
            $url_canonical = $request->url();
            $share_image = url('public/frontend/img/sharefb.png');
            //--------SEO---------
        }
        $post = Post::with('cate_post')->where('post_status',1)->where('cate_post_id',$cate_id)->orderby('post_id','desc')->paginate(6);
        return view('pages.posts.cateposthome')->with('category',$cate_product)->with('brand',$brand_product)->with('category_post',$category_post)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('post',$post)->with('share_image',$share_image);
    }

    public function bai_viet(Request $request, $post_slug){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $category_post = CatePost::orderby('cate_post_id','desc')->get();
        // $catepost = CatePost::where('cate_post_slug',$post_slug)->take(1)->get();
        $post = Post::with('cate_post')->where('post_status',1)->where('post_slug',$post_slug)->take(1)->get();
        foreach($post as $key => $p){
            //--------SEO---------
            $meta_desc = $p->post_meta_desc;
            $meta_keywords = $p->post_meta_keywords;
            $meta_title = $p->post_title;
            $cate_id = $p->cate_post_id;
            $url_canonical = $request->url();
            $share_image = url('public/frontend/post/'.$p->post_image);
            $cate_post_id = $p->cate_post_id;
            $post_id = $p->post_id;
            //--------SEO---------
        }
        $post_v = Post::where('post_id', $post_id)->first();
        $post_v->post_views = $post_v->post_views + 1;
        $post_v->save();
        $related = Post::with('cate_post')->where('post_status',1)->where('cate_post_id',$cate_post_id)->whereNotIn('post_slug',[$post_slug])->take(4)->get();
        return view('pages.posts.posthome')->with('category',$cate_product)->with('brand',$brand_product)->with('category_post',$category_post)
        ->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)
        ->with('post',$post)->with('related',$related)->with('share_image',$share_image);
    }

    public function load_comment_post(Request $request){
        $post_id = $request->post_id;
        $comment = CommentPost::where('comment_post_id',$post_id)->where('comment_post_status', 0)->orderBy('commentpost_id','desc')->get();
        $output = '';
        foreach($comment as $key => $comm){
            $output .= '
                <div class="blog__details__comment">
                    <h5></h5>
                    <div class="blog__comment__item">
                        <div class="blog__comment__item__pic">
                            <img src="'.url('/public/frontend/img/user.png').'" alt="">
                        </div>
                        <div class="blog__comment__item__text">
                            <h6>'.$comm->comment_post_name.'</h6>
                            <p>'.$comm->comment_post.'</p>
                            <ul>
                                <li><i class="fa fa-clock-o"></i> '.$comm->comment_post_date.'</li>
                            </ul>
                        </div>
                    </div>
                </div>
            ';
        }
        echo $output;
    }

    public function send_post_comment(Request $request){
        $post_id = $request->post_id;
        $comment_post_name = $request->comment_post_name;
        $comment_post_content = $request->comment_post_content;
        $comment = new CommentPost();
        $comment->comment_post = $comment_post_content;
        $comment->comment_post_name = $comment_post_name;
        $comment->comment_post_id = $post_id;
        $comment->comment_post_status = 0;
        $comment->save();
    }

    public function list_comment_post(){
        $comment = CommentPost::with('post')->orderBy('commentpost_id','desc')->get();
        return view('admin.comment.list_comment_post')->with('comment',$comment);
    }

    public function delete_post_comment($commentpost_id){
        DB::table('tbl_comment_post')->where('commentpost_id ',$commentpost_id )->delete();
        Session::put('message','Xóa bình luận thành công');
        return Redirect::to('comment-post');
    }
}
