<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | L Cleaned</title>
    <link href="{{ asset('toko/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('toko/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('toko/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('toko/css/price-range.css')}}" rel="stylesheet">
    <link href="{{ asset('toko/css/animate.css')}}" rel="stylesheet">
	<link href="{{ asset('toko/css/main.css')}}" rel="stylesheet">
	<link href="{{ asset('toko/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css">
    	body {
    		background-color: #ffffff;
    	}
    </style>
</head><!--/head-->

<body>
	<header id="header"><!--header-->

		<div style="background : #22bdff;" class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="/"><img src="{{ asset('toko/images/home/logo1fix.png')}}" alt="" /></a>
						</div>
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								@if(Auth::check())
								<li><a style="background :#22bdff;color : #343a40" href="/user/my-account"><i class="fa fa-user"></i> Akun</a></li>
								<li><a style="background : #22bdff;color : #343a40" href="/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
								@else
								<li><a style="background : #22bdff;color : #343a40" href="/login"><i class="fa fa-lock"></i> Login</a></li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	<style type="text/css">
		.header-middle .container .row{
			border-bottom: 1px solid #ffffff;
		}
	</style>
		
	</header><!--/header-->
	
	@yield('content')
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2 ><span style="color : #22bdff">LCleaned</span></h2>
							<p>Online Laundry</p>
						</div>
					</div>
					<div class="col-sm-7">
						
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="{{ asset('toko/images/home/map.png')}}" alt="" />
							<p>Sekeloa Tengah,kota Bandung,Jawa Barat,Indonesia</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="/user/my-account">Order Status</a></li>
								<li><a href="/user/change-password">Ganti Password</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Kategori Barang</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="/?category_id=6">Pakaian</a></li>
								<li><a href="/?category_id=7">Sepatu</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
					
					</div>
			
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2022 L Cleaned. All rights reserved.</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="{{ asset('toko/js/jquery.js')}}"></script>
	<script src="{{ asset('toko/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('toko/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{ asset('toko/js/price-range.js')}}"></script>
    <script src="{{ asset('toko/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{ asset('toko/js/main.js')}}"></script>
    @yield('js')
</body>
</html>