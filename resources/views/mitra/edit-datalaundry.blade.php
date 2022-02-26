@extends('mitra.index')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Laundry</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Data Laundry</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
       <form method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Pengisian Tempat Laundry</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>

            <div class="card-body">
              <input type="hidden" name="product_id" value="{{ $detailProduct->id }}">
               <div class="form-group">
                <label >Kategori Laundry</label>
                <select name="category_id" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  @foreach($categories as $category)
                  @if($category->id == $detailProduct->category_id)
                  <option value="{{ $category->id }}" selected>{{ $category->nama_kategori }}</option>
                  @else
                  <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Nama Tempat Laundry</label>
                <input type="text" name="nama_laundry" class="form-control" value="{{ $detailProduct->product_name }}">
              </div>
              <div class="form-group">
                <label>Alamat Tempat Laundry</label>
                <input type="text" name="alamat" class="form-control" value="{{ $detailProduct->product_description }}">
              </div>
              <div class="form-group">
                <label>Rating</label>
                <input type="number" name="rating" class="form-control" value="{{ $detailProduct->price }}">
              </div>
              <div class="form-group">
                <label>Foto Produk</label>
                <input type="file" name="foto_produk" class="form-control">
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
          <input type="submit" value="Edit" class="btn btn-success float-right">
        </div>
      </div>
    </form>
    <br>
     <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Produk</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Laundry</th>
                      <th>Alamat</th>
                      <th>Rating</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no = 1; @endphp
                    @foreach($datalaundry as $value)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $value->nama_laundry }}</td>
                      <td>{{ $value->alamat }}</td>
                      <td>{{ $value->rating }}</td>
                      <td>{{ $value->status }}</td>
                      <td>{{ $value->aksi }}</td>

                      <td>
                        <form method="POST" action="/mitra/delete-product">
                          @csrf
                          <input type="hidden" name="datalaundry_id" value="{{ $value->id }}">
                          <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                        <a href="/mitra/edit-datalaundry/{{ $value->id }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
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