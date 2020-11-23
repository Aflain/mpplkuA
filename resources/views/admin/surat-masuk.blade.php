@extends('layouts.layoutadmin')

@section('content')
<h3>Surat Masuk</h3>
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

  <tr>
    <th scope="row">Surat Keterangan Mahasiswa Aktif</th>
      <td>May 26, 2019</td>
      <td><span class="badge label-table badge-info">Pending</span></td>
      <td><a href="{{route('admin-suratketeranganaktif')}}"> DETAIL</a></td>
    </tr>
    
    <tr>
    <th scope="row">Surat Legalisir Transkip</th>
      <td>May 26, 2019</td>
      <td><span class="badge label-table badge-info">Pending</span></td>
      <td><a href="{{route('admin-legalisir')}}"> DETAIL</a></td>
    </tr>

    <tr>
    <th scope="row">Surat Aktif Setelah Cuti</th>
      <td>May 26, 2019</td>
      <td><span class="badge label-table badge-info">Pending</span></td>
      <td><a href="{{route('admin-suratketeranganaktifsetelahcuti')}}"> DETAIL</a></td>
    </tr>

    <tr>
    <th scope="row">Surat Keterangan Cuti</th>
      <td>May 26, 2019</td>
      <td><span class="badge label-table badge-info">Pending</span></td>
      <td><a href="{{route('admin-suratketerangancuti')}}"> DETAIL</a></td>
    </tr>

    <tr>
    <th scope="row">Surat Keterangan Lulus</th>
      <td>May 26, 2019</td>
      <td><span class="badge label-table badge-info">Pending</span></td>
      <td><a href="{{route('admin-suratketeranganlulus')}}"> DETAIL</a></td>
    </tr>

    <tr>
    <th scope="row">Surat Keterangan Pengunduran Diri</th>
      <td>May 26, 2019</td>
      <td><span class="badge label-table badge-info">Pending</span></td>
      <td><a href="{{route('admin-suratpengundurandiri')}}"> DETAIL</a></td>
    </tr>

    <tr>
    <th scope="row">Surat Perpanjangan Masa Studi</th>
      <td>May 26, 2019</td>
      <td><span class="badge label-table badge-info">Pending</span></td>
      <td><a href="{{route('admin-suratperpanjanganmasa')}}"> DETAIL</a></td>
    </tr>

  </tbody>
</table>
</div>
@endsection