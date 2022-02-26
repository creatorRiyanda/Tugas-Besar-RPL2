@extends('admin.index')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form method="POST">
      @csrf
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pengisian User</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <label>Nama User</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                  </div>

                  <div class="form-group">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                  </div>

                  <div class="form-group">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <label>No. HP</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ $user->no_hp }}">
                  </div>

                  <div class="form-group">
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ $user->alamat }}">
                  </div>

                  <div class="form-group">
                    <label >User Level</label>
	                <select name="level" class="form-control custom-select">
	                  <option disabled>Select one</option>
	                  <option value="user" {{ ($user->level == "user") ? "selected" : "" }}>User</option>
	                  <option value="user" {{ ($user->level == "admin") ? "selected" : "" }}>Admin</option>
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
            <a href="/admin/list-user" class="btn btn-secondary">Cancel</a>
            <input type="submit" value="Ubah" class="btn btn-success float-right">
          </div>
        </div>
      </form>
      <br>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection