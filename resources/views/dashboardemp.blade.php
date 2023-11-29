@extends('layouts.master')
@section('title','Dashboard')
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

    <div class="container-fluid">
        @if($karyawans->isNotEmpty())
            <h2><b>Posisi : {{ $namaPosisi }}</b></h2><br>
            <h4>Yuk Berikan Nilai Terbaik Kalian!</h4><br>

            <div class="row">
                @foreach($karyawans as $karyawan)
                    <div class="col-lg-4 col-12">
                        <div class="card" style="width: 15rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $karyawan->name }}</h5>
                            </div>
                            <a href="/formpenilaian2/{{ $karyawan->id }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>Belum ada data karyawan yang sama untuk posisi ini.</p>
        @endif
    </div>



    {{-- <div class="container-fluid">
        <h2><b>Nama Posisi</b></h2><br>
        <h4>Yuk Berikan Nilai Terbaik Kalian!</h4><br>

        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="card" style="width: 15rem;">
                    <img src="https://unsplash.com/photos/a-person-standing-in-a-narrow-canyon-between-two-mountains-lrhF4w-KKjA" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
      <!-- /.container-fluid -->
@endsection

@push('custom-script')

<script>
    // Ambil pesan error dari session (jika ada)
    var errorMessage = "{{ session('error') }}";

    // Tampilkan popup jika ada pesan error
    if (errorMessage) {
        alert(errorMessage);
    }
</script>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        var errorMessage = "{{ session('error') }}";

        if (errorMessage) {
            alert(errorMessage);
        }
    });
</script> --}}

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
