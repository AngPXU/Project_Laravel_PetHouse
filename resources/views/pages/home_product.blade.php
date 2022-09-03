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
					<form>
						<div class="filter-range-wrap">
							<div class="range-slider">
								<div class="price-input">
									<label for="amount">Lọc từ:</label>
									<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
									<input type="hidden" name="start_price" id="start_price">
									<input type="hidden" name="end_price" id="end_price">
									
									<div id="slider-range" style="height:10px;"></div>
								</div>
							</div>
						</div><br><br>
						<button type="submit" name="filter_price">Lọc</button>
					</form>
				</div>
				<div class="sidebar__filter">
					<div class="section-title">
						<h4>Lọc</h4>
					</div>
					<div class="filter-range-wrap">
						<form>
							@csrf
							<select name="sort" id="sort" class="form-control">
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
					@foreach($all_product as $key => $product)
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
							<li class="page-item">{{$all_product->links()}}</li>
						</ul> 
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Modal -->
<div class="modal fade" id="xemnhanh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document" style="width: 70%">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title product_quickview_title" id="" style="color:#fbaf32;font-size:25px;font-weight:500;">
			  <span id="product_quickview_title"></span>
		  </h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		  <div class="row">
			  <div class="col-md-5">
				  <span id="product_quickview_image"></span>
				  <span id="product_quickview_gallery"></span>
			  </div>
			  <div class="col-md-7">
				  <h2><span id="product_quickview_title"></span></h2>
				  <p><i>Mã ID: <span id="product_quickview_id"></span></i></p>
				  <span>
					  <h3 style="font-size:25px;font-weight:bold;">Giá: <span id="product_quickview_price"></span></h3>
					  <label>Số lượng: </label>
					  <input name="qty" type="number" min="1" class="cart_product_qty_" value="1">
					  <input type="hidden" name="productid_hidden" value="">
				  </span>
				  <p class="quickview">Mô tả sản phẩm: </p>
				  <fieldset>
					  <span id="product_quickview_desc"></span>
					  <span id="product_quickview_content"></span>
				  </fieldset>
				  <input type="button" value="Mua ngay" class="btn btn-primary add-to-cart" data-id_product="" name="add-to-cart">
			  </div>
		  </div>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="button" class="btn btn-primary">Save changes</button>
		</div>
	  </div>
	</div>
  </div>

@endsection