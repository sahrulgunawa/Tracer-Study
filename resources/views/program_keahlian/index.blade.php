@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Program Keahlian List</h1>
    @if(auth()->user()->role === 'admin')
    <a href="{{ route('program_keahlian.create') }}" class="btn btn-primary mb-3">Add Program Keahlian</a>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Program Keahlian</th>
                <th>Program Keahlian</th>
                <th>Bidang Keahlian</th>
                @if(auth()->user()->role === 'admin')
                <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($programKeahlians as $item)
                <tr>
                    <td>{{ $item->id_program_keahlian }}</td>
                    <td>{{ $item->kode_program_keahlian }}</td>
                    <td>{{ $item->program_keahlian }}</td>
                    <td>{{ $item->bidangKeahlian->bidang_keahlian }}</td>
                    @if(auth()->user()->role === 'admin')
                    <td>
                        <a href="{{ route('program_keahlian.edit', $item->id_program_keahlian) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('program_keahlian.destroy', $item->id_program_keahlian) }}" method="POST" style="display:inline-block;">
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
