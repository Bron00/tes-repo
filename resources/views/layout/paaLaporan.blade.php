@extends('dashboard.dashboard')
@section('content')
<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Tables Laporan</h1>
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

<!--Tambah Balita modal-->
<div class="modal fade" id="tambahBalita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Laporan</h5>
        </div>
        <div class="modal-body">
            <form action="/dashboard/paa/laporan/store" method="post">
                {{ csrf_field() }}                
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Nama Mahasiswa</label>
                    <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="nim_mhs">
                        @foreach ($mahasiswa as $item)
                            <option value="{{ $item->nim_mhs }}">{{ $item->nama_mhs }}</option>
                        @endforeach
                    </select>                    
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Nama Laporan</label> <br>
                    <input type="text" name="nama_laporan" required="required">
                </div>                  
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Jenis Laporan</label><br>
                    <input type="radio" name="jenis_laporan" required="required" value="1"> PKL  <br>
                    <input type="radio" name="jenis_laporan" required="required" value="0"> Magang  <br>
                </div>                                       
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Simpan Data">
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
        <a type="button" class="btn btn-primary" href="/balita/restore">Restore</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>MAHASISWA</th>
                        <th>NAMA LAPORAN</th>
                        <th>JENIS LAPORAN</th>
                        <th>CREATED AT</th>
                        <th>UPDATED AT</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporan as $item)
                    <tr>
                        <td>{{ $item->id_laporan }}</td>
                        <td>{{ $item->nama_mhs }}</td>
                        <td>{{ $item->nama_laporan }}</td>
                        <td>
                            <?php 
                            if ($item->jenis_laporan==1){echo "PKL";}
                            if ($item->jenis_laporan==0){echo "Magang";}
                            ?>
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            <a href="paa/laporan/edit/{{ $item->id_laporan }}"> <i class="fas fa-trash" style="color: red"></i></a> |
                            <a href="paa/laporan/hapus/{{ $item->id_laporan }}" onclick="return confirm('Apakah anda ingin menghapusnya?')"> <i class="fas fa-pen" style="color: rgb(179, 179, 4)"></i></a>
                        </td>                                           
                    </tr>
                    @endforeach                                       
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
    
@endsection