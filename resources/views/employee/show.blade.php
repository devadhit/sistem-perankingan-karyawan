@extends('layouts.master')
@section('title','Form Tambah Data Karyawan')
@push('custom-css')
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/daterangepicker/daterangepicker.css">
    <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/jqvmap/jqvmap.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('') }}assets/plugins/summernote/summernote-bs4.min.css">
@endpush
@section('content')
    <section class="content">
        <br>
      <div class="container-fluid">
        <div class="row">
          <div class="col-8">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title"><b>Form Edit Data Karyawan</b></h2>
              </div>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-8">
                <form action="/updateemployee/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama</label>
                      <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ $data->name }}" placeholder="Masukkan nama">
                    </div>
                    {{-- <div class="form-group">
                        <label for="exampleInputPassword1">Akun Karyawan</label>
                        <select class="custom-select form-control-border" id="id_user" name="id_user">
                          @foreach($user as $akun)
                              <option value="{{ $akun->id }}" {{ $data->id_user == $akun->id ? 'selected' : '' }}>{{ $akun->name }}</option>
                          @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group">
                      <label for="exampleInputPassword1">Jabatan</label>
                      <select class="custom-select form-control-border" id="id_posisi" name="id_posisi" required>
                        @foreach($posisi as $p)
                            <option value="{{ $p->id }}" {{ $data->id_posisi == $p->id ? 'selected' : '' }}>{{ $p->nameposition }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Alamat</label>
                      <input type="text" name="address" class="form-control" id="exampleInputPassword1" value="{{ $data->address }}" placeholder="Masukkan alamat">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Usia</label>
                      <input type="text" name="age" class="form-control" id="exampleInputPassword1" value="{{ $data->age }}" placeholder="Masukkan usia">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectBorder">Jenis Kelamin</label>
                      <select class="custom-select form-control-border" name="sex" id="exampleSelectBorder">
                          <option selected>Pilih Jenis Kelamin</option>
                          <option>Laki-Laki</option>
                          <option>Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Email</label>
                      <input type="email" name="email" class="form-control" id="exampleInputPassword1" value="{{ $data->email }}" placeholder="Masukkan Email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">No. Telp</label>
                      <input type="number" name="telp" class="form-control" id="exampleInputPassword1" value="{{ $data->telp }}" placeholder="Masukkan No.Telp">
                    </div>

                  </div>

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
              </div>

            </div>

          </div>
        </div><!-- /.container-fluid -->
      </section>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>

      <!-- Optional JavaScript; choose one of the two! -->

      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <!-- Option 2: Separate Popper and Bootstrap JS -->
      <!--
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
      -->
    </body>
  </html>
  @endsection

  @push('custom-script')
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('') }}assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('') }}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="{{ asset('') }}assets/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="{{ asset('') }}assets/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="{{ asset('') }}assets/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="{{ asset('') }}assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('') }}assets/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('') }}assets/plugins/moment/moment.min.js"></script>
  <script src="{{ asset('') }}assets/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset('') }}assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="{{ asset('') }}assets/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('') }}assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('') }}assets/dist//js/pages/dashboard.js"></script>
  @endpush
