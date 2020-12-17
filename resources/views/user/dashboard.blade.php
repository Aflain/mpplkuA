<!-- extends user-dashboar layout -->
@extends('layouts.usr-dashboard')
@section('page-name','Dashboard') <!-- Page name in breadcrumb -->

<!-- Content Here -->
@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>User - Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="highdamin/light/assets/images/favicon.ico">

        <!-- Footable css -->
        <link href="highdamin/light/assets/libs/footable/footable.core.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="highdamin/light/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="highdamin/light/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="highdamin/light/assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
         
            <div class="content-page{margin-left:240px;}">
                <div class="content">
                @if (session()->has('success'))
                <div class="alert alert-dismissible alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h1 class="header-title{font-size:px;}">Pengajuan Surat</h1>

                                    <!--
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-12 text-sm-center form-inline">
                                                <div class="form-group mr-2">
                                                    <select id="demo-foo-filter-status" class="custom-select">
                                                        <option value="">Tampilkan Semua</option>
                                                        <option value="Selesai">Selesai</option>
                                                        <option value="Ditolak">Ditolak</option>
                                                        <option value="Diproses">Diproses</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input id="demo-foo-search" type="text" placeholder="Cari Surat" class="form-control" autocomplete="on">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    -->

                                    <div class="table-responsive">
                                    <table id="demo-foo-filtering" class="table table-striped table-bordered toggle-circle mb-0" data-page-size="7">
                                        <thead>
                                        <tr>
                                            <th data-hide="phone">Surat</th>
                                            <th data-hide="phone, tablet">Tanggal</th>
                                            <th data-hide="phone, tablet">Status</th>
                                            <th data-hide="phone, tablet">Tindakan</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($daftarSurat->sortByDesc('created_at') as $s)
                                            <tr>
                                                <td>{{ $s->nama_surat }}</td>
                                                <td>{{ $s->created_at->format('F d, Y') }}</td>
                                                <td>
                                                    @if ($s -> status_surat == "Ditolak")
                                                        <span class="badge label-table badge-danger">{{ $s->status_surat }}</span>
                                                    @endif
                                                     @if ($s -> status_surat == "Diproses")
                                                        <span class="badge label-table badge-warning">{{ $s->status_surat }}</span>
                                                    @endif
                                                    @if ($s -> status_surat == "Selesai")
                                                        <span class="badge label-table badge-success">{{ $s->status_surat }}</span>
                                                    @endif
                                                    @if ($s -> status_surat == "Pending")
                                                        <span class="badge label-table badge-info">{{ $s->status_surat }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($s -> nama_surat == 'Surat Keterangan Aktif')
                                                        <a href="surat/surat-keterangan-aktif-detail/{{$s->id}}" span class="btn btn-link btn"> Lihat Pengajuan</a></span></td>
                                                    @endif
                                                    @if ($s -> nama_surat == 'Surat Keterangan Aktif Setelah Cuti')
                                                        <a href="surat/surat-keterangan-aktif-cuti-detail/{{$s->id}}" span class="btn btn-link btn"> Lihat Pengajuan</a></span></td>
                                                    @endif
                                                    @if ($s -> nama_surat == 'Surat Keterangan Cuti')
                                                        <a href="surat/surat-keterangan-cuti-detail/{{$s->id}}" span class="btn btn-link btn"> Lihat Pengajuan</a></span></td>
                                                    @endif
                                                    @if ($s -> nama_surat == 'Surat Keterangan Lulus')
                                                        <a href="surat/surat-keterangan-lulus-detail/{{$s->id}}" span class="btn btn-link btn"> Lihat Pengajuan</a></span></td>
                                                    @endif
                                                    @if ($s -> nama_surat == 'Surat Pengunduran Diri')
                                                        <a href="surat/surat-pengunduran-diri-detail/{{$s->id}}" span class="btn btn-link btn"> Lihat Pengajuan</a></span></td>
                                                    @endif
                                                    @if ($s -> nama_surat == 'Surat Perpanjangan Masa Studi')
                                                        <a href="surat/surat-perpanjangan-masa-studi-detail/{{$s->id}}" span class="btn btn-link btn"> Lihat Pengajuan</a></span></td>
                                                    @endif
                                                    @if ($s -> nama_surat == 'Legalisir Transkrip')
                                                        <a href="surat/legalisir-transkrip-detail/{{$s->id}}" span class="btn btn-link btn"> Lihat Pengajuan</a></span></td>
                                                    @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr class="active">
                                            <td colspan="5">
                                                <div class="text-right">
                                                    <ul class="pagination pagination-split justify-content-end footable-pagination"></ul>
                                                </div>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->

                

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                              2018 - 2019 &copy; Highdmin theme by <a href="">Coderthemes</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Vendor js -->
        <script src="highdamin/light/assets/js/vendor.min.js"></script>

         <!-- Footable js -->
         <script src="highdamin/light/assets/libs/footable/footable.all.min.js"></script>

         <!-- Init js -->
         <script src="highdamin/light/assets/js/pages/foo-tables.init.js"></script>

        <!-- App js -->
        <script src="highdamin/light/assets/js/app.min.js"></script>
        
    </body>
</html>
@endsection