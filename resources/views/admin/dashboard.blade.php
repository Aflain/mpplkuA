<!-- extends user-dashboar layout -->
@extends('layouts.layoutadmin')

@section('content')


  <div class="row">
    <div class="col-sm-4">
    <a href="{{route('admin-masuk')}}">
              <div class="mb-3" >
                <div class="card">
                   <table class="table table-hover">
                   <tr>
                <th scope="row">
                    <img src="/highdamin/dark/assets/images/icons/data_protection.svg" alt="" width="100%" class="img-responsive logo">
                </th>
                <td> 
                    <h3 class="card-title">Surat Masuk</h3> 
                    <h0><p class="card-text">{{$pending}}</p></h0>
                </td>
                  </tr>
                    </table>
                </div>
              </div>
            </a>
    </div>
    <div class="col-sm-4">
    <a href="{{route('admin-diproses')}}">
              <div class="mb-3" >
                <div class="card">
                   <table class="table table-hover">
                   <tr>
                <th scope="row">
                    <img src="/highdamin/dark/assets/images/icons/data_backup.svg" alt="" width="104%" class="img-responsive logo">
                </th>
                <td> 
                    <h3 class="card-title">Surat Diproses</h3> 
                    <h0><p class="card-text">{{$diproses}}</p></h0>
                </td>
                  </tr>
                    </table>
                </div>
              </div>
            </a>
    </div>
    <div class="col-sm-4">
    <a href="{{route('admin-selesai')}}">
              <div class="mb-3" >
                <div class="card">
                   <table class="table table-hover">
                   <tr>
                <th scope="row">
                    <img src="/highdamin/dark/assets/images/icons/accept_database.svg" alt="" width="102%" class="img-responsive logo">
                </th>
                <td> 
                    <h3 class="card-title">Surat Selesai</h3> 
                    <h0><p class="card-text">{{$selesai}}</p></h0>
                </td>
                  </tr>
                    </table>
                </div>
              </div>
            </a>
    </div>
  </div>

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
                          <option value="Diproses">Pending</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <input id="demo-foo-search" type="text" placeholder="Cari Surat" class="form-control" autocomplete="on">
                            <button class="btn" type="submit">
                                <i class="fe-search"></i>
                            </button>
                      </div>
                    </div>
                  </div>
                </div>
                -->

    <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col"><h4>Surat</h4></th>
      <th scope="col"><h4>Tanggal</h4></th>
      <th scope="col"><h4>Status</h4></th>
      <th scope="col"><h4>Tindakan</h4></th>
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
          <a href="surat-keterangan-aktif-detail/{{$s->id}}"> DETAIL</a>
        @endif
        @if ($s -> nama_surat == 'Surat Keterangan Aktif Setelah Cuti')
          <a href="surat-keterangan-aktif-setelah-cuti-detail/{{$s->id}}"> DETAIL</a>
        @endif
        @if ($s -> nama_surat == 'Surat Keterangan Cuti')
          <a href="surat-keterangan-cuti-detail/{{$s->id}}"> DETAIL</a>
        @endif
        @if ($s -> nama_surat == 'Surat Keterangan Lulus')
          <a href="surat-keterangan-lulus-detail/{{$s->id}}"> DETAIL</a>
        @endif
        @if ($s -> nama_surat == 'Surat Pengunduran Diri')
          <a href="surat-pengunduran-diri-detail/{{$s->id}}"> DETAIL</a>
        @endif
        @if ($s -> nama_surat == 'Surat Perpanjangan Masa Studi')
          <a href="surat-perpanjangan-masa-detail/{{$s->id}}"> DETAIL</a>
        @endif
        @if ($s -> nama_surat == 'Legalisir Transkrip')
          <a href="legalisir-detail/{{$s->id}}"> DETAIL</a>
        @endif
       </td>
      </tr>
    @endforeach

  </tbody>
</table>

@endsection