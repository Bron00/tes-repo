@extends('dashboard.dashboard')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Tables Pengajuan</h1>
@if (session()->has('tambah'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('tambah') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('edit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('edit') }}
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
    <!--Tambah Balita modal-->
    <div class="modal fade" id="tambahBalita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengajuan</h5>
            </div>
            <div class="modal-body">
                <form action="/dashboard/paa/pengajuan/store" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}                    
                        <div class="container">
                         <div class="row">
                          <div class="col-md-12">
                           <div class="form-group">
                            <label class="control-label">Upload File</label>
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
                              <p>Choose an image file or drag it here.</p>
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
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahBalita">Tambah</button>
            <a type="button" class="btn btn-primary" href="/dashboard/paa/pengajuan/restore">Restore</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>FILE</th>
                            <th>ACC KPS</th>
                            <th>ACC KADEP</th>
                            <th>ACC WADEK2</th>
                            <th>CREATED AT</th>
                            <th>UPDATED AT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengajuan as $item)
                        <tr>
                            <td>{{ $item->id_pengajuan }}</td>
                            <td>{{ $item->file_pengajuan }}</td>
                            <td>
                                <?php 
                                if ($item->acc_kps==1){echo "<p style='color: rgb(5, 252, 5);'>Sudah Disetujui</p>";}
                                if ($item->acc_kps==0){echo "<p style='color: red;'>Belum Disetuji</p>";}
                                ?>
                            </td>
                            <td>
                                <?php 
                                if ($item->acc_kadep==1){echo "<p style='color: rgb(5, 252, 5);'>Sudah Disetujui</p>";}
                                if ($item->acc_kadep==0){echo "<p style='color: red;'>Belum Disetuji</p>";}
                                ?>
                            </td>
                            <td>
                                <?php 
                                if ($item->acc_wadek2==1){echo "<p style='color: rgb(5, 252, 5);'>Sudah Disetujui</p>";}
                                if ($item->acc_wadek2==0){echo "<p style='color: red;'>Belum Disetuji</p>";}
                                ?>
                            </td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>
                                <a href="/dashboard/paa/pengajuan/edit/{{ $item->id_pengajuan }}"><i class="fas fa-pen" style="color: rgb(179, 179, 4)"></i> </a> |
                                <a href="/dashboard/paa/pengajuan/hapus/{{ $item->id_pengajuan }}" onclick="return confirm('Apakah anda ingin menghapusnya?')"> <i class="fas fa-trash" style="color: red"></i></a>
                            </td>                                           
                        </tr>
                        @endforeach                                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
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