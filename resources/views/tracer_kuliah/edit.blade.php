@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Tracer Kuliah</h1>
    <form action="{{ route('tracer_kuliah.update', $tracerKuliah->id_tracer_kuliah) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_alumni">Alumni</label>
            <select name="id_alumni" id="id_alumni" class="form-control" required>
                @foreach ($alumni as $alum)
                    <option value="{{ $alum->id_alumni }}" {{ $tracerKuliah->id_alumni == $alum->id_alumni ? 'selected' : '' }}>
                        {{ $alum->nama_depan }} {{ $alum->nama_belakang }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tracer_kuliah_kampus">Kampus</label>
            <input type="text" name="tracer_kuliah_kampus" value="{{ $tracerKuliah->tracer_kuliah_kampus }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tracer_kuliah_status">Status</label>
            <input type="text" name="tracer_kuliah_status" value="{{ $tracerKuliah->tracer_kuliah_status }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tracer_kuliah_jenjang">Jenjang</label>
            <input type="text" name="tracer_kuliah_jenjang" value="{{ $tracerKuliah->tracer_kuliah_jenjang }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tracer_kuliah_jurusan">Jurusan</label>
            <input type="text" name="tracer_kuliah_jurusan" value="{{ $tracerKuliah->tracer_kuliah_jurusan }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tracer_kuliah_linier">Linier</label>
            <input type="text" name="tracer_kuliah_linier" value="{{ $tracerKuliah->tracer_kuliah_linier }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tracer_kuliah_alamat">Alamat</label>
            <input type="text" name="tracer_kuliah_alamat" value="{{ $tracerKuliah->tracer_kuliah_alamat }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
@endsection
