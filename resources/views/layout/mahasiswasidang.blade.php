@extends('dashboard.dashboardmahasiswa')
@section('content')
<h1 class="h3 mb-2 text-black-800 text-center">Tables Sidang</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>DOSEN</th>
                            <th>NAMA LAPORAN</th>
                            <th>WAKTU</th>
                            <th>TEMPAT</th>
                            <th>STATUS</th>
                            <th>BUKTI SIDANG</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sidang as $item)
                        <tr>
                            <td>{{ $item->id_sidang }}</td>
                            <td>{{ $item->nama_dosen }}</td>
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
                                <a href="/dashboard/mahasiswa/sidang/edit/{{ $item->id_sidang }}" class="btn btn-success">uploa/edit bukti</a>
                            </td>                                           
                        </tr>
                        @endforeach                                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection