@extends('layout')
@section('content')

<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Trang chủ</a>
					<span>{{$meta_title}}</span>
				</div>
			</div>
		</div>
	</div>
</div>

<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="section-title">
                    <h4>Lịch sử đơn hàng</h4>
                </div>
            </div>
        </div>
        <div class="row property__gallery">
            <div class="col-lg-12 col-md-6 col-sm-12">
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Tình trạng</th>
                            <th>Ngày đặt</th>
                            <th>Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach($getorder as $key => $ord)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$ord->order_code}}</td>
                            <td>
                                @if($ord->order_status == 1)
                                    <p style="color:rgb(255, 208, 0);">Đang chờ xử lý</p>
                                @elseif($ord->order_status == 2)
                                    <p style="color:rgb(21, 255, 0);">Đã xử lý - Đã giao hàng</p>
                                @else
                                    <p style="color:rgb(241, 7, 7);">Đã hủy đơn</p>
                                @endif
                            </td>
                            <td>{{$ord->created_at}}</td>
                            <td>
                                <a href="{{URL::to('/view-history-order/'.$ord->order_code)}}" class="btn btn-icon icon-left btn-info"><i class="fas fa-eye"></i>&nbsp;Xem</a>
                                <!-- Button trigger modal -->
                                @if($ord->order_status != 3 && $ord->order_status != 2)
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#huydon">
                                    <i class="fas fa-trash-alt"></i>&nbsp;Hủy đơn
                                </button>
                                @endif
                                
                                <!-- Modal -->
                                <form>
                                    @csrf
                                    <div class="modal fade" id="huydon" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle"><b>Bạn muốn hủy đơn hàng thật à 😢😢😢</b></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            <textarea class="lydohuydon" placeholder="Bạn có thể cho chúng tôi biết lý do bạn hủy đơn hàng được không ạ... (Bắt buộc)" rows="5" required style="width:100%;background:rgb(189, 189, 189);"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                            <button type="button" onclick="Huydonhang(this.id)" id="{{$ord->order_code}}" class="btn btn-danger">Vẫn hủy</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection