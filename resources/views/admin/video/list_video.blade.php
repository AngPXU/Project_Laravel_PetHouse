@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Video</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item">Video</div>
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
                            <a href="{{URL::to('/add-video')}}" class="btn btn-icon icon-left btn-primary">
                                <i class="fas fa-pen-alt"></i>&nbsp;Thêm video
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <div id="video_load">
                                
                            </div>
                            
                            
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="video_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Xem trước Video</h5>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
  {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#video_model">Xem video</button> --}}



@endsection