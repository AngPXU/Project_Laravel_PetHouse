@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Đơn hàng</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item">Đơn hàng</div>
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
                                        <th style="text-align:center;width:5%;">STT</th>
                                        <th style="width:45%;">Mã đơn hàng</th>
                                        <th style="text-align:center;width:15%;">Tình trạng</th>
                                        <th style="text-align:center;width:15%;">Hủy đơn</th>
                                        <th style="text-align:center;width:15%;">Ngày đặt</th>
                                        <th style="text-align:center;width:20%;">Quản lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach($order as $key => $ord)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$ord->order_code}}</td>
                                        <td>
                                            @if($ord->order_status == 1)
                                                <p style="color:rgb(255, 208, 0);"><i class="fas fa-box"></i> Đơn hàng mới</p>
                                            @elseif($ord->order_status == 2)
                                                <p style="color:rgb(21, 255, 0);"><i class="fas fa-check"></i> Đã xử lý</p>
                                            @else
                                                <p style="color:rgb(241, 7, 7);"><i class="fas fa-ban"></i> Đã bị hủy</p>
                                            @endif
                                        </td>
                                        <td>{{$ord->order_destroy}}</td>
                                        <td>{{$ord->created_at}}</td>
                                        <td style="text-align:center;">
                                            <a href="{{URL::to('/view-order/'.$ord->order_code)}}" class="btn btn-icon icon-left btn-info"><i class="fas fa-eye"></i>&nbsp;Xem</a>
                                            <a href="{{URL::to('/delete-order/'.$ord->order_code)}}" onclick="return confirm('Bạn có chắc chắn xóa không?')" class="btn btn-icon icon-left btn-danger"><i class="fas fa-trash-alt"></i>&nbsp;Xóa</a>
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