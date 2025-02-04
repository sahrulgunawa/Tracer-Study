@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Konsentrasi Keahlian List</h1>
    @if(Auth::user()->role === 'admin')
    <a href="{{ route('konsentrasi_keahlian.create') }}" class="btn btn-primary mb-3">Add Konsentrasi Keahlian</a>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Konsentrasi Keahlian</th>
                <th>Konsentrasi Keahlian</th>
                <th>Program Keahlian</th>
                @if(Auth::user()->role === 'admin')
                <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($konsentrasiKeahlians as $item)
                <tr>
                    <td>{{ $item->id_konsentrasi_keahlian }}</td>
                    <td>{{ $item->kode_konsentrasi_keahlian }}</td>
                    <td>{{ $item->konsentrasi_keahlian }}</td>
                    <td>{{ $item->programKeahlian->program_keahlian }}</td>
                    @if(Auth::user()->role === 'admin')
                    <td>
                        <a href="{{ route('konsentrasi_keahlian.edit', $item->id_konsentrasi_keahlian) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('konsentrasi_keahlian.destroy', $item->id_konsentrasi_keahlian) }}" method="POST" style="display:inline-block;">
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
