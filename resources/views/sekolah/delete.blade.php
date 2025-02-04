<!-- resources/views/sekolah/delete.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Konfirmasi Penghapusan</h4>
                </div>

                <div class="card-body">
                    <p>Apakah Anda yakin ingin menghapus sekolah <strong>{{ $sekolah->name }}</strong>?</p>
                    
                    <!-- Formulir untuk menghapus sekolah -->
                    <form action="{{ route('sekolah.destroy', $sekolah->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="d-flex justify-content-between">
                            <!-- Tombol untuk konfirmasi hapus -->
                            <button type="submit" class="btn btn-danger">Hapus</button>
                            <!-- Tombol untuk membatalkan hapus -->
                            <a href="{{ route('sekolah.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
