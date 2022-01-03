@extends('dashboard.dashboard')
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
                        <th>FILE</th>
                        <th>ACC KPS</th>
                        <th>ACC KADEP</th>
                        <th>ACC WADEK2</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($restorepengajuan as $item)
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
                        <td>
                            <a  class="btn btn-success" onclick="return confirm('Apakah anda ingin memulihkannya?')" href="/dashboard/paa/pengajuan/restore/{{ $item->id_pengajuan }}">Restore</a>
                        </td>                                           
                    </tr>
                    @endforeach                                       
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection