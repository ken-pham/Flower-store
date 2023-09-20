@extends('layout')
@section('content')
<div class="product-details"><!--product-details-->
						@foreach($product_by_id as $key => $product_with_id)
						<div class="col-sm-5">
							
							<div class="view-product">
								<img src="{{URL::to('/public/uploads/product/'.$product_with_id->product_image)}}"  height="210" width="210" />
								
							</div>
							

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="" class="newarrival" alt="" />
								<h2>{{$product_with_id->product_name}}</h2>
								
								<form action="{{URL::to('/save-cart')}}" method="POST">
									{{csrf_field()}}
								<span>
									<span>{{number_format($product_with_id->product_price).' VND'}}</span><br>
									<p><b>Số lượng đặt  </b><input name="sl" type="number" min="1" value="1" max="{{$product_with_id->soluong}}"></p><br>
									<input name="hidden_pro_id" type="hidden" value="{{$product_with_id->product_id}}">
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Thêm vào giỏ hàng
									</button>
								</span>
								</form>
								<p><b>Số lượng còn </b>{{$product_with_id->soluong}}</p>
								@foreach($category as $key =>$cate_1)
									@if($cate_1->category_id == $product_with_id->category_id)
										<p><b>Danh mục </b>{{ $cate_1->category_name}}</p>
									@endif
								@endforeach
								
								@foreach($species_1 as $key =>$species1)
									@if($species1->species_id == $product_with_id->species_id)
										<p><b>Loài hoa  </b>{{  $species1->species_name}}</p>
									@endif
								@endforeach
								
								<p><b>Mô tả </b>{{$product_with_id->product_content}}</p>
							
								<!-- <p><b>Brand:</b> E-SHOPPER</p> -->
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
						@endforeach

					</div><!--/product-details-->
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Một Số Sản Phẩm Gợi Ý</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									@foreach ($pro_by_cate_id as $key => $pro1)	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{URL::to('/public/uploads/product/'.$pro1->product_image)}}" alt="" height="250" width="250" />
													<h2>{{number_format($pro1->product_price).' VND'}}</h2>
													<p>{{$pro1->product_name}}</p>
													<form action="{{URL::to('/save-cart')}}" method="POST">
											{{csrf_field()}}
											<input name="sl" type="hidden"  value="1">
											<input name="hidden_pro_id" type="hidden" value="{{$pro1->product_id}}">
											<button class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
											</form>
												</div>
											</div>
										</div>
									</div>
									@endforeach
								</div>
								<div class="item">
									@foreach ($pro_by_spe_id as $key => $pro2)	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{URL::to('/public/uploads/product/'.$pro2->product_image)}}" alt="" height="250" width="210"/>
													<h2>{{number_format($pro2->product_price).' VND'}}</h2>
													<p>{{$pro2->product_name}}</p>
													<form action="{{URL::to('/save-cart')}}" method="POST">
											{{csrf_field()}}
											<input name="sl" type="hidden"  value="1">
											<input name="hidden_pro_id" type="hidden" value="{{$pro2->product_id}}">
											<button class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
											</form>
												</div>
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
@endsection 