@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Alumni</h1>
    @if(Auth::user()->role === 'admin')
        <a href="{{ route('alumni.create') }}" class="btn btn-primary mb-3">Tambah Alumni</a>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NISN</th>
                    <th>NIK</th>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th>Akun Facebook</th>
                    <th>Akun Instagram</th>
                    <th>Akun TikTok</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Tahun Lulus</th>
                    <th>Konsentrasi Keahlian</th>
                    <th>Status Alumni</th>
                    @if(Auth::user()->role === 'admin')
                        <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($alumni as $alumni)
                    <tr>
                        <td>{{ $alumni->id_alumni }}</td>
                        <td>{{ $alumni->nisn }}</td>
                        <td>{{ $alumni->nik }}</td>
                        <td>{{ $alumni->nama_depan }}</td>
                        <td>{{ $alumni->nama_belakang }}</td>
                        <td>{{ $alumni->jenis_kelamin }}</td>
                        <td>{{ $alumni->tempat_lahir }}</td>
                        <td>{{ \Carbon\Carbon::parse($alumni->tgl_lahir)->format('d/m/Y') }}</td>
                        <td>{{ $alumni->alamat }}</td>
                        <td>{{ $alumni->no_hp }}</td>
                        <td>{{ $alumni->akun_fb }}</td>
                        <td>{{ $alumni->akun_ig }}</td>
                        <td>{{ $alumni->akun_tiktok }}</td>
                        <td>{{ $alumni->email }}</td>
                        <td>{{ $alumni->statusAlumni->status }}</td>
                        <td>{{ $alumni->tahunLulus->tahun_lulus }}</td>
                        <td>{{ $alumni->konsentrasiKeahlian->konsentrasi_keahlian }}</td>
                        <td>{{ $alumni->statusAlumni->status }}</td>
                        @if(Auth::user()->role === 'admin')
                            <td>
                                <a href="{{ route('alumni.edit', $alumni->id_alumni) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('alumni.destroy', $alumni->id_alumni) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
