@extends(auth()->user()->role === 'admin' ? 'layouts.app' : 'layouts.user')

@section('content')
<div class="container">
    <h1>Tracer Kuliah List</h1>
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('tracer_kuliah.create') }}" class="btn btn-primary mb-3">Add Tracer Kuliah</a>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Alumni</th>
                <th>Kampus</th>
                <th>Status</th>
                <th>Jenjang</th>
                <th>Jurusan</th>
                <th>Linier</th>
                <th>Alamat</th>
                @if(auth()->user()->role === 'admin')
                    <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($tracerKuliah as $item)
                <tr>
                    <td>{{ $item->id_tracer_kuliah }}</td>
                    <td>{{ $item->alumni->nama_depan }} {{ $item->alumni->nama_belakang }}</td>
                    <td>{{ $item->tracer_kuliah_kampus }}</td>
                    <td>{{ $item->tracer_kuliah_status }}</td>
                    <td>{{ $item->tracer_kuliah_jenjang }}</td>
                    <td>{{ $item->tracer_kuliah_jurusan }}</td>
                    <td>{{ $item->tracer_kuliah_linier }}</td>
                    <td>{{ $item->tracer_kuliah_alamat }}</td>
                    @if(auth()->user()->role === 'admin')
                        <td>
                            <a href="{{ route('tracer_kuliah.edit', $item->id_tracer_kuliah) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tracer_kuliah.destroy', $item->id_tracer_kuliah) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
