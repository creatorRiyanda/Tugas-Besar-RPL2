@extends('index')

@section('content')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Akun Saya</h2>
						@if(Session::has('success'))
						<div class="alert alert-success alert-dismissible">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
			                Berhasil memproses pemesanan Anda! Silakan check history pembelian Anda.
			            </div>
			            @endif

			            @if(Session::has('failed'))
						<div class="alert alert-danger alert-dismissible">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                <h4><i class="icon fa fa-close"></i> Gagal!</h4>
			                {{ Session::get('failed') }}
			            </div>
			            @endif
						<div class="col-sm-12">
							<div class="card">
				              <div class="card-header">
				                <h3 class="card-title">Rubah Password</h3>
				              </div>
				              <!-- /.card-header -->
				              <div class="card-body p-0">
				                <form method="POST">
				                	@csrf
					                <div class="form-group">
					                    <label>Password Baru</label>
					                    <input type="password" name="new_password" class="form-control" required="">
					                </div>
					                <div class="form-group">
					                    <label>Konfirmasi Password Baru</label>
					                    <input type="password" name="new_password_confirm" class="form-control" required="">
					                </div>
					                <button type="submit" class="btn btn-success" id="btn-change-password">Ubah Password</button>
				                </form>
				              </div>
				              <!-- /.card-body -->
				            </div>
						</div>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
@endsection