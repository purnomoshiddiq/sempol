@extends('layouts.main')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h3>Data Master Buku</h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Buku</li>
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
                        <h3 class="card-title">Data Master Buku</h3>
                    </div>
                    <div class="card-body">
                        <a href="" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Tambah data</a>
                        <table id="example" class="table table-striped table-bordered" style="width: 100%">
                            <thead>
                            <tr>
                              <th>Hapus</th>
                              <th>Aksi</th>
                              <th>Judul</th>
                              <th>ISBN/ISSN</th>
                              <th>Perubahan Terakhir</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($buku as $b)
                              <tr>
                                <td><input type="checkbox" name="check" id="check" value="{{ $b->id }}"></td>
                                  <td>
                                      <a href="/data-buku/{{ $b->id }}/edit" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                      <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                  </td>
                                  <td><img src="{{ 'cover/' . $b->gbr_sampul }}" width="50px" height="50px">
                                    
                                  </td>
                                  <td>{{ $b->isbn }}</td>
                                  <td>{{ date('d-m-Y', strtotime($b->created_at)) }}</td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah data buku</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="/data-buku/store" id="frmtmbhbuku" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul buku..." required autocomplete="off">
                  </div>
                  <div class="col">
                    <label for="pengarang">Pengarang</label>
                    <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Masukkan nama pengarang..." required autocomplete="off">
                  </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                      <label for="isbn">ISBN/ISSN</label>
                      <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Masukkan no. ISBN/ISSN..." required autocomplete="off">
                    </div>
                    <div class="col">
                      <label for="penerbit">Penerbit</label>
                      <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukkan nama penerbit..." required autocomplete="off">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                      <label for="tahun terbit">Tahun Terbit</label>
                      <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="Masukkan tahun terbit..." required autocomplete="off">
                </div>
                    <div class="col">
                      <label for="tempat terbit">Tempat Terbit</label>
                      <input type="text" class="form-control" id="tempat_terbit" name="tempat_terbit" placeholder="Masukkan tempat terbit buku..." required autocomplete="off">
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col">
                      <label for="gbr sampul">Gambar Sampul</label>
                      <input type="file" class="form-control" id="gbr_sampul" name="gbr_sampul" accept="image/*">
                      <span class="text text-danger">
                        <ul type="disc">
                            <li>
                                <i>Gambar yang diupload max: 1Mb</i>
                            </li>
                        </ul>
                    </span>
                </div>
                    <div class="col">
                      <label for="file">File Berkas</label>
                      <input type="file" class="form-control" id="file" name="file" accept="application/pdf">
                      <span class="text text-danger">
                        <ul type="disc">
                            <li>
                                <i>File Berkas yang diupload max: 10Mb</i>
                            </li>
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

@push('myscript')
<script>
    // $(document).ready(function () {
    //     $('#example').DataTable();
    // });
    $('#example').DataTable();
    $('#checkbox').click(function() {
      var checkbox = $('#checkbox').val();
    });
    alert(checkbox);
    // $('#frmtmbhbuku').submit(function() {
    //             var judul = $("#judul").val();
    //             var pengarang = $("#pengarang").val();
    //             var isbn = $("#isbn").val();
    //             var penerbit = $("#penerbit").val();
    //             var thn_terbit = $('#thn_terbit').val();
    //             if (judul == "") {
    //                 Swal.fire({
    //                     title: 'Oopss',
    //                     text: 'NIK/NIP/NISN Harap diisi !',
    //                     icon: 'warning',
    //                     confirmButtonText: 'OK'
    //                 }).then(() => {
    //                     $("#judul").focus();
    //                 });
    //                 return false;
    //             } else if (nama_lengkap == "") {
    //                 Swal.fire({
    //                     title: 'Oopss',
    //                     text: 'Nama Harap diisi !',
    //                     icon: 'warning',
    //                     confirmButtonText: 'OK'
    //                 }).then(() => {
    //                     $("#nama_lengkap").focus();
    //                 });
    //                 return false;
    //             } else if (jabatan == "") {
    //                 Swal.fire({
    //                     title: 'Oopss',
    //                     text: 'Jabatan Harap diisi !',
    //                     icon: 'warning',
    //                     confirmButtonText: 'OK'
    //                 }).then(() => {
    //                     $("#Jabatan").focus();
    //                 });
    //                 return false;
    //             } else if (no_hp == "") {
    //                 Swal.fire({
    //                     title: 'Oopss',
    //                     text: 'Nomor HP Harap diisi !',
    //                     icon: 'warning',
    //                     confirmButtonText: 'OK'
    //                 }).then(() => {
    //                     $("#no_hp").focus();
    //                 });
    //                 return false;
    //             } else if (kode_dept == "") {
    //                 Swal.fire({
    //                     title: 'Oopss',
    //                     text: 'Departemen Harap diisi !',
    //                     icon: 'warning',
    //                     confirmButtonText: 'OK'
    //                 }).then(() => {
    //                     $("#kode_dept").focus();
    //                 });
    //                 return false;
    //             }
    //         });
    // var uploadField = document.getElementById("gbr_sampul");
    // uploadField.onchange = function() {
    // if(this.files[0].size > 200){ // ini untuk ukuran 800KB, 1000000 untuk 1 MB.
    //   Swal.fire({
    //                     title: 'Oopss',
    //                     text: 'Maaf. File Terlalu Besar ! Maksimal Upload 1Mb ',
    //                     icon: 'warning',
    //                     confirmButtonText: 'OK'
    //   })
    //   //  alert("Maaf. File Terlalu Besar ! Maksimal Upload 1Mb ");
    //    this.value = "";
    // } elseif (this.files[]) ;

</script>
@endpush
