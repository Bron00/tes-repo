@extends('dashboard.dashboard')
@section('content')
<div class="container-fluid">
    <h1>Selamat Datang, Steve</h1>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-primary text-uppercase mb-1">
                                Pengajuan Terakhir</div>
                                <hr class="sidebar-divider">
                            <div class="text-s mb-0 font-weight-bold text-gray-800">Fitri Realistica   <p style="color: green">Sudah Cair</p></div>
                            <div class="text-s mb-0 font-weight-bold text-gray-800">Army Justitia   <p style="color: rgb(127, 127, 2)">Diproses</p></div>
                            <div class="text-s mb-0 font-weight-bold text-gray-800">Steve   <p style="color: rgb(127, 127, 2)">Diproses</p></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-primary text-uppercase mb-1">
                                Sidang Terakhir</div>
                                <hr class="sidebar-divider">
                            <div class="text-s mb-0 font-weight-bold text-gray-800">Sistem Informasi Koperasi   <p style="color: green">Sudah Dilakukan</p></div>
                            <div class="text-s mb-0 font-weight-bold text-gray-800">Sistem Informasi Bengkel   <p style="color: rgb(127, 127, 2)">Belum Dilakukan</p></div>
                            <div class="text-s mb-0 font-weight-bold text-gray-800">Sistem Informasi Restoran   <p style="color: rgb(127, 127, 2)">Belum Dilakukan</p></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-stream fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-primary text-uppercase mb-1">
                                Akun Terakhir</div>
                                <hr class="sidebar-divider">
                            <div class="text-s mb-0 font-weight-bold text-gray-800">Maulana Aji   <p style="color: green">Aktif</p></div>
                            <div class="text-s mb-0 font-weight-bold text-gray-800">Crysna Wima Rangga   <p style="color: red">Tidak Aktif</p></div>
                            <div class="text-s mb-0 font-weight-bold text-gray-800">Thariqi Ruli   <p style="color: green">Aktif</p></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>    
@endsection