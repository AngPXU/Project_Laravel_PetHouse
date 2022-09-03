@extends('layout')
@section('content')

<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Trang chủ</a>
					<span>{{$meta_title}}</span>
				</div>
			</div>
		</div>
	</div>
</div>

<section class="shop spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3">
				<div class="shop__sidebar">
					<div class="sidebar__categories">
						<div class="section-title">
							<h4>Danh mục</h4>
						</div>
						<div class="categories__accordion">
							<div class="accordion" id="accordionExample">
								<div class="card">
									<div class="card-heading active">
										<a data-toggle="collapse" data-target="#collapseOne">Thú cưng</a>
									</div>
									<div id="collapseOne" class="collapse show" data-parent="#accordionExample">
										<div class="card-body">
											<ul>
												@foreach($category as $key => $cate)
													<li><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
												@endforeach
											</ul>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-heading">
										<a data-toggle="collapse" data-target="#collapseTwo">Loại</a>
									</div>
									<div id="collapseTwo" class="collapse" data-parent="#accordionExample">
										<div class="card-body">
											<ul>
												@foreach($brand as $key => $brand_br)
													<li><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand_br->brand_id)}}">{{$brand_br->brand_name}}</a></li>
												@endforeach
											</ul>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-heading">
										<a data-toggle="collapse" data-target="#collapseThree">Phụ kiện</a>
									</div>
									<div id="collapseThree" class="collapse" data-parent="#accordionExample">
										<div class="card-body">
											<ul>
												@foreach($accessory as $key => $acry)
													<li><a href="{{URL::to('/danh-muc-phu-kien/'.$acry->accessory_id)}}">{{$acry->accessory_name}}</a></li>
												@endforeach
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9">
				<div class="row">
					@foreach($accessory_by_id as $key => $acry)
					<div class="col-lg-4 col-md-6">
						<form>
							@csrf
							<input type="hidden" value="{{$acry->acsr_id}}" class="cart_product_id_{{$acry->acsr_id}}">
							<input type="hidden" value="{{$acry->acsr_name}}" class="cart_product_name_{{$acry->acsr_id}}">
							<input type="hidden" value="{{$acry->acsr_image}}" class="cart_product_image_{{$acry->acsr_id}}">
							<input type="hidden" value="{{$acry->acsr_price}}" class="cart_product_price_{{$acry->acsr_id}}">
							<input type="hidden" value="1" class="cart_product_qty_{{$acry->acsr_id}}">
							<div class="product__item">
								<div class="product__item__pic set-bg" data-setbg="{{URL::to('public/uploads/accessory/'.$acry->acsr_image)}}">
									<ul class="product__hover">
										<li><a href="{{URL::to('/chi-tiet-phu-kien/'.$acry->acsr_id)}}" title="Xem chi tiết sản phẩm"><span><i class="fas fa-eye"></i></span></a></li>
										<li><a class="button_wishlist" id="{{$acry->acsr_id}}" onclick="add_wishlist(this.id);" title="Thêm vào yêu thích"><span><i class="fas fa-heart"></i></span></a></li>
										<li><a type="button" data-toggle="modal" data-target="#xemnhanh" class="xemnhanh" data-id_product="{{$acry->acsr_id}}" title="Xem nhanh sản phẩm"><span><i class="fas fa-expand-alt"></i></span></a></li>
									</ul>
								</div>
								<div class="product__item__text">
									<h6><a href="{{URL::to('/chi-tiet-phu-kien/'.$acry->acsr_id)}}">{{$acry->acsr_name}}</a></h6>
									<i>Mã SP: {{$acry->acsr_id}}</i>
									<div class="product__price">
										<input name="qty" type="hidden" min="1" value="1" />
										<input name="productid_hidden" type="hidden" value="{{$acry->acsr_id}}" />
										<button type="button" class="btn-product add-to-cart" data-id_product="{{$acry->acsr_id}}" name="add-to-cart"><i class="fas fa-cart-plus"></i> | {{number_format($acry->acsr_price,0,'.','.').' đ'}}</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					@endforeach
					{{-- {!! $category_by_id->links() !!} --}}
					<div class="col-lg-12 text-center">
						<div class="pagination__option">
							<a href="#"><i class="fa fa-angle-left"></i></a>
							<a href="#" active>1</a>
							<a href="#">2</a>
							<a href="#">3</a>
							<a href="#"><i class="fa fa-angle-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection