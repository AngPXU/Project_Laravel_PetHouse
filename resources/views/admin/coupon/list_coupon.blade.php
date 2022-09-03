@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Mã giảm giá</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item">Mã giảm giá</div>
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
                            <a href="{{URL::to('/send-coupon')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-mail-bulk"></i>&nbsp;Gửi MGG</a>
                            <a href="{{URL::to('/insert-coupon')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-pen-alt"></i>&nbsp;Thêm mã giảm giá</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th>Thôn tin mã</th>
                                        <th>Mã giảm</th>
                                        <th>Số lượng giảm</th>
                                        <th>Ngày phát</th>
                                        <th>Ngày hết hạn</th>
                                        <th>Điều kiện</th>
                                        <th>Số giảm</th>
                                        <th>Tình trạng</th>
                                        <th>Hết hạn</th>
                                        <th>Quản lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($coupon as $key => $cou)
                                    <tr>
                                        <td>{{$cou->coupon_name}}</td>
                                        <td>{{$cou->coupon_code}}</td>
                                        <td>{{$cou->coupon_time}}</td>
                                        <td>{{$cou->coupon_date_start}}</td>
                                        <td>{{$cou->coupon_date_end}}</td>
                                        <td>
                                            <?php
                                                if($cou->coupon_condition==0){
                                                ?>
                                                Giảm theo %
                                                <?php
                                                }else{
                                                ?>
                                                Giảm theo tiền
                                                <?php
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($cou->coupon_condition==0){
                                                ?>
                                                Giảm {{$cou->coupon_number}} %
                                                <?php
                                                }else{
                                                ?>
                                                Giảm {{$cou->coupon_number}} k
                                                <?php
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($cou->coupon_status==1){
                                                ?>
                                                Đang kích hoạt
                                                <?php
                                                }else{
                                                ?>
                                                Hết hạn
                                                <?php
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            @if($cou->coupon_date_end >= $today)
                                                Còn hạn
                                            @else
                                                Hết hạn
                                            @endif
                                        </td>
                                        <td style="text-align:center;">
                                            <a href="{{URL::to('/delete-coupon/'.$cou->coupon_id)}}" onclick="return confirm('Bạn có chắc chắn xóa không?')" class="btn btn-icon icon-left btn-danger"><i class="fas fa-trash-alt"></i>&nbsp;Xóa</a>
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