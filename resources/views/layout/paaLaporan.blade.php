@extends('dashboard.dashboard')
@section('content')
<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Tables Laporan</h1>
@if (session()->has('edit'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('edit') }}
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
                        <th>NAMA LAPORAN</th>
                        <th>JENIS LAPORAN</th>
                        <th>MAHASISWA</th>
                        <th>FILE LAPORAN</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporan as $item)
                    <tr>
                        <td>{{ $item->id_laporan }}</td>
                        <td>{{ $item->nama_laporan }}</td>
                        <td>
                            <?php 
                            if ($item->jenis_laporan==1){echo "PKL";}
                            if ($item->jenis_laporan==0){echo "Magang";}
                            ?>
                        </td>
                        <td>{{ $item->nama_mhs }}</td>
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
                            <div class="dropdown">
                            <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Download
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li class="pb-1 pl-2">
                                    <form action="/dashboard/paa/laporan/download" method="post">
                                        @csrf
                                        <input type="hidden" name="file" value="{{ $item->file_laporan }}">
                                        <button class="btn btn-success tombol border-0 text-center" name="op">
                                            Download
                                        </button>
                                  </form>
                                </li>
                              </ul>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                  Edit Status
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li class="pb-1 pl-2">
                                      <form action="/dashboard/paa/laporan/update" method="post">
                                          @csrf
                                          <input type="hidden" name="id_laporan" value="{{ $item->id_laporan }}">
                                          <input type="hidden" name="status" value="1">
                                          <button class="btn btn-success tombol border-0 text-center" name="op">
                                              Lengkap
                                          </button>
                                      </form>
                                    </li>
                                    <li class="pb-1 pl-2">
                                      <form action="/dashboard/paa/laporan/update" method="post">
                                          @csrf
                                          <input type="hidden" name="id_laporan" value="{{ $item->id_laporan }}">
                                          <input type="hidden" name="status" value="2">
                                          <button class="btn btn-danger tombol border-0 text-center" name="op">
                                              Tidak Lengkap
                                          </button>
                                      </form>
                                    </li>
                                    <li class="pb-1 pl-2">
                                      <form action="/dashboard/paa/laporan/update" method="post">
                                          @csrf
                                          <input type="hidden" name="id_laporan" value="{{ $item->id_laporan }}">
                                          <input type="hidden" name="status" value="3">
                                          <button class="btn btn-warning tombol border-0 text-center" name="op">
                                              Belum Diperiksa
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
</div>
    
@endsection