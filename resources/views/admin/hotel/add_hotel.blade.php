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
                    <form class="needs-validation" action="{{URL::to('/insert-hotel')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Tên thú cưng</label>
                                    <input type="text" class="form-control" name="hotel_tenpet" placeholder="Nhập tên thú cưng mới.." value="Trống">
                                    <div class="invalid-feedback">Vui lòng nhập tên thú cưng</div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Giống</label>
                                    <input type="text" class="form-control" name="hotel_giong" placeholder="Nhập giống thú cưng.." value="Trống">
                                    <div class="invalid-feedback">Vui lòng nhập giống thú cưng</div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Hình ảnh</label>
                                    <input type="file" class="form-control" name="hotel_anh">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Phòng</label>
                                    <input type="text" class="form-control" name="hotel_phong" placeholder="Nhập số phòng khách sạn.." value="Trống">
                                    <div class="invalid-feedback">Vui lòng nhập số phòng khách sạn</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Thời gian gửi</label>
                                    <input type="text" class="form-control" name="hotel_thoigiangui" placeholder="Nhập thời gian gửi.." value="Trống">
                                    <div class="invalid-feedback">Vui lòng nhập thời gian gửi</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Tên khách</label>
                                    <input type="text" class="form-control" name="hotel_tenkhach" placeholder="Nhập tên khách gửi.." value="Trống">
                                    <div class="invalid-feedback">Vui lòng nhập tên khách gửi</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Số điện thoại</label>
                                    <input type="text" class="form-control" name="hotel_sdt" placeholder="Nhập số điện thoại.." value="Trống">
                                    <div class="invalid-feedback">Vui lòng nhập số điện thoại</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Lời nhắn</label>
                                    <textarea class="form-control" name="hotel_loinhan" placeholder="Nhập lời nhắn..">Trống</textarea>
                                    <div class="invalid-feedback">Vui lòng nhập lời nhắn</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputState">Tình trạng</label>
                                    <select class="form-control" name="hotel_trangthai">
                                        <option value="">---------------------------- Lựa chọn ----------------------------</option>
                                        <option value="0"> Ẩn </option>
                                        <option value="1" selected> Kích hoạt </option>
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn một tình trạng hiển thị</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="add_hotel">Thêm</button>
                            <button type="reset" class="btn btn-warning" name="resert_hotel">Đặt lại</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection