@extends('index')
@section('content')
<section>
   <div class="container">
      <div class="row">
         <div class="col-sm-12 padding-right">
            <div class="features_items">
               <!--features_items-->
               <h2 class="title text-center" a style="color : #22bdff">Checkout</h2>
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
               <div class="col-sm-4">
                  <div class="product-image-wrapper">
                     <div class="single-products">
                        <div class="productinfo text-center">
                           <img src="{{ asset($datalaundry->foto_laundry)}}" alt="" />
                           <h2 a style="color : #22bdff">{{ $datalaundry->nama_laundry }}</h2>
                           <p>{{ $datalaundry->status }}</p>
                           <p>{{ $datalaundry->alamat }}</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-8">
                  <p>Nama Laundry : <strong>{{ $datalaundry->nama_laundry }}</strong></p>
                  <p>Alamat : <strong>{{ $datalaundry->alamat }}</strong></p>
                  <p>Rating : <strong>{{ $datalaundry->rating }}</strong></p>
                  <p>Status : <strong>{{ $datalaundry->status }}</strong></p>
                  <form method="POST">
                     @csrf	
                     <input type="hidden" name="laundry_id" value="{{ $datalaundry->id }}">
                     <div class="form-group">
                        <label>Nama Penerima</label>
                        <input type="text" name="nama" class="form-control" style="width: 100%;">
                        </select>
                     </div>
                     <div class="form-group">
                        <label>No Telepon</label>
                        <input type="number" name="no_hp" class="form-control" style="width: 100%;">
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Alamat Penerima</label>
                        <input type="text" name="alamat" class="form-control" style="width: 100%;">
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Jenis Laundry</label>
                        <select id="jenis_laundry" class="form-control" name="jenis_laundry" required="">
                           <option selected disabled>-- Pilih Paket --</option>
                           @foreach($dataLaundryType as $val)
                           <option value="{{ $val->id }}" data-harga="{{ $val->harga }}">{{ $val->nama_jenis }} - Rp. {{ $val->harga }}/kg - {{ $val->estimasi }}</option>
                           @endforeach
                        </select>
                     </div>
                     @csrf
                     <div class="form-group">
                        <label>Berat/KG</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" required="" value="0" min="1">
                     </div>
                     <div class="form-group">
                        <label>Total Harga</label>
                        <input type="text" id="harga" name="totalharga" class="form-control" style="width: 100%;" readonly="">
                     </div>
                     <div class="form-group">
                        <label>Pembayaran</label>
                        <select class="form-control" name="pembayaran" required="">
                           <option selected disabled>-- Pilih Metode Pembayaran --</option>
                           <option> Tunai </option>
                           <option> Non Tunai </option>
                        </select>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="btn btn-success">Checkout Sekarang</button>
                     </div>
                  </form>
               </div>
            </div>
            <!--features_items-->
         </div>
      </div>
   </div>
</section>
@endsection
@section('js')
<script type="text/javascript">
   $('#quantity').keyup(function(){
   	var quantity = $('#quantity').val();
   	var jenisHarga = $('#jenis_laundry').find(':selected').attr('data-harga');
   	var harga = parseInt(jenisHarga)
   
   	var totalHarga = quantity * harga;
   	$('#harga').val(totalHarga)
   });
</script>
@endsection