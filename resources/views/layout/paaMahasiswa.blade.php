@extends('dashboard.dashboard')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tables Mahasiswa</h1>
    @if (session()->has('edit'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('edit') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
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
                            <th>NIM</th>
                            <th>DOSEN</th>
                            <th>NAMA</th>
                            <th>PASSWORD</th>
                            <th>TANGGAL LAHIR</th>
                            <th>ALAMAT</th>
                            <th>JENIS KELAMIN</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswa as $item)
                        <tr>
                            <td>{{ $item->nim_mhs }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nama_mhs }}</td>
                            <td>{{ $item->password }}</td>
                            <td>{{ $item->tgl_lahir_mhs }}</td>
                            <td>{{ $item->alamat_mhs }}</td>
                            <td>
                                <?php
                                    if ($item->jk_mhs == 1) {
                                        echo "Laki-Laki";
                                    }else {
                                        echo "Perempuan";
                                    }
                                ?>
                            </td>
                            <td>
                                <a href="/dashboard/paa/paa/edit/{{ $item->nim_mhs }}" class="btn btn-warning">Edit</a>
                                <a href="/dashboard/paa/paa/hapus/{{ $item->nim_mhs }}" onclick="return confirm('Apakah anda ingin menghapusnya?')" class="btn btn-danger">Hapus</a>
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