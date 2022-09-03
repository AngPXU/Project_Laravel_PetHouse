<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Models\Hotel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
session_start();

class HotelController extends Controller
{
    public function hotel_manager(){
        $all_hotel = Hotel::orderby('hotel_id', 'desc')->get();
        $all_hotel_1 = Hotel::where('hotel_phong', '1')->take(1);
        return view('admin.hotel.hotel_manager')->with(compact('all_hotel', 'all_hotel_1'));
    }

    public function add_hotel(){
        return view('admin.hotel.add_hotel');
    }

    public function insert_hotel(Request $request){
        $data = $request->all();
        $post = new Hotel();
        $post->hotel_phong = $data['hotel_phong'];
        $post->hotel_tenpet = $data['hotel_tenpet'];
        $post->hotel_giong = $data['hotel_giong'];
        $post->hotel_thoigiangui = $data['hotel_thoigiangui'];
        $post->hotel_tenkhach = $data['hotel_tenkhach'];
        $post->hotel_sdt = $data['hotel_sdt'];
        $post->hotel_loinhan = $data['hotel_loinhan'];
        $post->hotel_trangthai = $data['hotel_trangthai'];

        $get_image = $request->file('hotel_anh');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();      //Lấy tên của hình ảnh
            $name_image = current(explode(',',$get_name_image));        //Tên đầu tiên của hình ảnh
            $new_image = $name_image.rand(0,9999999).'.'.$get_image->getClientOriginalExtension();  // Cộng cho random số phía sau đuôi
            $get_image->move('public/uploads/hotel',$new_image);         //Gửi hình ảnh với "tên mới" đến đường dẫn lưu file 
            $post->hotel_anh = $new_image;                             //Lưu "tên mới"
            $post->save();                                              //Lưu bài viết
            Session::put('message','Thêm thành công');                  //Thông báo
            return Redirect::to('hotel-manager');                            //Trả về 
        }else{
            Session::put('message','Vui lòng thêm hình ảnh');           //Nếu không có ảnh trả về thông báo yêu cầu thêm
            return redirect()->back(); 
        }
    }

    public function unactive_hotel($ht_id){
        DB::table('tbl_hotel')->where('hotel_id',$ht_id)->update(['hotel_trangthai'=>1]);
        Session::put('message','Mở phòng mới thành công');
        return Redirect::to('hotel-manager');
    }

    public function active_hotel($ht_id){
        DB::table('tbl_hotel')->where('hotel_id',$ht_id)->update(['hotel_trangthai'=>0]);
        Session::put('message','Bỏ phòng thành công');
        return Redirect::to('hotel-manager');
    }

    public function delete_hotel($hotel_id){
        $hotel = Hotel::find($hotel_id);
        $hotel_anh = $hotel->hotel_anh;
        if($hotel_anh){
            $path = 'public/uploads/hotel/'.$hotel_anh;
            unlink($path);
        }
        $hotel->delete();
        Session::put('message','Xóa khách sạn thành công');
        return Redirect::to('hotel-manager');
    }

    public function edit_hotel($ht_id){
        $all_hotel = Hotel::orderby('hotel_id', 'desc')->get();
        $edit_hotel = Hotel::where('hotel_id',$ht_id)->get();
        return view('admin.hotel.edit_hotel')->with(compact('all_hotel','edit_hotel'));
    }

    public function update_hotel(Request $request, $ht_id){
        $data = array();
        $data['hotel_phong'] = $request->hotel_phong;
        $data['hotel_tenpet'] = $request->hotel_tenpet;
        $data['hotel_giong'] = $request->hotel_giong;
        $data['hotel_thoigiangui'] = $request->hotel_thoigiangui;
        $data['hotel_tenkhach'] = $request->hotel_tenkhach;
        $data['hotel_sdt'] = $request->hotel_sdt;
        $data['hotel_loinhan'] = $request->hotel_loinhan;
        $data['hotel_trangthai'] = $request->hotel_trangthai;
        $get_image = $request->file('hotel_anh');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode(',',$get_name_image));
            $new_image = $name_image.rand(0,9999999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/hotel',$new_image);
            $data['hotel_anh'] = $new_image;
            DB::table('tbl_hotel')->where('hotel_id',$ht_id)->update($data);
            Session::put('message','Cập nhật thú cưng thành công');
            return Redirect::to('hotel-manager');
        }
        DB::table('tbl_hotel')->where('hotel_id',$ht_id)->update($data);
        Session::put('message','Cập nhật thú cưng thành công');
        return Redirect::to('hotel-manager');
    }
}
