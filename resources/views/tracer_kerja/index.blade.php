@extends(auth()->user()->role === 'admin' ? 'layouts.app' : 'layouts.user')

@section('content')
<div class="container">
    <h1>Daftar Tracer Kerja</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Alumni</th>
                <th>Pekerjaan</th>
                <th>Nama Perusahaan</th>
                <th>Jabatan</th>
                <th>Status Pekerjaan</th>
                <th>Lokasi</th>
                <th>Alamat</th>
                <th>Tanggal Mulai</th>
                <th>Gaji</th>
                @if(auth()->user()->role === 'admin')
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($tracerKerja as $item)
                <tr>
                    <td>{{ $item->id_tracer_kerja }}</td>
                    <td>{{ $item->alumni->nama_depan }} {{ $item->alumni->nama_belakang }}</td>
                    <td>{{ $item->tracer_kerja_pekerjaan }}</td>
                    <td>{{ $item->tracer_kerja_nama }}</td> <!-- Nama Perusahaan -->
                    <td>{{ $item->tracer_kerja_jabatan }}</td>
                    <td>{{ $item->tracer_kerja_status }}</td>
                    <td>{{ $item->tracer_kerja_lokasi }}</td>
                    <td>{{ $item->tracer_kerja_alamat }}</td> <!-- Alamat -->
                    <td>{{ $item->tracer_kerja_tgl_mulai }}</td> <!-- Tanggal Mulai -->
                    <td>{{ $item->tracer_kerja_gaji }}</td> <!-- Gaji -->
                    @if(auth()->user()->role === 'admin')
                        <td>
                            <form action="{{ route('tracer_kerja.destroy', $item->id_tracer_kerja) }}" method="POST" class="d-inline">
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
@endsection
