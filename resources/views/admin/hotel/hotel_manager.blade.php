@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Khách sạn thú cưng</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item"><a href="{{URL::to('/hotel-manager')}}">Khách sạn</a></div>
        </div>
    </div>
    <div class="section-body">
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
                <div class="card-header-action">
                    <a href="{{URL::to('/add-hotel')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-pen-alt"></i>&nbsp;Thêm khách sạn</a>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            @foreach($all_hotel as $key => $ht)
            <div class="col-12 col-md-4 col-lg-4">
                <article class="article article-style-c">
                    <div class="article-header">
                        <div class="article-image" data-background="public/uploads/hotel/{{$ht->hotel_anh}}" alt="">
                        </div>
                    </div>
                    <div class="article-details">
                        <div class="article-category"><a href="#">Phòng {{$ht->hotel_phong}}</a> <div class="bullet"></div> <a href="#">Thời gian gửi {{$ht->hotel_thoigiangui}} <div class="bullet"></div> <a href="#">SDT: {{$ht->hotel_sdt}}</a></div>
                        <div class="article-title">
                            <h2><a href="#">Tên: {{$ht->hotel_tenpet}} <div class="bullet"></div> Giống: {{$ht->hotel_giong}}</a></h2>
                        </div>
                        <p>{{$ht->hotel_loinhan}}</p>
                        <div class="article-user">
                            <img alt="image" src="{{asset('public/uploads/hotel/anhuser.jpg')}}">
                            <div class="article-user-details">
                                <div class="user-detail-name">
                                    <a href="#">{{$ht->hotel_tenkhach}}</a>
                                </div>
                                <div class="text-job">Khách hàng</div>
                            </div>
                        </div>
                        <div class="article-cta" style="margin-top:10px;">
                            <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-icon icon-left btn-success"><i class="fas fa-video"></i> Check cam</a>
                            <a href="{{URL::to('/delete-hotel/'.$ht->hotel_id)}}" onclick="return confirm('Bạn có chắc chắn xóa không?')" class="btn btn-icon icon-left btn-danger"><i class="fas fa-trash"></i> Xóa</a>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
        </div> --}}
        <div class="row">
            @foreach($all_hotel as $key => $ht)
            <div class="col-12 col-md-4 col-lg-4">
                <article class="article article-style-c">
                    <div class="article-header">
                        <?php
                            if($ht->hotel_trangthai == 0){
                            ?>
                            <div class="article-image" data-background="public/uploads/hotel/anhtrong.png" alt=""></div>
                            <?php
                            }elseif($ht->hotel_trangthai == 1){
                            ?>
                            <div class="article-image" data-background="public/uploads/hotel/{{$ht->hotel_anh}}" alt=""></div>
                            <?php
                            }
                        ?>
                    </div>
                    <div class="article-details">
                        <div class="article-category"><a href="#">{{$ht->hotel_phong}}</a> <div class="bullet"></div> <a href="#">Thời gian gửi {{$ht->hotel_thoigiangui}} <div class="bullet"></div> <a href="#">SDT: {{$ht->hotel_sdt}}</a></div>
                        <div class="article-title">
                            <h2><a href="#">Tên: {{$ht->hotel_tenpet}} <div class="bullet"></div> Giống: {{$ht->hotel_giong}}</a></h2>
                        </div>
                        <p>{{$ht->hotel_loinhan}}</p>
                        <div class="article-user">
                            <div class="article-user-details">
                                <div class="user-detail-name">
                                    <a href="#">{{$ht->hotel_tenkhach}}</a>
                                </div>
                                <div class="text-job">Khách hàng</div>
                            </div>
                        </div>
                        <div class="article-cta" style="margin-top:10px;">
                            <?php
                                if($ht->hotel_trangthai == 0){
                                ?>
                                
                                <?php
                                }elseif($ht->hotel_trangthai == 1){
                                ?>
                                <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-icon icon-left btn-success"><i class="fas fa-video"></i> Check cam</a>
                                <?php
                                }
                            ?>
                            <a href="{{URL::to('/edit-hotel/'.$ht->hotel_id)}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-edit"></i> Thay đổi</a>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Video</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <video width="100%" height="340" controls="">
            <source src="{{asset('public/backend/img/videopet.mp4')}}" type="video/mp4">
          </video>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>

@endsection