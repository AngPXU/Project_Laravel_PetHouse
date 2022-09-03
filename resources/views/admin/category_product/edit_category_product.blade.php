@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Cập nhật danh mục thú cưng</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item"><a href="{{URL::to('/all-category-product')}}">Danh mục thú cưng</a></div>
            <div class="breadcrumb-item">Cập nhật danh mục thú cưng</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    @foreach($edit_category_product as $key => $edit_value)
                    <form class="needs-validation" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="get" novalidate="">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Tên danh mục</label>
                                    <input type="text" name="category_product_name" class="form-control" value="{{$edit_value->category_name}}" onkeyup="ChangeToSlug();" id="slug" required="">
                                    <div class="invalid-feedback">Vui lòng nhập tên danh mục thú cưng</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Slug</label>
                                    <input type="text" name="category_product_slug" class="form-control" value="{{$edit_value->category_slug}}" id="convert_slug" required="">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Từ khóa danh mục</label>
                                    <input type="text" class="form-control" name="category_product_meta_desc" value="{{$edit_value->meta_keywords}}" required="">
                                    <div class="invalid-feedback">Vui lòng nhập từ khóa danh mục thú cưng</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Mô tả danh mục</label>
                                    <textarea class="form-control" name="category_product_desc" required="">{{$edit_value->category_desc}}</textarea>
                                    <div class="invalid-feedback">Vui lòng nhập mô tả danh mục thú cưng</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Thuộc danh mục</label>
                                    <select class="form-control selectric" name="category_parent" required="">
                                        <option value="0">------------------ Danh mục cha ------------------</option>
                                        @foreach($category as $key => $val)
                                            @if($val->category_parent == 0)
                                                <option {{$val->category_id == $edit_value->category_id ? 'selected' : ''}} value="{{$val->category_id}}"> {{$val->category_name}} </option>
                                            @endif
                                            @foreach($category as $key => $val2)
                                                @if($val2->category_parent == $val->category_id)
                                                    <option {{$val2->category_id == $edit_value->category_id ? 'selected' : ''}} value="{{$val2->category_id}}">---- {{$val2->category_name}} </option>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn tình trạng danh mục thú cưng</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Tình trạng hiển thị</label>
                                    <select class="form-control" name="category_product_status" required="">
                                        <option value="0"> Ẩn </option>
                                        <option selected value="1"> Kích hoạt </option>
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn tình trạng danh mục thú cưng</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="update_category_product">Cập nhật</button>
                            <button type="reset" class="btn btn-warning" name="update_category_product">Đặt lại</button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection