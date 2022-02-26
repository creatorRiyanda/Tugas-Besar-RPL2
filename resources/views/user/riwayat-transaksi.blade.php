@extends('index')

@section('content')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center" style="color : #22bdff">Akun Saya</h2>
						@if(Session::has('success'))
						<div class="alert alert-success alert-dismissible">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			                <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
			                {{ Session::get('success') }}
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
							<p><a href="/user/change-password" style="color : #22bdff">Akun > Ubah Password</a></p>
							<div class="card">
				              <div class="card-header">
				                <h3 class="card-title">List Transaksi</h3>
				              </div>
				              <!-- /.card-header -->
				              <div class="card-body table-responsive p-0">
				                <table class="table table-hover text-nowrap">
				                  <thead>
				                    <tr>
				                      <th>No</th>
				                      <th>Tanggal Pemesanan</th>
				                      <th>Nama Laundry</th>
				                      <th>Alamat Anda</th>
				                      <th>Pilihan Paket</th>
				                      <th>Quantity</th>
								      <th>Harga</th>
								      <th>Pembayaran</th>
								      <th>Status</th>
				                    </tr>
				                  </thead>
				                  <tbody>
				                    @php $no = 1; @endphp
				                    @foreach($transactions as $value)
				                    <tr>
				                    	<td>{{ $no++ }}</td>
				                    	<td>{{ $value->tgl_pesan }}</td>
				                    	<td>{{ $value->nama_laundry }}</td>
				                    	<td>{{ $value->alamat }}</td>
				                    	<td>{{ $value->jenis_paket }}</td>
				                    	<td>{{ $value->satuan }}</td>
				                    	<td>Rp. {{ $value->total_harga }}</td>
				                    	<td>{{ $value->pembayaran }}</td>
				                    	<td>{{ $value->stasus }}</td>
				                    </tr>
				                    @endforeach
				                  </tbody>
				                </table>
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