@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tahun Lulus List</h1>
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('tahun_lulus.create') }}" class="btn btn-primary mb-3">Add Tahun Lulus</a>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tahun Lulus</th>
                <th>Keterangan</th>
                @if(auth()->user()->role === 'admin')
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($tahunLuluses as $item)
                <tr>
                    <td>{{ $item->id_tahun_lulus }}</td>
                    <td>{{ $item->tahun_lulus }}</td>
                    <td>{{ $item->keterangan }}</td>
                    @if(auth()->user()->role === 'admin')
                        <td>
                            <a href="{{ route('tahun_lulus.edit', $item->id_tahun_lulus) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tahun_lulus.destroy', $item->id_tahun_lulus) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
