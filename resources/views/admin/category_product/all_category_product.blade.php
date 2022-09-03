@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Danh mục thú cưng</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item">Danh mục thú cưng</div>
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
                            <a href="{{URL::to('/add-category-product')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-pen-alt"></i>&nbsp;Thêm danh mục thú cưng</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên danh mục thú cưng</th>
                                        <th>Thuộc danh mục</th>
                                        <th>Tình trạng</th>
                                    </tr>
                                </thead>
                                <style type="text/css">
                                    #category_order .ui-state-highlight {
                                        padding: 24px;
                                        background-color: #fbefc4;
                                        border: 1px dotted #ccc;
                                        cursor: move;
                                        margin-top: 12px;
                                    }
                                </style>
                                <tbody id="category_order">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach($all_category_product as $key => $cate_pro)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr id="{{$cate_pro->category_id}}">
                                        <td style="text-align:center;">{{$i}}</td>
                                        <td>
                                            <strong>{{$cate_pro->category_name}}</strong>
                                            <div class="table-links">
                                                <a href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}" class="text-primary">&nbsp;Sửa</a>
                                                <div class="bullet"></div>
                                                <a href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}" onclick="return confirm('Bạn có chắc chắn xóa không?')" class="text-danger">&nbsp;Xóa</a>
                                            </div>
                                        </td>
                                        <td style="text-align:center;">
                                            @if($cate_pro->category_parent == 0)
                                                <i class="fas fa-folder"></i>&ensp;Danh mục cha
                                            @else
                                                @foreach($category_product as $key => $cate_sup_pro)
                                                    @if($cate_sup_pro->category_id == $cate_pro->category_parent)
                                                        <i class="fas fa-folder-open"></i>&ensp;Danh mục con của <br>{{$cate_sup_pro->category_name}}
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                        <td style="text-align:center;">
                                            <?php
                                                if($cate_pro ->category_status==0){
                                                ?>
                                                <a href="{{URL::to('/unactive-category-product/'.$cate_pro->category_id)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-eye-slash"></i>&nbsp;Ẩn</a>
                                                <?php
                                                }else{
                                                ?>
                                                <a href="{{URL::to('/active-category-product/'.$cate_pro->category_id)}}" class="btn btn-icon icon-left btn-success"><i class="fas fa-eye"></i>&nbsp;Kích hoạt</a>
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
                            <form action="{{url('export-csv')}}" method="POST">
                                @csrf
                                <input type="submit" value="Xuất file Ecxel" name="export_csv" class="btn btn-icon icon-left btn-primary">
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{url('import-csv')}}" method="POST" enctype="multipart/form-data">
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

<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cách nhập dữ liệu cho danh mục thú cưng</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
                <tbody>
                    <thead>
                        <tr>
                            <th scope="col">Hàng dọc và ngang trong Ecxel</th>
                          <th scope="col">A</th>
                          <th scope="col">B</th>
                          <th scope="col">C</th>
                          <th scope="col">D</th>
                        </tr>
                    </thead>
                  <tr>
                    <td>1</td>
                    <td>Chó Alaska</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Đã hiểu</button>
        </div>
      </div>
    </div>
  </div>

@endsection