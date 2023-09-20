<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('public/fontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/fontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/fontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{('public/fontend/img/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> hoabonmua@gmail.</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									Hà Nội	
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Hồ Chí Minh</a></li>
									<li><a href="#">Các Tỉnh Khác</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									VND
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Dollar</a></li>
									
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">

								<li><a href="{{URL::to('/yeu-thich')}}"><i class="fa fa-star"></i> Danh sách yêu thích</a></li>
								<?php

									use Illuminate\Support\Facades\Session;
									 
									$customer_id = Session::get('custom_id');
									$shipping_id = Session::get('shipping_id');
									if($customer_id!=NULL && $shipping_id==NULL){
								?>
								<li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
								<?php
									}elseif($customer_id!=NULL && $shipping_id!=NULL){
								?>
								<li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
								<?php
									}else{
								?>
								<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
								<?php
									}
								?>
								<li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								<?php
									$customer_id = Session::get('custom_id');
									if($customer_id!=NULL){
								?>
								<li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Đăng Xuất</a></li>
								<?php
									}else{
								?>
								<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Đăng Nhập</a></li>
								<?php
									}
								?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/trang-chu')}}" class="active">Trang chủ</a></li>
								<!-- <li class="dropdown"><a href="#">Sinh nhật<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Tất cả</a></li>
										<li><a href="product-details.html">Bạn bè/Đồng nghiệp</a></li> 
										<li><a href="checkout.html">Bố/Mẹ</a></li> 
										<li><a href="cart.html">Vợ/Chồng</a></li> 
										<li><a href="login.html">Anh/Chị/EM</a></li> 
                                    </ul>
                                </li>  -->
								<li class="dropdown"><a href="#">Sự kiện<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										@foreach($event_1 as $key => $event1)
                                        <li><a href="{{URL::to('/su-kien/'.$event1->event_id)}}">{{$event1 -> event_name}}</a></li>
										@endforeach

                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Loại Hoa & Cây<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										@foreach($species_1 as $key => $species1)
                                        <li><a href="{{URL::to('/loai-hoa/'.$species1->species_id)}}">{{$species1->species_name}}</a></li>
										@endforeach

                                    </ul>
                                </li>
								<li><a href="contact-us.html">Blog</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-5">
						<form action="{{URL::to('Tim-kiem')}}" method="POST">
							{{csrf_field()}}
						<div class="search_box pull-right">
							<input type="text" name="key_word" placeholder="Tìm kiếm"/>
							<input type="submit" style="margin-top: 0; color:black" name="search_item" class="btn btn-primary btn-sm" value="Tìm kiếm">
						</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>HOA</span> Bốn Mùa</h1>
									<h2>Niềm hạnh phúc ngọt ngào từ những điều bé xinh</h2>
									<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p> -->
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Hoa</span> Sinh Nhật</h1>
									<h2>Hãy làm cho ngày sinh nhật của người thân yêu trở nên khó quên với hoa, bánh ngọt, bóng bay và nhiều món quà khác!</h2>
									<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p> -->
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Hoa</span> Vĩnh Cửu</h1>
									<h2>Kỉ niệm một tình yêu vĩnh cửu</h2>
									<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p> -->
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container" >
			<div class="row">
				<div class="col-sm-3" style=' width :25%'>
					<div class="left-sidebar">
						<h2>Danh mục Sản Phẩm</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							@foreach($category as $key => $cate)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate ->category_name}}</a></h4>
								</div>
							</div>
							@endforeach
							
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Mức Giá</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#"> 100.000đ - 499.000đ</a></li>
									<li><a href="#"> 500.000đ - 1.999.000đ</a></li>
									<li><a href="#"> Trên 2.000.000đ</a></li>
									
									<!-- <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li> -->
								</ul>
							</div>
						</div><!--/brands_products-->
						
						
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
				
				@yield('content')
							
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2" style="width:45%">
						<div class="companyinfo">
							<h2><span>HOA</span> BỐN MÙA</h2>
							<p>TP. Hồ Chí Minh: Châu Thới, Phường 15, Quận 10</p><br>
							<p>Hà Nội: An Dương, Phường Yên Phụ, Quận Tây Hồ</p><br>
							<p>Mua hoa tươi không lo về giá. Giao hàng miễn phí trong ngày, khu vực nội thành Hà Nội, TpHCM. Thu tiền mặt tận nơi, chuyển khoản hoặc thanh toán qua thẻ. Lựa chọn hoàn hảo cho những dịp đặc biệt: Sinh Nhật, Kỉ Niệm, Lãng Mạn, Ngày Phụ Nữ, Ngày Valentine, Ngày của Mẹ.</p>
						</div>
					</div>
					<!-- <div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe2.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe3.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe4.png" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div> -->
					<div class="col-sm-3" style="width:20%">
						<div class="address">
							<img src="images/home/map1.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
					<div class="col-sm-3" style="width:20%">
						<div class="address">
							<img src="images/home/map2.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2" style="width:33%">
						<div class="single-widget">
							<h2>Chăm Sóc Khách Hàng</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Liên Hệ Với Chúng Tôi</a></li>
								<li><a href="#">Câu Hỏi Thường Gặp</a></li>
								<li><a href="#">Phương Thức Thanh Toán</a></li>
								<li><a href="#">Điều Khoản Và Điều Kiện</a></li>
								<li><a href="#">Chính Sách Bảo Mật</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2" style="width:33%">
						<div class="single-widget">
							<h2>Bạn Có Câu Hỏi ?</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><b>Điện Thoại</b></li>
								<li><p>0332552880</p></li>
								<li><p>Thứ Hai - Chủ Nhật (8:00 - 19:00)</p></li>
								<li><b>Email</b></li>
								<li><a href="#">hoabonmua@gmail.com</a></li>
								<li><b>Truyền Thông</b></li>
								<li><a href="#">maketinghoabonmua@gmail.com</a></li>
								<!-- <li><a href="#">Gift Cards</a></li>
								<li><a href="#">Shoes</a></li> -->
							</ul>
						</div>
					</div>
					<!-- <div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Terms of Use</a></li>
								<li><a href="#">Privecy Policy</a></li>
								<li><a href="#">Refund Policy</a></li>
								<li><a href="#">Billing System</a></li>
								<li><a href="#">Ticket System</a></li>
							</ul>
						</div>
					</div> -->
					<!-- <div class="col-sm-2">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Company Information</a></li>
								<li><a href="#">Careers</a></li>
								<li><a href="#">Store Location</a></li>
								<li><a href="#">Affillate Program</a></li>
								<li><a href="#">Copyright</a></li>
							</ul>
						</div>
					</div> -->
					<div class="col-sm-3 col-sm-offset-1" style="width:25%">
						<div class="single-widget">
							<h2>About Shopper</h2>
							<form action="" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="{{asset('public/fontend/js/jquery.js')}}"></script>
	<script src="{{asset('public/fontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/fontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/fontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/fontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/fontend/js/main.js')}}"></script>
</body>
</html>