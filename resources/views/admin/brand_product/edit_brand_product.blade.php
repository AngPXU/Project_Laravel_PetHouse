@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Cập nhật loại thú cưng</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item"><a href="{{URL::to('/all-brand-product')}}">Loại thú cưng</a></div>
            <div class="breadcrumb-item">Cập nhật loại thú cưng</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    @foreach($edit_brand_product as $key => $edit_value)
                    <form class="needs-validation" action="{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}" method="get" novalidate="">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Tên loại thú cưng</label>
                                    <input type="text" class="form-control" name="brand_product_name" value="{{$edit_value->brand_name}}" required="">
                                    <div class="invalid-feedback">Vui lòng nhập tên loại thú cưng</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Từ khóa danh mục</label>
                                    <input class="form-control" name="brand_product_meta_desc" value="{{$edit_value->meta_keywords}}" required="">
                                    <div class="invalid-feedback">Vui lòng nhập từ khóa loại thú cưng</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Mô tả danh mục</label>
                                    <textarea class="form-control" name="brand_product_desc" required>{{$edit_value->brand_desc}}</textarea>
                                    <div class="invalid-feedback">Vui lòng nhập mô tả loại thú cưng</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputState">Tình trạng hiển thị</label>
                                    <select class="form-control" name="brand_product_status" required="">
                                        <option value="0"> Ẩn </option>
                                        <option selected value="1"> Kích hoạt </option>
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn tình trạng danh mục thú cưng</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="update_brand_product">Cập nhật</button>
                            <button type="reset" class="btn btn-warning" name="update_brand_product">Đặt lại</button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection