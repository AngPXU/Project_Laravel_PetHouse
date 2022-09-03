@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Loại thú cưng</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item">Loại thú cưng</div>
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
                            <a href="{{URL::to('/add-brand-product')}}" class="btn btn-icon icon-left btn-primary">
                                <i class="fas fa-pen-alt"></i>&nbsp;Thêm loại thú cưng
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;width:5%;">STT</th>
                                        <th width="60%">Tên loại thú cưng</th>
                                        <th style="text-align:center;width:15%;">Tình trạng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($all_brand_product as $key => $brand_pro)
                                    <tr>
                                        <td style="text-align:center;">{{$brand_pro->brand_id}}</td>
                                        <td>
                                            <strong>{{$brand_pro->brand_name}}</strong>
                                            <div class="table-links">
                                                <a href="{{URL::to('/edit-brand-product/'.$brand_pro->brand_id)}}" class="text-primary">&nbsp;Sửa</a>
                                                <div class="bullet"></div>
                                                <a href="{{URL::to('/delete-brand-product/'.$brand_pro->brand_id)}}" onclick="return confirm('Bạn có chắc chắn xóa không?')" class="text-danger">&nbsp;Xóa</a>
                                            </div>
                                        </td>
                                        <td style="text-align:center;">
                                            <?php
                                                if($brand_pro ->brand_status==0){
                                                ?>
                                                <a href="{{URL::to('/unactive-brand-product/'.$brand_pro->brand_id)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-eye-slash"></i>&nbsp;Ẩn</a>
                                                <?php
                                                }else{
                                                ?>
                                                <a href="{{URL::to('/active-brand-product/'.$brand_pro->brand_id)}}" class="btn btn-icon icon-left btn-success"><i class="fas fa-eye"></i>&nbsp;Kích hoạt</a>
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
                            <form action="{{url('export-csv-brand')}}" method="POST">
                                @csrf
                                <input type="submit" value="Xuất file Ecxel" name="export_csv" class="btn btn-icon icon-left btn-primary">
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{url('import-csv-brand')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="input-group ">
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