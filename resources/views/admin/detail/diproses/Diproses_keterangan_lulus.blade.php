@extends('layouts.layoutadmin')

@section('content')
<div class="card-box">
           <div class="card-header"> 
             <h3> STATUS SURAT </h3>                
<h4><span class="badge label-table badge-warning">Diproses</span></h4>
 </div>

<h3>Unggah Berkas</h3>

<div class="row">
    <div class="col-4">
            <input type="file" id="suratpengantardept" class="form-control" placeholder=".pdf">
    </div>
    <div class="col">
    <a href="{{route('admin-selesai')}}"> 
        <button style="max-width: 10rem;" type="submit" class="btn btn-success btn-block">SUBMIT</button>
    </a>
    </div>
</div>


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
                                    <h2 class="header-title{font-size:40px}">Surat Keterangan Lulus</h2> <br>
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
                                                    Alamat Asal
                                                    </div>
                                                    <div class="col-1">
                                                    :
                                                    </div>
                                                    <div class="col-5">
                                                    {{ $daftarSKL->alamatAsal}}
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-2">
                                                    Alamat di Bogor
                                                    </div>
                                                    <div class="col-1">
                                                    :
                                                    </div>
                                                    <div class="col-5">
                                                    {{ $daftarSKL->alamatBogor}}
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
                                                    <div class="col-2">
                                                    <a href = "#"> {{ $daftarSKL->fileSuratPengantarDept}}</a>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-2">
                                                    Unggah Lembar Pengesahan
                                                    </div>
                                                    <div class="col-1">
                                                    :
                                                    </div>
                                                    <div class="col-2">
                                                    <a href = "#"> {{ $daftarSKL->fileLembarPengesahan}}</a>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-2">
                                                    Unggah File Transkrip
                                                    </div>
                                                    <div class="col-1">
                                                    :
                                                    </div>
                                                    <div class="col-4">
                                                    <a href = "#"> File Transkrip.pdf </a>
                                                    </div>
                                                </div>
                                                <br>
                                          
                                                <div class="row">
                                                    <div class="col-2">
                                                    Unggah File Skripsi
                                                    </div>
                                                    <div class="col-1">
                                                    :
                                                    </div>
                                                    <div class="col-2">
                                                    <a href = "#"> {{ $daftarSKL->fileTranskrip}}</a>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-2">
                                                    Unggah File Bukti Pembayaran SPP
                                                    </div>
                                                    <div class="col-1">
                                                    :
                                                    </div>
                                                    <div class="col-2">
                                                    <a href = "#"> Bukti SPP.pdf </a>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-2">
                                                    Unggah File Bukti Pembayaran Wisuda
                                                    </div>
                                                    <div class="col-1">
                                                    :
                                                    </div>
                                                    <div class="col-2">
                                                    <a href = "#"> File Bukti Pembayaran Wisuda.pdf </a>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-2">
                                                    Unggah Pas Foto
                                                    </div>
                                                    <div class="col-1">
                                                    :
                                                    </div>
                                                    <div class="col-2">
                                                    <a href = "#"> foto.jpg </a>
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