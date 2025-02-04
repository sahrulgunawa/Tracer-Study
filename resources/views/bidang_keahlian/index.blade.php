@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bidang Keahlian List</h1>
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('bidang_keahlian.create') }}" class="btn btn-primary mb-3">Add Bidang Keahlian</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Bidang Keahlian</th>
                <th>Bidang Keahlian</th>
                @if(auth()->user()->role === 'admin')
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($bidangKeahlians as $item)
                <tr>
                    <td>{{ $item->id_bidang_keahlian }}</td>
                    <td>{{ $item->kode_bidang_keahlian }}</td>
                    <td>{{ $item->bidang_keahlian }}</td>
                    @if(auth()->user()->role === 'admin')
                        <td>
                            <a href="{{ route('bidang_keahlian.edit', $item->id_bidang_keahlian) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('bidang_keahlian.destroy', $item->id_bidang_keahlian) }}" method="POST" style="display:inline-block;">
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
