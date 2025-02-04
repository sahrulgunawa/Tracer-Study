@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Status Alumni List</h1>
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('status_alumni.create') }}" class="btn btn-primary mb-3">Add Status Alumni</a>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Status</th>
                @if(auth()->user()->role === 'admin')
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($statusAlumnis as $item)
                <tr>
                    <td>{{ $item->id_status_alumni }}</td>
                    <td>{{ $item->status }}</td>
                    @if(auth()->user()->role === 'admin')
                        <td>
                            <a href="{{ route('status_alumni.edit', $item->id_status_alumni) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('status_alumni.destroy', $item->id_status_alumni) }}" method="POST" style="display:inline-block;">
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
