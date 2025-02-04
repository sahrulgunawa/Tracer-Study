@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Status Alumni</h1>

    <form action="{{ route('status_alumni.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <input type="text" class="form-control" name="status" id="status" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
