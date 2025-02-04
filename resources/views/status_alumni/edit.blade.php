@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Status Alumni</h1>

    <form action="{{ route('status_alumni.update', $statusAlumni->id_status_alumni) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" name="status" id="status" value="{{ $statusAlumni->status }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
