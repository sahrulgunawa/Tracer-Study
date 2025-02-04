@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Konfirmasi Penghapusan Alumni</h1>
        <p>Apakah Anda yakin ingin menghapus alumni <strong>{{ $alumni->nama_alumni }}</strong>?</p>

        <form action="{{ route('alumni.destroy', $alumni->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <div class="form-group">
                <label for="reason">Alasan Penghapusan (Opsional)</label>
                <textarea class="form-control" id="reason" name="reason" placeholder="Masukkan alasan penghapusan (opsional)"></textarea>
            </div>

            <button type="submit" class="btn btn-danger mt-3">Hapus Alumni</button>
            <a href="{{ route('alumni.index') }}" class="btn btn-secondary mt-3">Batal</a>
        </form>
    </div>
@endsection
