@extends('layouts.layoutadmin')

@section('content')
<h3>Surat Ditolak</h3>
<div>
<li class="d-none d-sm-block">
                            <form class="app-search">
                                <div class="app-search-box">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit">
                                                <i class="fe-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </li>
</div>
<div class="mt-3">
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

  @foreach($daftarSurat as $s)
  <tr>
    <th scope="row">{{$s->nama_surat}}</th>
      <td>{{ $s->created_at }}</td>
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
</div>
@endsection