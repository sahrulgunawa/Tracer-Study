@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Bidang Keahlian</h1>

    <form action="{{ route('bidang_keahlian.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kode_bidang_keahlian" class="form-label">Kode Bidang Keahlian</label>
            <input type="text" class="form-control" name="kode_bidang_keahlian" id="kode_bidang_keahlian" required>
        </div>
        <div class="mb-3">
            <label for="bidang_keahlian" class="form-label">Bidang Keahlian</label>
            <input type="text" class="form-control" name="bidang_keahlian" id="bidang_keahlian" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
