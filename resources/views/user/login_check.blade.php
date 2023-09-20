<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | E-Shopper</title>
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
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập tài khoản</h2>
						<form action="{{URL::to('/login')}}" method="POST">
							{{ csrf_field() }}
							<input type="email" name="mail_acc" placeholder="email" />
							<input type="password" name="pass_acc" placeholder="mật khẩu" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Duy trì đăng nhập
							</span>
							<button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{URL::to('/add-customer')}}" method="POST">
                            {{csrf_field()}}
							<input type="text" name="cus_name" placeholder="Họ và tên"/>
                            <input type="text" name="cus_sdt" placeholder="Phone number"/>
							<input type="email" name="cus_mail" placeholder="Email"/>
							<input type="password" name="cus_pass" placeholder="Password"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
</section><!--/form-->
</body>
</html>