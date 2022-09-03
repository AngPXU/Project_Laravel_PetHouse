@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Danh mục bài viết</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item">Danh mục bài viết</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            <?php
                                $message = Session::get('message');
                                if($message){
                                    echo "<h4><strong>Thông báo:</strong>&nbsp;$message</h4>";
                                    Session::put('message',null);
                                }
                            ?>
                        </h4>
                        <div class="card-header-action">
                            <a href="{{URL::to('/add-category-post')}}" class="btn btn-icon icon-left btn-primary">
                                <i class="fas fa-pen-alt"></i>&nbsp;Thêm danh mục bài viết
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;width:5%;">STT</th>
                                        <th width="60%">Tên loại thú cưng</th>
                                        <th style="text-align:center;width:15%;">Tình trạng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($category_post as $key => $cate_post)
                                    <tr>
                                        <td style="text-align:center;">{{$cate_post->cate_post_id}}</td>
                                        <td>
                                            <strong>{{$cate_post->cate_post_name}}</strong>
                                            <div class="table-links">
                                                <a href="{{URL::to('/edit-category-post/'.$cate_post->cate_post_id)}}" class="text-primary">&nbsp;Sửa</a>
                                                <div class="bullet"></div>
                                                <a href="{{URL::to('/delete-category-post/'.$cate_post->cate_post_id)}}" onclick="return confirm('Bạn có chắc chắn xóa không?')" class="text-danger">&nbsp;Xóa</a>
                                            </div>
                                        </td>
                                        <td style="text-align:center;">
                                            <?php
                                                if($cate_post->cate_post_status==0){
                                                ?>
                                                <a href="{{URL::to('/unactive-category-post/'.$cate_post->cate_post_id)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-eye-slash"></i>&nbsp;Ẩn</a>
                                                <?php
                                                }else{
                                                ?>
                                                <a href="{{URL::to('/active-category-post/'.$cate_post->cate_post_id)}}" class="btn btn-icon icon-left btn-success"><i class="fas fa-eye"></i>&nbsp;Kích hoạt</a>
                                                <?php
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4><i class="fas fa-file-export"></i> Xuất nhập dữ liệu bằng Ecxel</h4>
                        <div class="card-header-action">
                            <form action="{{url('export-csv-catepost')}}" method="POST">
                                @csrf
                                <input type="submit" value="Xuất file Ecxel" name="export_csv" class="btn btn-icon icon-left btn-primary">
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{url('import-csv-catepost')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="input-group ">
                                    <input type="file" class="form-control" name="file" accept=".xlsx">
                                    <div class="input-group-append">
                                        <input type="submit" value="Nhập file Ecxel" name="import_csv" class="btn btn-icon icon-left btn-success">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection