@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Sekolah</h1>

    <form action="{{ route('sekolah.update', $sekolah->id_sekolah) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="npsn" class="form-label">NPSN</label>
            <input type="text" class="form-control" name="npsn" id="npsn" value="{{ $sekolah->npsn }}" required>
        </div>
        <div class="mb-3">
            <label for="nss" class="form-label">NSS</label>
            <input type="text" class="form-control" name="nss" id="nss" value="{{ $sekolah->nss }}">
        </div>
        <div class="mb-3">
            <label for="nama_sekolah" class="form-label">Nama Sekolah</label>
            <input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah" value="{{ $sekolah->nama_sekolah }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $sekolah->alamat }}">
        </div>
        <div class="mb-3">
            <label for="no_telp" class="form-label">No. Telepon</label>
            <input type="text" class="form-control" name="no_telp" id="no_telp" value="{{ $sekolah->no_telp }}">
        </div>
        <div class="mb-3">
            <label for="website" class="form-label">Website</label>
            <input type="text" class="form-control" name="website" id="website" value="{{ $sekolah->website }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $sekolah->email }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
