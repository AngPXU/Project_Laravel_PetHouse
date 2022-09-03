@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Thú cưng</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item">Thú cưng</div>
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
                        <div class="card-header-action">
                            <a href="{{URL::to('/add-product')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-pen-alt"></i>&nbsp;Thêm thú cưng</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên thú cưng</th>
                                        <th>Hình ảnh</th>
                                        <th>Số lượng</th>
                                        <th>Giá bán</th>
                                        <th>Giá nhập</th>
                                        <th>Danh mục</th>
                                        <th>Loại</th>
                                        <th>Tình trạng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach($all_product as $key => $pro)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td style="text-align:center;">{{$i}}</td>
                                        <td>
                                            <strong>{{$pro->product_name}}</strong>
                                            <div class="table-links">
                                                <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="text-primary">Sửa</a>
                                                <div class="bullet"></div>
                                                <a href="{{URL::to('/delete-product/'.$pro->product_id)}}" onclick="return confirm('Bạn có chắc chắn xóa không?')" class="text-danger">Xóa</a>
                                              </div>
                                        </td>
                                        <td><img src="public/uploads/product/{{$pro->product_image}}" width="80%" height="100px"></td>
                                        <td>
                                            @if($pro->product_quantity >= 1)
                                                {{$pro->product_quantity}}
                                            @elseif($pro->product_quantity <= 0)
                                                <span style="color:red;font-weight:bold;">Hết hàng</span>
                                            @endif
                                        </td>
                                        <td>{{number_format($pro->product_price,0,',','.').' đ'}}</td>
                                        <td>{{number_format($pro->price_cost,0,',','.').' đ'}}</td>
                                        <td>{{$pro->category_name}}</td>
                                        <td>{{$pro->brand_name}}</td>
                                        <td style="text-align:center;">
                                            <a href="{{url('add-gallery/'.$pro->product_id)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-image"></i>&nbsp;Thêm ảnh</a>
                                            <?php
                                                if($pro->product_status==0){
                                                ?>
                                                <a href="{{URL::to('/unactive-product/'.$pro->product_id)}}" class="btn btn-icon icon-left btn-dark"><i class="fas fa-eye-slash"></i>&nbsp;Tạm xóa</a>
                                                <?php
                                                }elseif($pro->product_status==1){
                                                ?>
                                                <a href="{{URL::to('/active-product/'.$pro->product_id)}}" class="btn btn-icon icon-left btn-success"><i class="fas fa-eye"></i>&nbsp;Kích hoạt</a>
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
                            <form action="{{url('export-csv-product')}}" method="POST">
                                @csrf
                                <input type="submit" value="Xuất file Ecxel" name="export_csv" class="btn btn-icon icon-left btn-primary">
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{url('import-csv-product')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
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