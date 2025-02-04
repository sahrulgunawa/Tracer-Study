@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Tracer Kerja</h1>
    <form action="{{ route('tracer_kerja.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_alumni">Alumni</label>
            <select name="id_alumni" id="id_alumni" class="form-control" required>
                @foreach ($alumni as $a)
                    <option value="{{ $a->id_alumni }}">{{ $a->nama_depan }} {{ $a->nama_belakang }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tracer_kerja_pekerjaan">Pekerjaan</label>
            <input type="text" name="tracer_kerja_pekerjaan" id="tracer_kerja_pekerjaan" class="form-control" value="{{ old('tracer_kerja_pekerjaan') }}" required>
        </div>

        <div class="form-group">
            <label for="tracer_kerja_nama">Nama Perusahaan</label>
            <input type="text" name="tracer_kerja_nama" id="tracer_kerja_nama" class="form-control" value="{{ old('tracer_kerja_nama') }}" required>
        </div>

        <div class="form-group">
            <label for="tracer_kerja_jabatan">Jabatan</label>
            <input type="text" name="tracer_kerja_jabatan" id="tracer_kerja_jabatan" class="form-control" value="{{ old('tracer_kerja_jabatan') }}" required>
        </div>

        <div class="form-group">
            <label for="tracer_kerja_status">Status Pekerjaan</label>
            <input type="text" name="tracer_kerja_status" id="tracer_kerja_status" class="form-control" value="{{ old('tracer_kerja_status') }}" required>
        </div>

        <div class="form-group">
            <label for="tracer_kerja_lokasi">Lokasi</label>
            <input type="text" name="tracer_kerja_lokasi" id="tracer_kerja_lokasi" class="form-control" value="{{ old('tracer_kerja_lokasi') }}" required>
        </div>

        <div class="form-group">
            <label for="tracer_kerja_alamat">Alamat</label>
            <input type="text" name="tracer_kerja_alamat" id="tracer_kerja_alamat" class="form-control" value="{{ old('tracer_kerja_alamat') }}" required>
        </div>

        <div class="form-group">
            <label for="tracer_kerja_tgl_mulai">Tanggal Mulai</label>
            <input type="date" name="tracer_kerja_tgl_mulai" id="tracer_kerja_tgl_mulai" class="form-control" value="{{ old('tracer_kerja_tgl_mulai') }}" required>
        </div>

        <div class="form-group">
            <label for="tracer_kerja_gaji">Gaji</label>
            <input type="text" name="tracer_kerja_gaji" id="tracer_kerja_gaji" class="form-control" value="{{ old('tracer_kerja_gaji') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
