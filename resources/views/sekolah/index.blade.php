@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-primary">Daftar Sekolah</h1>
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('sekolah.create') }}" class="btn btn-primary mb-3">Tambah Sekolah</a>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NPSN</th>
                <th>NSS</th>
                <th>Nama Sekolah</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Website</th>
                <th>Email</th>
                @if(auth()->user()->role === 'admin')
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($sekolahs as $sekolah)
                <tr>
                    <td>{{ $sekolah->id_sekolah }}</td>
                    <td>{{ $sekolah->npsn }}</td>
                    <td>{{ $sekolah->nss }}</td>
                    <td>{{ $sekolah->nama_sekolah }}</td>
                    <td>{{ $sekolah->alamat }}</td>
                    <td>{{ $sekolah->no_telp }}</td>
                    <td>
                        <a href="{{ $sekolah->website }}" class="text-primary" target="_blank">{{ $sekolah->website }}</a>
                    </td>
                    <td>{{ $sekolah->email }}</td>
                    @if(auth()->user()->role === 'admin')
                        <td>
                            <a href="{{ route('sekolah.edit', $sekolah->id_sekolah) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('sekolah.destroy', $sekolah->id_sekolah) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection