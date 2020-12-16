@extends('layouts.layoutadmin')

@section('content')
<div class="card-box">
           <div class="card-header"> 
             <h3> STATUS SURAT </h3>                
<h4><span class="badge label-table badge-danger">Ditolak</span></h4>
 </div>

<h3>Alasan Penolakan</h3>

<div class="row">
    <div class="col-5">
        <input type="text" id="alamatasal" class="form-control" placeholder="Ketik Disini">
    </div>
    <div class="col">
    <a href="{{route('admin-ditolak')}}"> 
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
                                    <h2 class="header-title{font-size:40px}">Surat Keterangan Aktif Mahasiswa</h2> <br>
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
                                                    <div class="col-3">
                                                    {{ $user->email }}
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-2">
                                                    Keperluan Pengajuan Surat
                                                    </div>
                                                    <div class="col-1">
                                                    :
                                                    </div>
                                                    <div class="col-5">
                                                    alasan
                                                    </div>
                                                </div>
                                                <br>                                         
                                                <div class="row">
                                                    <div class="col-2">
                                                    File KTM
                                                    </div>
                                                    <div class="col-1">
                                                    :
                                                    </div>
                                                    <div class="col-2">
                                                    <a href = "#"> {{$daftarSKA->fileKTM}}</a>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-2">
                                                    File Bukti SPP
                                                    </div>
                                                    <div class="col-1">
                                                    :
                                                    </div>
                                                    <div class="col-2">
                                                    <a href = "#"> {{$daftarSKA->fileBayarSPP}} </a>
                                                    </div>
                                                </div>
 
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