@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Thêm danh mục bài viết</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item"><a href="{{URL::to('/all-category-post')}}">Danh mục bài viết</a></div>
            <div class="breadcrumb-item">Thêm danh mục bài viết</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <form class="needs-validation" action="{{URL::to('/save-category-post')}}" method="post" novalidate="">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="validationCustom3">Tên danh mục</label>
                                    <input type="text" class="form-control" name="cate_post_name" placeholder="Nhập tên danh mục bài viết mới.." onkeyup="ChangeToSlug();" id="slug" required="">
                                    <div class="invalid-feedback">Vui lòng nhập tên danh mục bài viết</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="custom-phone">Slug</label>
                                    <input class="form-control" name="cate_post_slug" id="convert_slug">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="validationTextarea1">Mô tả danh mục</label>
                                    <textarea class="form-control" name="cate_post_desc" placeholder="Nhập mô tả danh mục bài viết.." required=""></textarea>
                                    <div class="invalid-feedback">Vui lòng nhập mô tả danh mục</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputState">Tình trạng hiển thị</label>
                                    <select class="form-control" name="cate_post_status" required="">
                                        <option value="">---------------------------- Lựa chọn ----------------------------</option>
                                        <option value="0"> Ẩn </option>
                                        <option value="1"> Kích hoạt </option>
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn một tình trạng hiển thị</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="add_post_cate">Thêm</button>
                            <button type="reset" class="btn btn-warning" name="add_post_cate">Đặt lại</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection