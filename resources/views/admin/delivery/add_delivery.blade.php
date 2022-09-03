@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Thêm phí vận chuyển</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item"><a href="{{URL::to('/delivery')}}">Phí vận chuyển</a></div>
            <div class="breadcrumb-item">Thêm phí vận chuyển</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <form class="needs-validation" novalidate="">
                        @csrf
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputState">Chọn thành phố</label>
                                    <select class="form-control choose city" name="city" id="city" required="">
                                        <option>----------Chọn thành phố----------</option>
                                        @foreach($city as $key => $ci)
                                        <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn một thành phố</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputState">Chọn quận huyện</label>
                                    <select class="form-control province choose" name="province" id="province" required="">
                                        <option>----------Chọn quận huyện----------</option>
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn một quận huyện</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputState">Chọn xã phườn</label>
                                    <select class="form-control wards" name="wards" id="wards" required="">
                                        <option>----------Chọn xã phường----------</option>
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn một xã phường</div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputEmail4">Phí vận chuyển</label>
                                    <input type="text" name="fee_ship" class="form-control fee_ship" placeholder="Nhập phí vận chuyển.." required="">
                                    <div class="invalid-feedback">Vui lòng nhập phí vận chuyển</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-primary add_delivery" name="add_delivery">Thêm</button>
                            <button type="reset" class="btn btn-warning">Đặt lại</button>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
    </div>
    <div id="load_delivery">
                
    </div>  
</section>

@endsection
