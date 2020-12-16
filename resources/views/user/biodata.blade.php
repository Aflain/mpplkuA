@extends('layouts.usr-dashboard')
@section('page-name','Biodata') <!-- Page name in breadcrumb -->

<!-- Content Here -->
@section('content')
    <div class="content-page{margin-left:240px;}">
        <div class="content">     
            <!-- Start Content-->
            <div class="container-fluid"> 
                <div class="row">
                    <div class="col-sm-12">
                        <!-- meta -->
                        <div class="profile-user-box card-box bg-primary">
                            <div class="row">
                                <div class="col-sm-6">
                                    <span class="float-left mr-2"><img id="profile" src="{{asset($user->foto_profil)}}" alt="no image uploaded" style="border-radius: 50%; width: 100px; height: 100px;" class="avatar-xl rounded-circle"></span>
                                    <div class="media-body text-white">
                                    
                                        <h4 class="mt-1 mb-1 text-white font-18">{{ $user->nama }} </h4>
                                        <p class="font-13"> {{ $user->nim }} </p>
                                        <p class="mb-0"> Departemen {{ $biodata_user->departemen }} </p>
                                    
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-right">
                              
                                        <button type="button" class="btn btn-light waves-effect">
                                        <a href="{{route('user-biodata-edit-view',$user->id)}}">
                                            <i class="mdi mdi-account-settings mr-1"></i>
                                            <span> Ubah Biodata </span>
                                        </a>
                                        </button>
                                   
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!--/ meta -->
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-xl-12">
                        <!-- Personal-Information -->
                        <div class="card-box">
                            <h1 class="header-title{font-size:40px}">Biodata</h1> <br>
                            
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
                                            <div class="col-2">
                                            {{ $user->email }}
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
                                            {{$biodata_user->semester}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-2">
                                            Asal Prodi 
                                            </div>
                                            <div class="col-1">
                                            :
                                            </div>
                                            <div class="col-2">
                                            {{$biodata_user->asal_Prodi}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-2">
                                            Asal Departemen 
                                            </div>
                                            <div class="col-1">
                                            :
                                            </div>
                                            <div class="col-2">
                                            {{ $biodata_user->departemen}}
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
                                            {{$biodata_user->tahun_Akademik}}
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
@endsection