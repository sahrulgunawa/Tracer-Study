@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Konsentrasi Keahlian</h1>

    <form action="{{ route('konsentrasi_keahlian.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_program_keahlian" class="form-label">Program Keahlian</label>
            <select name="id_program_keahlian" id="id_program_keahlian" class="form-control" required>
                @foreach($programKeahlian as $item)
                    <option value="{{ $item->id_program_keahlian }}">{{ $item->program_keahlian }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="kode_konsentrasi_keahlian" class="form-label">Kode Konsentrasi Keahlian</label>
            <input type="text" class="form-control" name="kode_konsentrasi_keahlian" id="kode_konsentrasi_keahlian" required>
        </div>
        <div class="mb-3">
            <label for="konsentrasi_keahlian" class="form-label">Konsentrasi Keahlian</label>
            <input type="text" class="form-control" name="konsentrasi_keahlian" id="konsentrasi_keahlian" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
