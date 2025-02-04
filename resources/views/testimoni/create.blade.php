@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Testimoni</h1>
    <form action="{{ route('testimoni.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_alumni">Alumni</label>
            <select name="id_alumni" id="id_alumni" class="form-control" required>
                @foreach ($alumni as $a)
                    <option value="{{ $a->id_alumni }}">{{ $a->nama_depan }} {{ $a->nama_belakang }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="testimoni">Testimoni</label>
            <textarea name="testimoni" id="testimoni" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="tgl_testimoni">Tanggal Testimoni</label>
            <input type="date" name="tgl_testimoni" id="tgl_testimoni" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
