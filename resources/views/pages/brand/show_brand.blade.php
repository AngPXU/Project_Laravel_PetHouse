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



								
								@foreach($category as $key => $cate)
								@if($cate->category_parent == 0)
								<div class="card">
									<div class="card-heading active">
										<a data-toggle="collapse" data-target="#{{$cate->category_slug}}">{{$cate->category_name}}</a>
									</div>
									<div id="{{$cate->category_slug}}" class="collapse	" data-parent="#accordionExample">
										<div class="card-body">
											<ul>
												@foreach($category as $key => $cate_sub)
													@if($cate_sub->category_parent == $cate->category_id)
														<li><a href="{{URL::to('/danh-muc-san-pham/'.$cate_sub->category_id)}}">{{$cate_sub->category_name}}</a></li>
													@endif
												@endforeach
											</ul>
										</div>
									</div>
								</div>
								@endif
								@endforeach






								<div class="card">
									<div class="card-heading">
										<a data-toggle="collapse" data-target="#collapseTwo">LOẠI</a>
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
							</div>
						</div>
					</div>
				</div>
				<div class="sidebar__filter">
					<div class="section-title">
						<h4>Lọc theo giá</h4>
					</div>
					<div class="filter-range-wrap">
						<div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
						data-min="33" data-max="99"></div>
						<div class="range-slider">
							<div class="price-input">
								<p>Giá:</p>
								<input type="text" id="minamount">
								<input type="text" id="maxamount">
							</div>
						</div>
					</div>
					<a href="#">Lọc</a>
				</div>
				<div class="sidebar__filter">
					<div class="section-title">
						<h4>Lọc</h4>
					</div>
					<div class="filter-range-wrap">
						<form>
							@csrf
							<select name="sort_brand" id="sort_brand" class="form-control">
								<option value="{{Request::url()}}?sort_by=none">------------- Lọc theo -------------</option>
								<option value="{{Request::url()}}?sort_by=tang_dan">----------- Giá tăng dần -----------</option>
								<option value="{{Request::url()}}?sort_by=giam_dan">----------- Giá giảm dần -----------</option>
								<option value="{{Request::url()}}?sort_by=kytu_az">---------- Ký tự từ A -> Z ----------</option>
								<option value="{{Request::url()}}?sort_by=kytu_za">---------- Ký tự từ Z -> A ----------</option>
							</select>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9">
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="section-title">
							<h4>Danh mục: {{$brand_name->brand_name}}</h4>
							<a><button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
								<i class="fas fa-filter"></i>&ensp;Lọc theo loại sản phẩm
							</button></a>
							<div class="collapse" id="collapseExample">
								<div class="card-body">
									@php
										$brand_id = [];
										$brand_arr = [];
										if(isset($_GET['brand'])){
											$brand_id = $_GET['brand'];
										}else{
											$brand_id = $brand_name->brand_id.",";
										}
										$brand_arr = explode(",",$brand_id);
									@endphp
									@foreach($brand as $key => $bra)
										<div class="form-check form-check-inline" style="padding-left:5px;padding-right:5px;">
											<input class="form-check-input brand-filter" type="checkbox" name="brand-filter" value="{{$bra->brand_id}}" 
											data-filters="brand" {{in_array($bra->brand_id, $brand_arr) ? 'checked' : ''}}>
											<label class="form-check-label">{{$bra->brand_name}}</label>
										</div>
									@endforeach
								</div>
							  </div>
						</div>
					</div>
					@foreach($brand_by_id as $key => $product)
					<div class="col-lg-4 col-md-6">
						<form>
							@csrf
							<input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">
							<input type="hidden" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">
							<input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">
							<input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">
							<input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">
							<div class="product__item">
								<div class="product__item__pic set-bg" data-setbg="{{URL::to('public/uploads/product/'.$product->product_image)}}">
									<ul class="product__hover">
										<li><a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}" title="Xem chi tiết sản phẩm"><span><i class="fas fa-eye"></i></span></a></li>
										<li><a class="button_wishlist" id="{{$product->product_id}}" onclick="add_wishlist(this.id);" title="Thêm vào yêu thích"><span><i class="fas fa-heart"></i></span></a></li>
										<li><a type="button" data-toggle="modal" data-target="#xemnhanh" class="xemnhanh" data-id_product="{{$product->product_id}}" title="Xem nhanh sản phẩm"><span><i class="fas fa-expand-alt"></i></span></a></li>
									</ul>
								</div>
								<div class="product__item__text">
									<h6><a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">{{$product->product_name}}</a></h6>
									<i>Mã SP: {{$product->product_id}}</i>
									<div class="product__price">
										<input name="qty" type="hidden" min="1" value="1" />
										<input name="productid_hidden" type="hidden" value="{{$product->product_id}}" />
										<button type="button" class="btn-product add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart"><i class="fas fa-cart-plus"></i> | {{number_format($product->product_price,0,'.','.').' đ'}}</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					@endforeach
				</div>
				<div class="row">
					<div class="col-12">
						<ul class="pagination justify-content-center">
							<li class="page-item">{{$brand_by_id->links()}}</li>
						</ul> 
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection