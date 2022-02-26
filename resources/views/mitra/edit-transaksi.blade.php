@extends('mitra.index')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Transaski</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Transaksi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
       <form method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="transaction_id" value="{{ $dataTransaksi->id }}">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Pengisian Status transaksi</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>

            <div class="card-body">
              <div class="form-group">
                <label>Nama</label>
                <input  disabled type="text" name="nama_pelanggan" value="{{ $dataTransaksi->nama_pelanggan }}" class="form-control">
              </div>
              <div class="form-group">
                <label>alamat</label>
                <input  disabled type="text" name="alamat" value="{{ $dataTransaksi->alamat }}" class="form-control">
              </div>
              <div class="form-group">
                <label>Pembayaran</label>
                <select class="form-control" name="pembayaran">
                   <option value="Belum Lunas" {{ ($dataTransaksi->pembayaran == "Belum Lunas") ? "selected" : "" }}>Belum Lunas</option>
                  <option value="Lunas" {{ ($dataTransaksi->pembayaran == "Lunas") ? "selected" : "" }}>Lunas</option>
                </select>
              </div>
               <div class="form-group">
                <label>Jenis</label>
                <input  disabled type="text" name="jenis_laundry" value="{{ $dataTransaksi->jenis_paket }}" class="form-control">
              </div>
               <div class="form-group">
                <label>Quantity</label>
                <input disabled type="text" name="quantity"  value="{{ $dataTransaksi->satuan }}" class="form-control">
              </div>
              <div class="form-group">
                <label>Total harga</label>
                <input disabled type="text" name="total_harga" value="{{ $dataTransaksi->total_harga }}" class="form-control">
              </div>
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                  <option value="--Pilih Status--">--Pilih Status--</option>
                  <option value="Sedang diproses">Sedang diproses</option>
                  <option value="Kurir sedang menuju ke alamat tujuan">Kurir sedang menuju ke alamat tujuan</option>
                   <option value="Pesanan telah di ambil">Pesanan telah di ambil</option>
                    <option value="Pesanan dalam proses pencucian">Pesanan dalam proses pencucian</option>
                    <option value="Pesanan dalam proses pengemasan">Pesanan dalam proses pengemasan</option>
                    <option value="Kurir sedang menuju ke alamat tujuan">Kurir sedang menuju ke alamat tujuan</option>
                   <option value="Pesanan telah selesai">Pesanan telah selesai</option>
                </select>
              </div>
                          
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
       
      </div>
      <div class="row">
        <div class="col-12">
          <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Tambah" class="btn btn-success float-right">
        </div>
      </div>
    </form>
    <br>
     <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List transakasi</h3>
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
                      <th>Total harga</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no = 1; @endphp
                    @foreach($data as $value)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $value->nama_pelanggan }}</td>
                      <td>{{ $value->alamat }}</td>
                      <td>{{ $value->pembayaran }}</td>
                      <td>{{ $value->jenis_paket }}</td>
                      <td>{{ $value->satuan }}</td>
                      <td>{{ $value->total_harga }}</td>
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
