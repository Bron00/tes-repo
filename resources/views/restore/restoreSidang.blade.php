@extends('dashboard.dashboard')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <a type="button" class="btn btn-secondary" href="/dashboard/paa/sidang">kembali</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>DOSEN</th>
                        <th>MAHASISWA</th>
                        <th>NAMA LAPORAN</th>
                        <th>WAKTU</th>
                        <th>TEMPAT</th>
                        <th>STATUS</th>
                        <th>BUKTI SIDANG</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($restoresidang as $item)
                    <tr>
                        <td>{{ $item->id_sidang }}</td>
                        <td>{{ $item->nama_dosen }}</td>
                        <td>{{ $item->nama_mhs }}</td>
                        <td>{{ $item->nama_laporan }}</td>
                        <td>{{ $item->waktu_sidang }}</td>
                        <td>{{ $item->tempat_sidang }}</td>
                        <td>
                            <?php 
                            if ($item->status_sidang==1){echo "<p style='color: rgb(5, 252, 5);'>Sudah Dilaksanakan</p>";}
                            if ($item->status_sidang==0){echo "<p style='color: red;'>Belum Dilaksanakan</p>";}
                            ?>
                        </td>
                        <td>{{ $item->bukti_sidang }}</td>
                        <td>
                            <a  class="btn btn-success" onclick="return confirm('Apakah anda ingin memulihkannya?')" href="/dashboard/paa/sidang/restore/{{ $item->id_sidang }}">Restore</a>
                        </td>                                           
                    </tr>
                    @endforeach                                       
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection