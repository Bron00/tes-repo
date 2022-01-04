@extends('dashboard.kadepdashboard')
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

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
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
                            <div class="dropdown">
                                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li class="pb-1 pl-2">
                                        <form action="/dashboard/kadep/pengajuan/update" method="post">
                                            @csrf
                                            <input type="hidden" name="id_pengajuan" value="{{ $item->id_pengajuan }}">
                                            <input type="hidden" name="acc_kadep" value="1">
                                            <button class="btn btn-success tombol border-0 text-center" name="op">
                                                Setujui
                                            </button>
                                        </form>
                                    </li>
                                    </ul>
                                </div>
                            </td>                                           
                        </tr>
                        @endforeach                                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection