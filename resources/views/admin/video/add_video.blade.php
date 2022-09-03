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
                    <form novalidate="">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="validationCustom3">Tên video</label>
                                    <input type="text" class="form-control video_title" name="video_title" placeholder="Nhập tên video mới.." onkeyup="ChangeToSlug();" id="slug" required="">
                                    <div class="invalid-feedback">Vui lòng nhập tên video</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="custom-phone">Slug</label>
                                    <input class="form-control video_slug" name="video_slug" id="convert_slug">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="validationTextarea1">Link video</label>
                                    <input class="form-control video_link" name="video_link" placeholder="Nhập link video.." required="">
                                    <div class="invalid-feedback">Vui lòng nhập link video</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Hình ảnh video</label>
                                    <input type="file" class="form-control" name="file" id="file_img_video" accept="image/*" required="">
                                    <div class="invalid-feedback">Vui lòng chọn một hình ảnh</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="validationTextarea1">Mô tả video</label>
                                    <textarea class="form-control video_desc" name="video_desc" placeholder="Nhập mô tả video.." required=""></textarea>
                                    <div class="invalid-feedback">Vui lòng nhập mô tả video</div>
                                </div>
                                {{-- <div class="form-group col-md-12">
                                    <label for="inputState">Tình trạng hiển thị</label>
                                    <select class="form-control" name="cate_post_status" required="">
                                        <option value="">---------------------------- Lựa chọn ----------------------------</option>
                                        <option value="0"> Ẩn </option>
                                        <option value="1"> Kích hoạt </option>
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn một tình trạng hiển thị</div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary btn_add_video" name="add_video">Thêm</button>
                            <button type="reset" class="btn btn-warning">Đặt lại</button>
                        </div>
                        <div id="notify">
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection