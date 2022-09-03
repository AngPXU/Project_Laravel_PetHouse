@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Cập nhật thú cưng</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item"><a href="{{URL::to('/all-product')}}">Thú cưng</a></div>
            <div class="breadcrumb-item">Cập nhật thú cưng</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    @foreach($edit_product as $key => $pro)
                    <form class="needs-validation" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data" novalidate="">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Tên thú cưng</label>
                                    <input type="text" class="form-control" name="product_name" value="{{$pro->product_name}}" onkeyup="ChangeToSlug();" id="slug" required="">
                                    <div class="invalid-feedback">Vui lòng nhập tên thú cưng</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Slug</label>
                                    <input type="text" class="form-control" name="product_slug" value="{{$pro->product_slug}}" id="convert_slug" required="">
                                    <div class="invalid-feedback">Vui lòng nhập tên thú cưng</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Số lượng</label>
                                    <input type="text" class="form-control" name="product_quantity" value="{{$pro->product_quantity}}" required="">
                                    <div class="invalid-feedback">Vui lòng điền một số</div>
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="inputPassword4">Hình ảnh</label>
                                    <input type="file" class="form-control" name="product_image" multiple required="">
                                    <div class="invalid-feedback">Vui lòng chọn một hình ảnh</div>
                                </div>
                                <div class="form-group col-md-1">
                                    <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" width="100" height="100">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Giá bán ra</label>
                                    <input type="text" class="form-control" name="product_price" value="{{$pro->product_price}}" required="">
                                    <div class="invalid-feedback">Vui lòng điền một số</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Giá nhập vào</label>
                                    <input type="text" class="form-control" name="price_cost" value="{{$pro->price_cost}}" required="">
                                    <div class="invalid-feedback">Vui lòng điền một số</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Mô tả thú cưng</label>
                                    <textarea class="form-control" id="editor1" name="product_desc" required="">{{$pro->product_desc}}</textarea>
                                    <div class="invalid-feedback">Vui lòng nhập mô tả thú cưng</div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Nội dung thú cưng</label>
                                    <textarea class="form-control" id="editor2" name="product_content" required="">{{$pro->product_content}}</textarea>
                                    <div class="invalid-feedback">Vui lòng nhập nội dung thú cưng</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputPassword4">Tags thú cưng</label>
                                    <input type="text" class="form-control" data-role="tagsinput" name="product_tags" value="{{$pro->product_tags}}">
                                </div>   
                                <div class="form-group col-md-4">   
                                    <label for="inputState">Danh mục thú cưng</label>
                                    <select class="form-control" name="product_cate" required="">
                                        @foreach($cate_product as $key => $cate)
                                            @if($cate->category_id==$pro->category_id)
                                                <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @else
                                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn một danh mục thú cưng</div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Loại thú cưng</label>
                                    <select class="form-control" name="product_brand" required="">
                                        @foreach($brand_product as $key => $brand)
                                            @if($cate->category_id==$pro->category_id)
                                                <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                            @else
                                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn một loại thú cưng</div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Tình trạng</label>
                                    <select class="form-control" name="product_status" required="">
                                        <option value="">---------------------------- Lựa chọn ----------------------------</option>
                                        <option value="0"> Ẩn </option>
                                        <option value="1"> Kích hoạt </option>
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn một tình trạng hiển thị</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="update_product">Cập nhật</button>
                            <button type="reset" class="btn btn-warning" name="update_product">Đặt lại</button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection