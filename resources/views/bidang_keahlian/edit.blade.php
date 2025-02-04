@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Bidang Keahlian</h1>

    <form action="{{ route('bidang_keahlian.update', $bidangKeahlian->id_bidang_keahlian) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="kode_bidang_keahlian" class="form-label">Kode Bidang Keahlian</label>
            <input type="text" class="form-control" name="kode_bidang_keahlian" id="kode_bidang_keahlian" value="{{ $bidangKeahlian->kode_bidang_keahlian }}" required>
        </div>
        <div class="mb-3">
            <label for="bidang_keahlian" class="form-label">Bidang Keahlian</label>
            <input type="text" class="form-control" name="bidang_keahlian" id="bidang_keahlian" value="{{ $bidangKeahlian->bidang_keahlian }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
