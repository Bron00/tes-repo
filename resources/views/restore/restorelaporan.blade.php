@extends('dashboard.dashboardmahasiswa')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <a type="button" class="btn btn-secondary" href="/dashboard/paa/pengajuan">kembali</a>
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
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($restorelaporan as $item)
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
                            <a  class="btn btn-success" onclick="return confirm('Apakah anda ingin memulihkannya?')" href="/dashboard/mahasiswa/laporan/restore/{{ $item->id_laporan }}">Restore</a>
                        </td>                                           
                    </tr>
                    @endforeach                                       
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection