@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Thêm banner</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item"><a href="{{URL::to('/all-brand-product')}}">Banner</a></div>
            <div class="breadcrumb-item">Thêm banner</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <form class="needs-validation" action="{{URL::to('/insert-slider')}}" method="post" enctype="multipart/form-data" novalidate="">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Tên slide</label>
                                    <input type="text" class="form-control" name="slider_name" placeholder="Nhập tên slide mới.." required="">
                                    <div class="invalid-feedback">Vui lòng nhập tên slide</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Hình ảnh</label>
                                    <input type="file" class="form-control" name="slider_image" required="">
                                    <div class="invalid-feedback">Vui lòng chọn một hình ảnh</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputState">Tình trạng hiển thị</label>
                                    <select class="form-control" name="slider_status" required="">
                                        <option value="">---------------------------- Lựa chọn ----------------------------</option>
                                        <option value="0"> Ẩn </option>
                                        <option value="1"> Kích hoạt </option>
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn một tình trạng hiển thị</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="add_slider">Thêm</button>
                            <button type="reset" class="btn btn-warning" name="resert_slider">Đặt lại</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection