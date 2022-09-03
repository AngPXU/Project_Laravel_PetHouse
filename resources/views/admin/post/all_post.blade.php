@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Bài viết</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item">Bài viết</div>
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
                            <a href="{{URL::to('/add-post')}}" class="btn btn-icon icon-left btn-primary">
                                <i class="fas fa-pen-alt"></i>&nbsp;Thêm bài viết
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Hình ảnh</th>
                                        <th>Tên bài viết</th>
                                        <th>Slug</th>
                                        <th>Mô tả</th>
                                        <th>Danh mục</th>
                                        <th>Tình trạng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach($all_post as $key => $postt)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td><img src="public/uploads/post/{{$postt->post_image}}" width="80%" height="100px"></td>
                                        <td>
                                            <strong>{{$postt->post_title}}</strong>
                                            <div class="table-links">
                                                <a href="{{URL::to('/edit-post/'.$postt->post_id)}}" class="text-primary">&nbsp;Sửa</a>
                                                <div class="bullet"></div>
                                                <a href="{{URL::to('/delete-post/'.$postt->post_id)}}" onclick="return confirm('Bạn có chắc chắn xóa không?')" class="text-danger">&nbsp;Xóa</a>
                                            </div>
                                        </td>
                                        <td>{{$postt->post_slug}}</td>
                                        <td>{!!substr_replace($postt->post_desc, "...", 360)!!}</td>
                                        <td>{{$postt->cate_post_id}}</td>
                                        <td style="text-align:center;">
                                            <?php
                                                if($postt->post_status==0){
                                                ?>
                                                <a href="{{URL::to('/unactive-post/'.$postt->post_id)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-eye-slash"></i>&nbsp;Ẩn</a>
                                                <?php
                                                }else{
                                                ?>
                                                <a href="{{URL::to('/active-post/'.$postt->post_id)}}" class="btn btn-icon icon-left btn-success"><i class="fas fa-eye"></i>&nbsp;Kích hoạt</a>
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
                            <form action="{{url('export-csv-post')}}" method="POST">
                                @csrf
                                <input type="submit" value="Xuất file Ecxel" name="export_csv" class="btn btn-icon icon-left btn-primary">
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{url('import-csv-post')}}" method="POST" enctype="multipart/form-data">
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