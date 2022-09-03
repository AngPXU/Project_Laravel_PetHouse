@extends('layout')
@section('content')

<!----------------------------------------------------- Thú cưng mới trang chủ ----------------------------------------------------->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="section-title">
                    <h4>Sản phẩm yêu thích</h4>
                    <a href="{{URL::to('/home-product')}}"><button type="button" class="btn btn-warning"><i class="fas fa-eye"></i>&ensp;Xem thêm</button></a>
                </div>
            </div>
        </div>

        <div class="row property__gallery">
            <div class="col-lg-3 col-md-6 col-sm-3">
                <div class="product__item">
                    <div id="row_wishlist"></div>
                </div>
            </div>
        </div>
        
    </div>
</section>


@endsection