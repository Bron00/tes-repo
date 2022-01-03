@extends('dashboard.dashboard')
@section('content')
<div class="card shadow col-6 mx-auto" style="margin-bottom: 10%; margin-top: 5%">
    <div class="card-header py-3 d-flex justify-content-between">
        <h4>Edit Sidang</h4>
    </div>
    <div class="card-body">
        @foreach($sidang as $p)
        <form action="/dashboard/paa/sidang/update" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id_sidang" value="{{ $p->id_sidang }}"> <br/>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Nama Dosen</label>
                <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="dosen">
                    @foreach ($dosen as $item)
                    <option value="{{ $item->nip_dosen }}">{{ $item->nama_dosen }}</option>
                    @endforeach
                  </select>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Nama Mahasiswa</label>
                <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="mhs">
                    @foreach ($mahasiswa as $item)
                    <option value="{{ $item->nim_mhs }}">{{ $item->nama_mhs }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Nama Laporan</label>
                <select class="form-select form-select-lg mb-3 form-control" aria-label=".form-select-lg example" name="laporan">
                    @foreach ($laporan as $item)
                    <option value="{{ $item->id_laporan }}">{{ $item->nama_laporan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Waktu</label>
                <input type="datetime-local" name="waktu" class="form-control" required="required" value="{{ $p->waktu_sidang }}">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Tempat</label>
                <input type="text" name="tempat" class="form-control" required="required" value="{{ $p->tempat_sidang }}">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Status</label><br>
                <input type="radio" name="status" required="required" value="1"> Sudah Dilaksanakan  <br>
                <input type="radio" name="status" required="required" value="0"> Belum Dilaksanakan  <br>
            </div>
            <div class="modal-footer">
                <a href="/dashboard/paa/sidang" class="btn btn-secondary">Kembali</a>
                <input type="submit" class="btn btn-primary" value="Simpan Data">
            </div>
        </form>
        @endforeach
    </div>
</div>
@endsection