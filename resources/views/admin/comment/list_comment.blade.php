@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Bình luận trong thú cưng</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item">Bình luận</div>
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
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Bình luận</th>
                                        <th>Thời gian</th>
                                        <th>Sản phẩm</th>
                                        <th>Quản lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach($comment as $key => $comm)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td><strong>{{$comm->comment_name}}</strong></td>
                                        <td><strong>{{$comm->comment}}</strong></td>
                                        <td>{{$comm->comment_date}}</td>
                                        <td><a href="{{url('/chi-tiet/'.$comm->product->product_id)}}" target="_blank">{{$comm->product->product_name}}</a></td>
                                        <td style="text-align:center;">
                                            <a href="{{URL::to('/delete-comment/'.$comm->comment_id)}}" onclick="return confirm('Bạn có chắc chắn xóa không?')" class="btn btn-icon icon-left btn-danger"><i class="fas fa-trash-alt"></i>&nbsp;Xóa</a>
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