@extends('layout')
@section ('content')
<div class="features_items"><!--features_items-->

<?php

	use Illuminate\Support\Facades\Session;
	use Illuminate\Support\Facades\DB;
	$cus_id = Session::get('custom_id');
	$Check= false;
	

?>
						<h2 class="title text-center">Sản Phẩm Thịnh Hành</h2>
						
						@foreach($all_product as $key =>$product)
							<?php
							$Check= false;
							?>
							@foreach($all_product_like as $key =>$like_pro)
								<?php	
								if($like_pro->custom_id == $cus_id && $like_pro->product_id == $product->product_id)
								{$Check= true;}
						
								?>
							@endforeach	
						<div class="col-sm-4" >
							<div class="product-image-wrapper">
							<a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('/public/uploads/product/'.$product->product_image)}}"  height="250" width="210"/>
											<h2>{{number_format($product->product_price).' VND'}}</h2>
											<p>{{$product->product_name}}</p>
											<form action="{{URL::to('/save-cart')}}" method="POST">
											{{csrf_field()}}
											<input name="sl" type="hidden"  value="1">
											<input name="hidden_pro_id" type="hidden" value="{{$product->product_id}}">
											<button class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</button>
											</form>
										</div>
										
								</div>
							</a>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<?php
											if($Check == false)
											{
										?>
										<form action="{{URL::to('/add-yeu-thich')}}" method="POST" align="center">
										{{csrf_field()}}
										<input name="like_pro_id" type="hidden" value="{{$product->product_id}}"></input>
										<button name="like_product" type="submit"><a ><i class="fa fa-plus-square"></i>Yêu thích</a></button> 										
										</form>
										<?php
											}else{
										?>
										<form action="{{URL::to('/bo-yeu-thich')}}" method="POST" align="center">
										{{csrf_field()}}
										<input name="like_pro_id" type="hidden" value="{{$product->product_id}}"></input>
										<button name="like_product" type="submit"><a ><i class="fa fa-plus-square"></i>Bỏ Yêu thích</a></button> 
										
										</form>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						
						
					</div> <!-- Features Items -->

                    
@endsection                   