@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Thêm mã giảm giá</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item"><a href="{{URL::to('/list-coupon')}}">Mã giảm giá</a></div>
            <div class="breadcrumb-item">Thêm mã giảm giá</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <form class="needs-validation" action="{{URL::to('/insert-coupon-code')}}" method="post" novalidate="">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="validationCustom3">Tên mã giảm giá</label>
                                    <input type="text" class="form-control" name="coupon_name" placeholder="Hãy nhập tên mã giảm giá mới.." required="">
                                    <div class="invalid-feedback">Vui lòng nhập tên mã giảm giá</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="custom-phone">Mã giảm giá</label>
                                    <input class="form-control" name="coupon_code" placeholder="Hãy nhập mã giảm giá mới.." required="">
                                    <div class="invalid-feedback">Vui lòng nhập mã giảm giá</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="custom-phone">Số lượng mã</label>
                                    <input class="form-control" name="coupon_time" placeholder="Hãy nhập số lượng mã giảm giá mới.." required="">
                                    <div class="invalid-feedback">Vui lòng nhập số lượng mã giảm giá</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="custom-phone">Số % giảm</label>
                                    <input class="form-control" name="coupon_number" placeholder="Hãy nhập số % giảm giá mới.." required="">
                                    <div class="invalid-feedback">Vui lòng nhập số % mã giảm giá</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="custom-phone">Ngày phát hành</label>
                                    <input type="date" id="datepicker" name="coupon_date_start" class="form-control" required="">
                                    <div class="invalid-feedback">Vui lòng chọn ngày bắt đầu</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="custom-phone">Ngày kết thúc</label>
                                    <input type="date" id="datepicker" name="coupon_date_end" class="form-control" required="">
                                    <div class="invalid-feedback">Vui lòng chọn ngày kết thúc</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputState">Tình trạng hiển thị</label>
                                    <select class="form-control" name="coupon_condition" required="">
                                        <option value="">---------------------------- Lựa chọn ----------------------------</option>
                                        <option value="0">Giảm theo %</option>
                                        <option value="1">Giảm theo tiền</option>
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn tính năng mã</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="add_coupon">Thêm</button>
                            <button type="reset" class="btn btn-warning" name="add_coupon">Đặt lại</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection