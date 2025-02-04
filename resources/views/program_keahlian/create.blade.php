@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Program Keahlian</h1>

    <form action="{{ route('program_keahlian.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_bidang_keahlian" class="form-label">Bidang Keahlian</label>
            <select name="id_bidang_keahlian" id="id_bidang_keahlian" class="form-control" required>
                @foreach($bidangKeahlian as $item)
                    <option value="{{ $item->id_bidang_keahlian }}">{{ $item->bidang_keahlian }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="kode_program_keahlian" class="form-label">Kode Program Keahlian</label>
            <input type="text" class="form-control" name="kode_program_keahlian" id="kode_program_keahlian" required>
        </div>
        <div class="mb-3">
            <label for="program_keahlian" class="form-label">Program Keahlian</label>
            <input type="text" class="form-control" name="program_keahlian" id="program_keahlian" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
