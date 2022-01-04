@extends('dashboard.dashboardmahasiswa')
@section('content')
<div class="container-fluid">
<h1 class="h3 mb-2 text-black text-center">Tables Laporan MAGANG/PKL</h1>
@if (session()->has('edit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('edit') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('tambah'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('tambah') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('hapus'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('hapus') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('back'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('back') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<style>
    .box {
  position: relative;
  background: #ffffff;
  width: 100%;
}
.box-header {
  color: #444;
  display: block;
  padding: 10px;
  position: relative;
  border-bottom: 1px solid #f4f4f4;
  margin-bottom: 10px;
}
.box-tools {
  position: absolute;
  right: 10px;
  top: 5px;
}
.dropzone-wrapper {
  border: 2px dashed #91b0b3;
  color: #92b0b3;
  position: relative;
  height: 150px;
}
.dropzone-desc {
  position: absolute;
  margin: 0 auto;
  left: 0;
  right: 0;
  text-align: center;
  width: 40%;
  top: 50px;
  font-size: 16px;
}
.dropzone,
.dropzone:focus {
  position: absolute;
  outline: none !important;
  width: 100%;
  height: 150px;
  cursor: pointer;
  opacity: 0;
}
.dropzone-wrapper:hover,
.dropzone-wrapper.dragover {
  background: #ecf0f5;
}
.preview-zone {
  text-align: center;
}
.preview-zone .box {
  box-shadow: none;
  border-radius: 0;
  margin-bottom: 0;
}
</style>
<div class="modal fade" id="tambahBalita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Laporan</h5>
        </div>
        <div class="modal-body">
            <div class="container">
            <form action="/dashboard/mahasiswa/laporan/store" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Nama Laporan</label><br>
                    <input class="form-select form-select-lg mb-3 form-control" type="text" name="laporan" required="required">
                </div> 
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Jenis Laporan</label>
                    <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="jenis">
                            <option value="1">PKL</option>
                            <option value="0">Magang</option>
                    </select>                    
                </div>                   
                     <div class="row">
                      <div class="col-md-12">
                       <div class="form-group">
                        <label for="formGroupExampleInput" class="form-label">Upload File</label>
                        <div class="preview-zone hidden">
                         <div class="box box-solid">
                          <div class="box-header with-border">
                           <div><b>Preview</b></div>
                           <div class="box-tools pull-right">
                            <button type="button" class="btn btn-danger btn-xs remove-preview">
                             <i class="fa fa-times"></i> Reset This Form
                            </button>
                           </div>
                          </div>
                          <div class="box-body"></div>
                         </div>
                        </div>
                        <div class="dropzone-wrapper">
                         <div class="dropzone-desc">
                          <i class="glyphicon glyphicon-download-alt"></i>
                          <p>Choose an PDF file or drag it here.</p>
                         </div>
                         <input type="file" name="file" class="dropzone">
                        </div>
                       </div>
                      </div>
                     </div>
                     <div class="row">
                      <div class="col-md-12">
                       <button type="submit" class="btn btn-primary pull-right">Upload</button>
                      </div>
                     </div>
                    </div>
            </form>
        </div>
    </div>
    </div>
</div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahBalita">Tambah Laporan</button>
        <a type="button" class="btn btn-primary" href="/dashboard/mahasiswa/laporan/restore">Restore</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAMA LAPORAN</th>
                        <th>JENIS LAPORAN</th>
                        <th>FILE LAPORAN</th>
                        <th>CREATED AT</th>
                        <th>UPDATED AT</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporan as $item)
                    <tr>
                        <td>{{ $item->id_laporan }}</td>
                        <td>{{ $item->nama_laporan }}</td>
                        <td>
                            <?php 
                            if ($item->jenis_laporan==1){echo "PKL";}
                            if ($item->jenis_laporan==0){echo "Magang";}
                            ?>
                        </td>
                        <td>{{ $item->file_laporan }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            <?php
                            if ($item->status_laporan==1) {
                                echo "<label style='color: rgb(17, 238, 17)'>Lengkap</label>";
                            }
                            if ($item->status_laporan==2) {
                                echo "<label style='color: rgb(238, 24, 17)'>Belum Lengkap</label>";
                            }
                            if ($item->status_laporan==3) {
                                echo "<label style='color: rgb(238, 231, 17)'>Belum Diperiksa</label>";
                            }    
                            ?>
                        </td>
                        <td>
                            <a href="/dashboard/mahasiswa/laporan/edit/{{ $item->id_laporan }}" class="btn btn-warning">Edit</a>
                            <a href="/dashboard/mahasiswa/laporan/hapus/{{ $item->id_laporan }}" class="btn btn-danger">Hapus</a>
                        </td>                                           
                    </tr>
                    @endforeach                                       
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<script >
    function readFile(input) {
     if (input.files && input.files[0]) {
     var reader = new FileReader();
     
     reader.onload = function (e) {
     var htmlPreview = 
     '<img width="200" src="' + e.target.result + '" />'+
     '<p>' + input.files[0].name + '</p>';
     var wrapperZone = $(input).parent();
     var previewZone = $(input).parent().parent().find('.preview-zone');
     var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');
     
     wrapperZone.removeClass('dragover');
     previewZone.removeClass('hidden');
     boxZone.empty();
     boxZone.append(htmlPreview);
     };
     
     reader.readAsDataURL(input.files[0]);
     }
    }
    function reset(e) {
     e.wrap('<form>').closest('form').get(0).reset();
     e.unwrap();
    }
    $(".dropzone").change(function(){
     readFile(this);
    });
    $('.dropzone-wrapper').on('dragover', function(e) {
     e.preventDefault();
     e.stopPropagation();
     $(this).addClass('dragover');
    });
    $('.dropzone-wrapper').on('dragleave', function(e) {
     e.preventDefault();
     e.stopPropagation();
     $(this).removeClass('dragover');
    });
    $('.remove-preview').on('click', function() {
     var boxZone = $(this).parents('.preview-zone').find('.box-body');
     var previewZone = $(this).parents('.preview-zone');
     var dropzone = $(this).parents('.form-group').find('.dropzone');
     boxZone.empty();
     previewZone.addClass('hidden');
     reset(dropzone);
    });
    </script>
@endsection