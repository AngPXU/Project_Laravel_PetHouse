@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Liên hệ của người dùng</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item">Liên hệ</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4><strong><i class="fas fa-bell"></i>&nbsp;Thông báo:</strong>
                            <?php
                                $message = Session::get('message');
                                if($message){
                                    echo "<h4 style='color:#fbaf32;'>$message</h4>";
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
                                        <th>Tên người dùng</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Lời nhắn</th>
                                        <th>Thời gian</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach($contact as $key => $cont)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td><strong>{{$cont->contact_name}}</strong></td>
                                        <td>{{$cont->contact_email}}</td>
                                        <td>{{$cont->contact_phone}}</td>
                                        <td>{{$cont->contact_notes}}</td>
                                        <td>{{$cont->created_at}}</td>
                                        <td>
                                            <?php
                                                if($cont->contact_status == 0){
                                                ?>
                                                <a href="{{URL::to('/unactive-contact/'.$cont->contact_id)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-phone-slash"></i>&nbsp;Chưa liên hệ</a>
                                                <?php
                                                }else{
                                                ?>
                                                <a href="{{URL::to('/active-contact/'.$cont->contact_id)}}" class="btn btn-icon icon-left btn-success"><i class="fas fa-phone"></i>&nbsp;Đã liên hệ</a>
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
    </div>
</section>

@endsection