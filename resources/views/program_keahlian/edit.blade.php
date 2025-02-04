@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Program Keahlian</h1>

    <form action="{{ route('program_keahlian.update', $programKeahlian->id_program_keahlian) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="id_bidang_keahlian" class="form-label">Bidang Keahlian</label>
            <select name="id_bidang_keahlian" id="id_bidang_keahlian" class="form-control" required>
                @foreach($bidangKeahlian as $item)
                    <option value="{{ $item->id_bidang_keahlian }}" @if($item->id_bidang_keahlian == $programKeahlian->id_bidang_keahlian) selected @endif>
                        {{ $item->bidang_keahlian }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="kode_program_keahlian" class="form-label">Kode Program Keahlian</label>
            <input type="text" class="form-control" name="kode_program_keahlian" id="kode_program_keahlian" value="{{ $programKeahlian->kode_program_keahlian }}" required>
        </div>
        <div class="mb-3">
            <label for="program_keahlian" class="form-label">Program Keahlian</label>
            <input type="text" class="form-control" name="program_keahlian" id="program_keahlian" value="{{ $programKeahlian->program_keahlian }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
