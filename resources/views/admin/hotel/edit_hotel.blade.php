@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Thêm khách sạn thú cưng</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item"><a href="{{URL::to('/hotel-manager')}}">Khách sạn thú cưng</a></div>
            <div class="breadcrumb-item">Thêm khách sạn thú cưng</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    @foreach($edit_hotel as $key => $ht)
                    <form class="needs-validation" action="{{URL::to('/update-hotel/'.$ht->hotel_id)}}" method="post" enctype="multipart/form-data" novalidate="">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Tên thú cưng</label>
                                    <input type="text" class="form-control" name="hotel_tenpet" value="{{$ht->hotel_tenpet}}" required="">
                                    <div class="invalid-feedback">Vui lòng nhập tên thú cưng</div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Giống</label>
                                    <input type="text" class="form-control" name="hotel_giong" value="{{$ht->hotel_giong}}" required="">
                                    <div class="invalid-feedback">Vui lòng nhập giống thú cưng</div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="validationCustom4">Hình ảnh</label>
                                    <input type="file" class="form-control" name="hotel_anh">
                                </div>
                                <div class="form-group col-md-1">
                                    <img src="{{URL::to('public/uploads/hotel/'.$ht->hotel_anh)}}" width="100" height="100">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Phòng</label>
                                    <input type="text" class="form-control" name="hotel_phong" value="{{$ht->hotel_phong}}" required="">
                                    <div class="invalid-feedback">Vui lòng nhập số phòng khách sạn</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Thời gian gửi</label>
                                    <input type="text" class="form-control" name="hotel_thoigiangui" value="{{$ht->hotel_thoigiangui}}" required="">
                                    <div class="invalid-feedback">Vui lòng nhập thời gian gửi</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Tên khách</label>
                                    <input type="text" class="form-control" name="hotel_tenkhach" value="{{$ht->hotel_tenkhach}}" required="">
                                    <div class="invalid-feedback">Vui lòng nhập tên khách gửi</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Số điện thoại</label>
                                    <input type="text" class="form-control" name="hotel_sdt" value="{{$ht->hotel_sdt}}" required="">
                                    <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Lời nhắn</label>
                                    <textarea class="form-control" name="hotel_loinhan" required="">{{$ht->hotel_loinhan}}</textarea>
                                    <div class="invalid-feedback">Vui lòng nhập lời nhắn</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputState">Tình trạng</label>
                                    <select class="form-control" name="hotel_trangthai" required="">
                                        <option value="0"> Ẩn </option>
                                        <option value="1"> Kích hoạt </option>
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn một tình trạng hiển thị</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="add_hotel">Cập nhật</button>
                            <button type="reset" class="btn btn-warning" name="resert_hotel">Đặt lại</button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection