@extends('mitra.index')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>List Transaksi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List Transaksi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-12">
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
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Pembayaran</th>
                      <th>Jenis</th>
                      <th>Quantity</th>
                      <th>Total Harga</th>        
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no = 1; @endphp
                    @foreach($transaksi as $value)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $value->nama_pelanggan }}</td>
                      <td>{{ $value->alamat }}</td>
                      <td>{{ $value->pembayaran }}</td>
                      <td>{{ $value->jenis_paket }}</td>
                      <td>{{ $value->satuan }}</td>
                      <td>Rp. {{ $value->total_harga }}</td>
                      <td>{{ $value->stasus }}</td>

                       <td>
                        <form method="POST" action="/mitra/delete-transaksi">
                          @csrf
                          <input type="hidden" name="transaksi_id" value="{{ $value->id }}">
                          <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                        <a href="/mitra/edit-transaksi/{{ $value->id }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                      </td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection