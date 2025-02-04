@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Tahun Lulus</h1>

    <form action="{{ route('tahun_lulus.update', $tahunLulus->id_tahun_lulus) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
            <input type="text" class="form-control" name="tahun_lulus" id="tahun_lulus" value="{{ $tahunLulus->tahun_lulus }}" required>
        </div>
        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" value="{{ $tahunLulus->keterangan }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
