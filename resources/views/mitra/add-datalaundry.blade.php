@extends('mitra.index')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Tempat Laundry</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Tempat Laundry</li>
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
              <h3 class="card-title">Pengisian Data laundry</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>

            <div class="card-body">
               <div class="form-group">
                <label >Kategori</label>
                <select name="category_id" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  @foreach($categories as $category)
                  @php 
                    $selectedCategory = "";
                    if(isset($datalaundry->category_id)){
                      if($category->id == $datalaundry->category_id){
                        $selectedCategory = "selected";
                      }
                    }
                  @endphp
                  <option value="{{ $category->id }}" {{ $selectedCategory }}>{{ $category->nama_kategori }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Nama Laundry</label>
                <input type="text" name="nama_laundry" class="form-control" value="{{ $datalaundry->nama_laundry }}">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $datalaundry->alamat }}">
              </div>
              <div class="form-group">
                <label>Rating</label>
                <input type="text" name="rating" class="form-control" value="{{ $datalaundry->rating }}">
              </div>
              <div class="form-group">
              <label>Status</label>
                <select name="status" class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option value="Buka"  {{ ($datalaundry->status == "Buka") ? "selected" : '' }}>Buka</option>
                  <option value="Tutup" {{ ($datalaundry->status == "Tutup") ? "selected" : '' }}>Tutup</option>
                </select>
              </div>
              <div class="form-group">
                <label>Foto Laundry</label>
                <input type="file" name="foto_laundry" class="form-control">
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
          <input type="submit" value="Update" class="btn btn-success float-right">
        </div>
      </div>
    </form>
    <br>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection