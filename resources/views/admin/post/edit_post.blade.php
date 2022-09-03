@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Cập nhật bài viết</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item"><a href="{{URL::to('/all-post')}}">Bài viết</a></div>
            <div class="breadcrumb-item">Cập nhật bài viết</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    @foreach($edit_post as $key => $pt)
                    <form class="needs-validation" action="{{URL::to('/update-post/'.$pt->post_id)}}" method="post" enctype="multipart/form-data" novalidate="">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="validationCustom3">Tên bài viết</label>
                                    <input type="text" class="form-control" name="post_title" value="{{$pt->post_title}}" onkeyup="ChangeToSlug();" id="slug" required="">
                                    <div class="invalid-feedback">Vui lòng nhập tên bài viết</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="validationCustom3">Slug</label>
                                    <input type="text" class="form-control" name="post_slug" value="{{$pt->post_slug}}" id="convert_slug">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="custom-phone">Người đăng</label>
                                    <input class="form-control" name="post_poster" value="{{$pt->post_poster}}" required="">
                                    <div class="invalid-feedback">Vui lòng nhập người đang</div>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="validationCustom4">Hình ảnh</label>
                                    <input type="file" class="form-control" name="post_image" multiple required="">
                                    <div class="invalid-feedback">Vui lòng chọn một hình ảnh</div>
                                </div>
                                <div class="form-group col-md-1">
                                    <img src="{{URL::to('public/uploads/post/'.$pt->post_image)}}" width="100" height="100">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="custom-phone">Meta Từ khóa</label>
                                    <input class="form-control" name="post_meta_keywords" value="{{$pt->post_meta_keywords}}" required="">
                                    <div class="invalid-feedback">Vui lòng nhập từ khóa</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="custom-phone">Meta Nội dung</label>
                                    <input class="form-control" name="post_meta_desc" value="{{$pt->post_meta_desc}}" required="">
                                    <div class="invalid-feedback">Vui lòng nhập nội dung</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="validationTextarea1">Tóm tắt</label>
                                    <textarea class="form-control" id="editor1" name="post_desc" required="">{!!$pt->post_desc!!}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="validationTextarea1">Nội dung</label>
                                    <textarea class="form-control" id="editor2" name="post_content" required="">{!!$pt->post_content!!}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="validationSelect2">Danh mục bài viết</label>
                                    <select class="form-control" name="cate_post_id" required="">
                                        @foreach($cate_post as $key => $cate)
                                            @if($cate->cate_post_id==$pt->cate_post_id)
                                                <option selected value="{{$cate->cate_post_id}}">{{$cate->cate_post_name}}</option>
                                            @else
                                                <option value="{{$cate->cate_post_id}}">{{$cate->cate_post_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn một danh mục</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="validationSelect2">Hiển thị</label>
                                    <select class="form-control" name="post_status" required="">
                                        <option value="">---------------------------- Lựa chọn ----------------------------</option>
                                        <option value="0"> Ẩn </option>
                                        <option value="1"> Kích hoạt </option>
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn một tình trạng</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="update_post">Cập nhật</button>
                            <button type="reset" class="btn btn-warning" name="update_post">Đặt lại</button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection