@extends('layouts.layoutadmin')

@section('content')
<div class="card">
  <div class="card-body">
<h3>PENGATURAN ADMIN</h3>
<br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
ADD USER
</button>
<p>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col"><h4>Name</h4></th>
      <th scope="col"><h4>Email</h4></th>
      <th scope="col"><h4>Tanggal</h4></th>
      <th scope="col"><h4>Tindakan</h4></th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <th scope="row">Admin</th>
      <td>Afifah@apps.ipb.ac.id</td>
      <td>12-12-2000</td>
      <td><a type="button" class="text-primary" data-toggle="" data-target="#exampleModal"> <i class="fe-edit-1"></i>Edit</a></td>
    </tr>
    

    
  </tbody>
</table>
</div>
</div>

<!-- Button trigger modal -->


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="pt-3">Nama</div>
            <input style="max-width: 25rem;" type="text" class="form-control" placeholder="Nama Admin">
        <div class="pt-3">Email Admin</div>
            <input style="max-width: 25rem;" type="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="Masukan email admin yang ingin ditambahkkan">
        <div class="pt-3">Kata Sandi</div>
            <input style="max-width: 25rem;" type="password" class="form-control" id="exampleDropdownFormPassword2" placeholder="Masukan kata sandi">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection
