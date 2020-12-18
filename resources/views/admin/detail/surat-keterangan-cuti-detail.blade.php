@extends('layouts.layoutadmin')

@section('content')
<div class="card-box">
<div class="row">
<div class="col-10">
           <div class="card-header"> 
             <h3> STATUS SURAT </h3>                
<h4><span class="badge label-table badge-info">{{ $daftarSKC->status_surat}}</span></h4>

    </div>
        </div> 

<div class="col-6 col-md-2" >
<div class="my-2"><a href="/admin/diproses-keterangan-cuti/{{$daftarSKC->id}}">
<button style="max-width: 10rem;" type="submit" class="btn btn-warning btn-block">PROSES</button>
</a></div>

    <a href="/admin/ditolak-keterangan-cuti/{{$daftarSKC->id}}">
        <button style="max-width: 10rem;" type="submit" class="btn btn-danger btn-block">TOLAK</button>
    </a>
</div></div>


  <body>
        <!-- Begin page -->
        <div id="wrapper">
            <div class="content-page{margin-left:240px;}">
                <div class="content">     
                    <!-- Start Content-->
                    <div class="container-fluid"> 
                        <div class="row">
                            <div class="col-xl-12">
                                <!-- Personal-Information -->
                                <div class="card-box">
                                    <h2 class="header-title{font-size:40px}">Surat Mahasiswa Cuti</h2> <br>
                                        <div class="panel-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-2">
                                                    Nama
                                                    </div>
                                                    <div class="col-1">
                                                    :
                                                    </div>
                                                    <div class="col-2">
                                                    {{ $user->nama }}
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-2">
                                                    NIM
                                                    </div>
                                                    <div class="col-1">
                                                    :
                                                    </div>
                                                    <div class="col-2">
                                                    {{ $user->nim }}
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-2">
                                                    Jenis Kelamin
                                                    </div>
                                                    <div class="col-1">
                                                    :
                                                    </div>
                                                    <div class="col-2">
                                                    {{ $biodata_user->jenis_Kelamin }}
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-2">
                                                    Nomor HP
                                                    </div>
                                                    <div class="col-1">
                                                    :
                                                    </div>
                                                    <div class="col-2">
                                                    {{ $biodata_user->nomor_Telepon }}
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-2">
                                                    Alamat Email 
                                                    </div>
                                                    <div class="col-1">
                                                    :
                                                    </div>
                                                    <div class="col-5">
                                                    {{ $user->email }}
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-2">
                                                    Tahun Akademik
                                                    </div>
                                                    <div class="col-1">
                                                    :
                                                    </div>
                                                    <div class="col-2">
                                                    {{ $daftarSKC->waktuCuti_TahunAkademik}}
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-2">
                                                    Semester
                                                    </div>
                                                    <div class="col-1">
                                                    :
                                                    </div>
                                                    <div class="col-2">
                                                    {{ $daftarSKC->waktuCuti_Semester}}
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-2">
                                                    Alasan Cuti
                                                    </div>
                                                    <div class="col-1">
                                                    :
                                                    </div>
                                                    <div class="col-5">
                                                    {{ $daftarSKC->alasanCuti}}
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-2">
                                                    Unggah Surat Pengajuan Mahasiswa 
                                                    </div>
                                                    <div class="col-1">
                                                    :
                                                    </div>
                                                    <div class="col-2">
                                                    <a href = "#"> {{ $daftarSKC->fileSuratPengajuanMahasiswa}}</a>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-2">
                                                    Unggah Surat Pengantar Departemen
                                                    </div>
                                                    <div class="col-1">
                                                    :
                                                    </div>
                                                    <div class="col-4">
                                                    <a href = "#"> {{ $daftarSKC->fileSuratPengantarDept}}</a>
                                                    </div>
                                                </div>
                                                <br>
                                          
                                                <div class="row">
                                                    <div class="col-2">
                                                    Unggah Surat Keterangan Dokter
                                                    </div>
                                                    <div class="col-1">
                                                    :
                                                    </div>
                                                    <div class="col-2">
                                                    <a href = "#"> {{ $daftarSKC->fileSuratKeteranganDokter}}</a>
                                                    </div>
                                                </div>
                                                <br>
                                                
 
                                                <!-- end row -->
                                            </div>
                                        </div>
                                
                                </div>
                            </div>
                        </div>
                    </div> <!-- end container-fluid -->
                </div> <!-- end content -->

              

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        
        
    </body>

    
@endsection