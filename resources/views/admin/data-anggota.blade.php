@extends('layouts.main')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>Data Master Anggota</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Anggota</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Master Anggota</h3>
                    </div>
                    <div class="card-body">
                        <a href="" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-file-excel"> Import Excel</i></a>
                        <table id="example" class="table table-striped table-bordered" style="width: 100%">
                            <thead>
                            <tr>
                              <th>Hapus</th>
                              <th>Aksi</th>
                              <th>Nama</th>
                              <th>NISN</th>
                              <th>No. Telp</th>
                              <th>Alamat</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah data anggota</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/data-buku/store" id="frmtmbhbuku" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col">
                    <label for="file">Upload Anggota</label>
                    <input type="file" class="form-control" id="judul" name="judul" accept=".xlsx" required autocomplete="off">
                    <span class="text text-danger">
                        <ul style="disc" class="mt-2">
                            <li><i><a href="{{ asset('template-anggota.xlxs') }}">Download template import excel</a></i></li>
                        </ul>
                    </span>
                  </div>
                </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
      </div>
    </div>
  </div>

@endsection
