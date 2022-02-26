@extends('index')

@section('content')
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
							<div  class="item active">
								<div  class="col-sm-6">
									<img src="{{ asset('shop/images/men1.png')}}" class="girl img-responsive" alt="" />
									
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('shop/images/men2.png')}}" class="girl img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<img src="{{ asset('shop/images/men3.png')}}" class="girl img-responsive" alt="" />
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('shop/images/men4.png')}}" class="girl img-responsive" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<img src="{{ asset('shop/images/men5.png')}}" class="girl img-responsive" alt="" />
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('shop/images/men6.png')}}" class="girl img-responsive" alt="" />
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
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2><a style="color : #22bdff">Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							@foreach($category as $value)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="/?category_id={{ $value->id }}">{{ $value->nama_kategori }}</a></h4>
								</div>
							</div>
							@endforeach
						</div><!--/category-products-->
					
						</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center" a style="color : #22bdff">Daftar Laundry</h2>
						@foreach($datalaundry as $value)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{ asset($value->foto_laundry)}}" alt="" />
											<h2 a style="color : #22bdff">{{ $value->nama_laundry }}</h2>
											<p>Toko Sedang {{ $value->status }}</p>
											<p>{{ $value->alamat }}</p>
											@if(Auth::check())
											<a href="/user/checkout?laundry_id={{ $value->id }}" class="btn btn-default add-to-cart" a style="background-color : #5cb85c"><i class="fa fa-shopping-cart"></i>Order Sekarang</a>
											@else
											<a href="/login" class="btn btn-default add-to-cart" a style="background-color : #5cb85c"><i class="fa fa-lock"></i>Masuk untuk Order</a>
											@endif
										</div>
										
								</div>
							</div>
						</div>
						@endforeach
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
@endsection