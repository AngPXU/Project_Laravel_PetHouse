@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Chào <?php
            $name = Session::get('admin_name');
            if($name){
                echo $name;
            }
        ?> ,chúc bạn một ngày tốt lành ^-^</h1>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <a href="{{URL::to('/all-product')}}">
                    <div class="card-icon bg-primary"><i class="fas fa-box"></i></div>
                </a>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>THÚ CƯNG</h4>
                    </div>
                    <div class="card-body"><?php echo $product_ad?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <a href="{{URL::to('/manage-order')}}">
                    <div class="card-icon bg-danger"><i class="fas fa-boxes"></i></div>
                </a>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>ĐƠN HÀNG</h4>
                    </div>
                    <div class="card-body"><?php echo $order_ad?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <a href="{{URL::to('/all-post')}}">
                    <div class="card-icon bg-warning"><i class="far fa-file"></i></div>
                </a>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>BÀI VIẾT</h4>
                    </div>
                    <div class="card-body"><?php echo $post_ad?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>KHÁCH HÀNG</h4>
                    </div>
                    <div class="card-body"><?php echo $customer_ad?></div>
                </div>
            </div>
        </div>                  
    </div>
    <div class="row">
        <div class="col-lg-9 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Biểu đồ theo doanh số</h4>
                </div>
                <div class="card-body">
                    <div id="myfirstchart" style="height: 333px;"></div>
                    <div class="statistic-details mt-1">
                        <div class="statistic-details-item">
                          <div class="text-small text-muted"><span style="color:#7a92a3"><i class="fas fa-square"></i></span></div>
                          <div class="detail-name">Doanh số</div>
                        </div>
                        <div class="statistic-details-item">
                          <div class="text-small text-muted"><span style="color:#4da74d"><i class="fas fa-square"></i></span></div>
                          <div class="detail-name">Lợi nhuận</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Thống kê đơn hàng</h4>
                </div>
                <div class="card-body">
                    <form autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>Từ ngày: </label>
                            <input type="date" id="datepicker" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Đến ngày: </label>
                            <input type="date" id="datepicker2" class="form-control">
                        </div>
                        <div class="buttons">
                            <input type="button" id="btn-dashboard-filter" class="btn btn-icon icon-left btn-primary" value="Lọc kết quả" style="width:100%">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Lọc theo: </label>
                            <select class="form-control dashboard-filter">
                                <option>---------- Chọn ----------</option>
                                <option value="7ngay">7 ngày qua</option>
                                <option value="thangnay">Tháng này</option>
                                <option value="thangtruoc">Tháng trước</option>
                                <option value="365ngayqua">Theo năm</option>
                            </select>
                        </div>
                        <br><br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h4>Thống kê số lượng</h4>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                  <table class="table table-striped">
                    <tr>
                      <th>STT</th>
                      <th>Tên danh mục</th>
                      <th>Tổng số lượng</th>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td class="font-weight-600"><a href="{{URL::to('/all-product')}}">Sản phẩm</a></td>
                      <td>
                        <a href="{{URL::to('/all-product')}}" class="btn btn-primary"><?php echo $product_ad?> sản phẩm</a>
                      </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td class="font-weight-600"><a href="{{URL::to('/all-post')}}">Bài viết</a></td>
                        <td>
                          <a href="{{URL::to('/all-post')}}" class="btn btn-primary"><?php echo $post_ad?> bài viết</a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td class="font-weight-600"><a href="{{URL::to('/manage-order')}}">Đơn hàng</a></td>
                        <td>
                          <a href="{{URL::to('/manage-order')}}" class="btn btn-primary"><?php echo $order_ad?> đơn hàng</a>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td class="font-weight-600"><a href="{{URL::to('/users')}}">Khách hàng</a></td>
                        <td>
                          <a href="{{URL::to('/users')}}" class="btn btn-primary"><?php echo $customer_ad?> khách hàng</a>
                        </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Thống kê truy cập</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <tr>
                                <th>Đang online</th>
                                <th>Tổng tháng trước</th>
                                <th>Tổng tháng này</th>
                                <th>Tổng một năm</th>
                                <th>Tổng truy cập</th>
                            </tr>
                            <tr>
                                <td>{{$visitor_count}}</td>
                                <td>{{$visitor_last_month_count}}</td>
                                <td>{{$visitor_this_month_count}}</td>
                                <td>{{$visitor_year_count}}</td>
                                <td>{{$visitor_total}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Top 5 sản phẩm được xem nhiều nhất</h4>
                </div>
                <div class="card-body">
                    <div class="summary">
                        <div class="summary-item">
                            <ul class="list-unstyled list-unstyled-border">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($product_views as $key => $pro)
                                @php
                                    $i++;
                                @endphp
                                <li class="media">
                                    <a href="#">
                                        <div class="media-title" style="padding-right:10px;"><a href="#">{{$i}}</a></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="media-right">{{$pro->product_views}} lượt xem</div>
                                        <div class="media-title"><a target="_blank" href="{{url('/chi-tiet/'.$pro->product_id)}}">{{$pro->product_name}}</a></div>
                                        <div class="text-muted text-small">Số ID <a href="#">{{$pro->product_id}}</a> <div class="bullet"></div> AnhKlee</div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Top 5 bài viết được xem nhiều nhất</h4>
                </div>
                <div class="card-body">
                    <div class="summary">
                        <div class="summary-item">
                            <ul class="list-unstyled list-unstyled-border">
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($post_views as $key => $post)
                                @php
                                    $i++;
                                @endphp
                                <li class="media">
                                    <a href="#">
                                        <div class="media-title" style="padding-right:10px;"><a href="#">{{$i}}</a></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="media-right">{{$post->post_views}} lượt xem</div>
                                        <div class="media-title"><a target="_blank" href="{{url('/bai-viet/'.$post->post_slug)}}">{{$post->post_title}}</a></div>
                                        <div class="text-muted text-small">Số ID <a href="#">{{$post->post_id}}</a> <div class="bullet"></div> AnhKlee</div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection