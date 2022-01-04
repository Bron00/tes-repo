@extends('dashboard.dashboard')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tables Dosen</h1>
    @if (session()->has('tambah'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('edit') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="modal fade" id="tambahBalita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Dosen</h5>
            </div>
            <div class="modal-body">
                <div class="container">
                <form action="/dashboard/paa/dosen/store" method="post">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">NIP Dosen</label><br>
                        <input class="form-select form-select-lg mb-3 form-control" type="text" name="nip_dosen" required="required">
                    </div> 
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Nama Dosen</label><br>
                        <input class="form-select form-select-lg mb-3 form-control" type="text" name="dosen" required="required">
                    </div> 
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Password</label><br>
                        <input class="form-select form-select-lg mb-3 form-control" type="text" name="password" required="required">
                    </div> 
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Alamat</label><br>
                        <input class="form-select form-select-lg mb-3 form-control" type="text" name="alamat" required="required">
                    </div> 
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Jenis Kelamin</label>
                        <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="jenis">
                                <option value="1">Laki-laki</option>
                                <option value="0">Perempuan</option>
                        </select>                    
                    </div>
                    <button type="submit" class="btn btn-success">Tambah</button>                   
                </form>
            </div>
        </div>
        </div>
    </div></div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahBalita">Tambah</button>
            <a type="button" class="btn btn-primary" href="/dashboard/paa/paa/restore">Restore</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>NAMA</th>
                            <th>PASSWORD</th>
                            <th>ALAMAT</th>
                            <th>JENIS KELAMIN</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dosen as $item)
                        <tr>
                            <td>{{ $item->nip_dosen }}</td>
                            <td>{{ $item->nama_dosen }}</td>
                            <td>{{ $item->password }}</td>
                            <td>{{ $item->alamat_dosen }}</td>
                            <td>
                                <?php
                                    if ($item->jk_dosen == 1) {
                                        echo "Laki-Laki";
                                    }else {
                                        echo "Perempuan";
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="/dashboard/paa/dosen/edit/{{ $item->nip_dosen }}" class="btn btn-warning">Edit</a>
                                <a href="/dashboard/paa/dosen/hapus/{{ $item->nip_dosen }}" onclick="return confirm('Apakah anda ingin menghapusnya?')" class="btn btn-danger">Hapus</a>
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