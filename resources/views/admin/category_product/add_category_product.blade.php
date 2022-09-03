@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Thêm danh mục thú cưng</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item"><a href="{{URL::to('/all-category-product')}}">Danh mục thú cưng</a></div>
            <div class="breadcrumb-item">Thêm danh mục thú cưng</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <form class="needs-validation" action="{{URL::to('/save-category-product')}}" method="get" novalidate="">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Tên danh mục</label>
                                    <input type="text" name="category_product_name" class="form-control" placeholder="Nhập tên danh mục mới.." onkeyup="ChangeToSlug();" id="slug" required="">
                                    <div class="invalid-feedback">Vui lòng nhập tên danh mục thú cưng</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Slug</label>
                                    <input type="text" name="category_product_slug" class="form-control" id="convert_slug" required="">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Từ khóa danh mục</label>
                                    <input type="text" class="form-control" name="category_product_meta_desc" placeholder="Nhập từ khóa tìm kiếm danh mục mới.." required="">
                                    <div class="invalid-feedback">Vui lòng nhập từ khóa danh mục thú cưng</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Mô tả danh mục</label>
                                    <textarea class="form-control" name="category_product_desc" placeholder="Nhập mô tả danh mục mới.." required=""></textarea>
                                    <div class="invalid-feedback">Vui lòng nhập mô tả danh mục thú cưng</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Thuộc danh mục</label>
                                    <select class="form-control selectric" name="category_parent" required="">
                                        <option selected value="0">------------------ Danh mục cha ------------------</option>
                                        @foreach($category as $key => $val)
                                        <option value="{{$val->category_id}}"> {{$val->category_name}} </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn tình trạng danh mục thú cưng</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Tình trạng hiển thị</label>
                                    <select class="form-control selectric" name="category_product_status" required="">
                                        <option selected disabled value="">------------------ Lựa chọn ------------------</option>
                                        <option value="0"> Ẩn </option>
                                        <option value="1"> Kích hoạt </option>
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn tình trạng danh mục thú cưng</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="add_category_product">Thêm</button>
                            <button type="reset" class="btn btn-warning" name="add_category_product">Đặt lại</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection