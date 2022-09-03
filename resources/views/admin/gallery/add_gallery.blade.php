@extends('admin_layout')
@section('admin_content')

<section class="section">
    <div class="section-header">
        <h1>Thêm thư viện ảnh</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></div>
            <div class="breadcrumb-item"><a href="{{URL::to('/all-brand-product')}}">Thú cưng</a></div>
            <div class="breadcrumb-item">Thêm thư viện ảnh</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <form action="{{url('/insert-gallery/'.$pro_id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" id="file" name="file[]" accept="image/*" class="form-control" multiple>
                            <span id="error_gallery"></span>
                            <div class="card-header-action">
                                <input type="submit" name="taianh" value="Tải ảnh" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                    <input type="hidden" name="pro_id" value="{{$pro_id}}" class="pro_id">
                    <form>
                        @csrf
                        <div id="gallery_load">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection