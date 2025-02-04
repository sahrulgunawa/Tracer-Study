@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Testimoni</h1>
    <form action="{{ route('testimoni.update', $testimoni->id_testimoni) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_alumni">Alumni</label>
            <select name="id_alumni" id="id_alumni" class="form-control" required>
                @foreach ($alumni as $a)
                    <option value="{{ $a->id_alumni }}" @if($testimoni->id_alumni == $a->id_alumni) selected @endif>
                        {{ $a->nama_depan }} {{ $a->nama_belakang }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="testimoni">Testimoni</label>
            <textarea name="testimoni" id="testimoni" class="form-control" required>{{ $testimoni->testimoni }}</textarea>
        </div>
        <div class="form-group">
            <label for="tgl_testimoni">Tanggal Testimoni</label>
            <input type="date" name="tgl_testimoni" id="tgl_testimoni" class="form-control" value="{{ $testimoni->tgl_testimoni }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
