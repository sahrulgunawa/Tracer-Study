@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Tracer Kerja</h1>
    <form action="{{ route('tracer_kerja.update', $tracerKerja->id_tracer_kerja) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="id_alumni">Nama Alumni</label>
            <select name="id_alumni" id="id_alumni" class="form-control" required>
                @foreach ($alumni as $a)
                    <option value="{{ $a->id_alumni }}" @if($tracerKerja->id_alumni == $a->id_alumni) selected @endif>
                        {{ $a->nama_depan }} {{ $a->nama_belakang }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="tracer_kerja_pekerjaan">Pekerjaan</label>
            <input type="text" name="tracer_kerja_pekerjaan" id="tracer_kerja_pekerjaan" class="form-control" 
                value="{{ $tracerKerja->tracer_kerja_pekerjaan }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="tracer_kerja_nama">Nama Perusahaan</label>
            <input type="text" name="tracer_kerja_nama" id="tracer_kerja_nama" class="form-control" 
                value="{{ $tracerKerja->tracer_kerja_nama }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="tracer_kerja_jabatan">Jabatan</label>
            <input type="text" name="tracer_kerja_jabatan" id="tracer_kerja_jabatan" class="form-control" 
                value="{{ $tracerKerja->tracer_kerja_jabatan }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="tracer_kerja_status">Status Pekerjaan</label>
            <select name="tracer_kerja_status" id="tracer_kerja_status" class="form-control" required>
                <option value="Full-Time" @if($tracerKerja->tracer_kerja_status == 'Full-Time') selected @endif>Penuh Waktu</option>
                <option value="Part-Time" @if($tracerKerja->tracer_kerja_status == 'Part-Time') selected @endif>Paruh Waktu</option>
                <option value="Freelance" @if($tracerKerja->tracer_kerja_status == 'Freelance') selected @endif>Freelance</option>
                <option value="Kontrak" @if($tracerKerja->tracer_kerja_status == 'Kontrak') selected @endif>Kontrak</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="tracer_kerja_lokasi">Lokasi</label>
            <input type="text" name="tracer_kerja_lokasi" id="tracer_kerja_lokasi" class="form-control" 
                value="{{ $tracerKerja->tracer_kerja_lokasi }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="tracer_kerja_alamat">Alamat</label>
            <input type="text" name="tracer_kerja_alamat" id="tracer_kerja_alamat" class="form-control" 
                value="{{ $tracerKerja->tracer_kerja_alamat }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="tracer_kerja_tgl_mulai">Tanggal Mulai</label>
            <input type="date" name="tracer_kerja_tgl_mulai" id="tracer_kerja_tgl_mulai" class="form-control" 
                value="{{ $tracerKerja->tracer_kerja_tgl_mulai }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="tracer_kerja_gaji">Gaji</label>
            <input type="text" name="tracer_kerja_gaji" id="tracer_kerja_gaji" class="form-control" 
                value="{{ $tracerKerja->tracer_kerja_gaji }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('tracer_kerja.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
