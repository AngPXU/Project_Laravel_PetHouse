@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Banner</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item">Banner</div>
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
                            <a href="{{URL::to('/add-slider')}}" class="btn btn-icon icon-left btn-primary">
                                <i class="fas fa-pen-alt"></i>&nbsp;Thêm banner
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;width:5%;">STT</th>
                                        <th width="40%">Tên slide</th>
                                        <th style="text-align:center;width:20%;">Hình ảnh</th>
                                        <th style="text-align:center;width:15%;">Tình trạng</th>
                                        <th style="text-align:center;width:20%;">Quản lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_slide as $key => $slide)
                                    <tr>
                                        <td style="text-align:center;">{{$slide->slider_id}}</td>
                                        <td><strong>{{$slide->slider_name}}</strong></td>
                                        <td><img src="public/uploads/slider/{{$slide->slider_image}}" width="80%" height="100px"></td>
                                        <td style="text-align:center;">
                                            <?php
                                                if($slide ->slider_status==0){
                                                ?>
                                                <a href="{{URL::to('/unactive-slide/'.$slide->slider_id)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-eye-slash"></i>&nbsp;Ẩn</a>
                                                <?php
                                                }else{
                                                ?>
                                                <a href="{{URL::to('/active-slide/'.$slide->slider_id)}}" class="btn btn-icon icon-left btn-success"><i class="fas fa-eye"></i>&nbsp;Kích hoạt</a>
                                                <?php
                                                }
                                            ?>
                                        </td>
                                        <td style="text-align:center;">
                                            <a href="{{URL::to('/delete-slide/'.$slide->slider_id)}}" onclick="return confirm('Bạn có chắc chắn xóa không?')" class="btn btn-icon icon-left btn-danger"><i class="fas fa-trash-alt"></i>&nbsp;Xóa</a>
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
    </div>
</section>

@endsection