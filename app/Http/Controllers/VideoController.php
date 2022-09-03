<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Models\Video;
use Illuminate\Support\Facades\Redirect;
session_start();

class VideoController extends Controller
{
    public function video(){
        return view('admin.video.list_video');
    }

    public function select_video(Request $request){
        $video = Video::orderby('video_id', 'desc')->get();
        $video_count = $video->count();
        $output = '
                <form>
                    '.csrf_field().'
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên video</th>
                                <th>Slug</th>
                                <th>Mô tả</th>
                                <th>Link</th>
                                <th>Hình ảnh</th>
                                <th>Video</th>
                                <th>Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>
        ';
        if($video_count>0){
            $i = 0;
            foreach($video as $key => $vid){
                $i++;
                $output.='
                    
                        <tr>
                            <td>'.$i.'</td>
                            <td contenteditable data-video_id="'.$vid->video_id.'" data-video_type="video_title" class="video_edit" id="video_title_'.$vid->video_id.'">'.$vid->video_title.'</td>
                            <td contenteditable data-video_id="'.$vid->video_id.'" data-video_type="video_slug" class="video_edit" id="video_slug_'.$vid->video_id.'">'.$vid->video_slug.'</td>
                            <td contenteditable data-video_id="'.$vid->video_id.'" data-video_type="video_desc" class="video_edit" id="video_desc_'.$vid->video_id.'">'.$vid->video_desc.'</td>
                            <td contenteditable data-video_id="'.$vid->video_id.'" data-video_type="video_link" class="video_edit" id="video_link_'.$vid->video_id.'">https://youtu.be/'.$vid->video_link.'</td>
                            <td>
                                <img src="'.url('public/uploads/videos/'.$vid->video_image).'" width="150px" height="100px">
                                <input type="file" class="file_img_video" data-video_id="'.$vid->video_id.'" id="file-video-'.$vid->video_id.'" name="file" accept="image/*">
                            </td>
                            <td><iframe width="200" height="200" src="https://www.youtube.com/embed/'.$vid->video_link.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
                            <td>
                                <a href="" data-video_id="'.$vid->video_id.'" onclick="return confirm("Bạn có chắc chắn xóa không?")" class="btn btn-icon icon-left btn-danger btn-delete-video"><i class="fas fa-trash-alt"></i>&nbsp;Xóa</a>
                            </td>
                        </tr>
                    </form>
                ';
            }
        }else{
            $output.='
                    <tr>
                        <td colspan="4">Chưa có video nào cả Sen ơi :))</td>
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

    public function add_video(){
        return view('admin.video.add_video');
    }

    public function insert_video(Request $request){
        $data = $request->all();
        $video = new Video();
        $sub_link = substr($data['video_link'], 17);
        $video->video_title = $data['video_title'];
        $video->video_slug = $data['video_slug'];
        $video->video_link = $sub_link;
        $video->video_desc = $data['video_desc'];
        $get_image = $request->file('file');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode(',',$get_name_image));
            $new_image = $name_image.rand(0,9999999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/videos',$new_image);
            $video->video_image = $new_image;
        }
        $video->save();
    }

    public function update_video(Request $request){
        $data = $request->all();
        $video_id = $data['video_id'];
        $video_edit = $data['video_edit'];
        $video_check = $data['video_check'];
        $video = Video::find($video_id);
        if($video_check == 'video_title'){
            $video->video_title = $video_edit;
        }elseif($video_check == 'video_desc'){
            $video->video_desc = $video_edit;
        }elseif($video_check == 'video_link'){
            $sub_link = substr($video_edit, 17);
            $video->video_link = $sub_link;
        }else{
            $video->video_slug = $video_edit;
        }
        $video->save();
    }

    public function update_video_image(Request $request){
        $get_image = $request->file('file');
        $video_id = $request->video_id;
        if($get_image){
            $video = Video::find($video_id);
            unlink('public/uploads/videos/'.$video->video_image);
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode(',',$get_name_image));
            $new_image = $name_image.rand(0,9999999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/videos',$new_image);
            $video->video_image = $new_image;
            $video->save();
        }
    }

    public function delete_video(Request $request){
        $data = $request->all();
        $video_id = $data['video_id'];
        $video = Video::find($video_id);
        unlink('public/uploads/videos/'.$video->video_image);
        $video->delete();
    }

    public function watch_video(Request $request){
        $video_id = $request->video_id;
        $video = Video::find($video_id);
        $output['video_title'] = $video->video_title;
        $output['video_link'] = '<iframe width="100%" height="400" src="https://www.youtube.com/embed/'.$video->video_link.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        echo json_encode($output);
    }
}
