@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Thêm loại thú cưng</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item"><a href="{{URL::to('/all-brand-product')}}">Loại thú cưng</a></div>
            <div class="breadcrumb-item">Thêm loại thú cưng</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <form class="needs-validation" action="{{URL::to('/save-brand-product')}}" method="get" novalidate="">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Tên loại thú cưng</label>
                                    <input type="text" class="form-control" name="brand_product_name" placeholder="Nhập tên loại thú cưng mới.." required="">
                                    <div class="invalid-feedback">Vui lòng nhập tên loại thú cưng</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Từ khóa loại thú cưng</label>
                                    <input class="form-control" name="brand_product_meta_desc" placeholder="Nhập từ khóa tìm kiếm loại danh mục mới.." required="">
                                    <div class="invalid-feedback">Vui lòng nhập từ khóa loại thú cưng</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Mô tả loại thú cưng</label>
                                    <textarea class="form-control" name="brand_product_desc" placeholder="Nhập mô tả loại thú cưng.." required=""></textarea>
                                    <div class="invalid-feedback">Vui lòng nhập mô tả loại thú cưng</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputState">Tình trạng hiển thị</label>
                                    <select class="form-control" name="brand_product_status" required="">
                                        <option value="">---------------------------- Lựa chọn ----------------------------</option>
                                        <option value="0"> Ẩn </option>
                                        <option value="1"> Kích hoạt </option>
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn một tình trạng hiển thị</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="add_brand_product">Thêm</button>
                            <button type="reset" class="btn btn-warning" name="add_brand_product">Đặt lại</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection