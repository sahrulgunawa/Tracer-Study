@extends(auth()->user()->role === 'admin' ? 'layouts.app' : 'layouts.user')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Kuesioner Tracer Kuliah</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('tracer_kuliah.submit-questionnaire') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Alumni</label>
                    <select name="id_alumni" class="form-control" required>
                        <option value="">Pilih Alumni</option>
                        @foreach($alumni as $alumnus)
                            <option value="{{ $alumnus->id_alumni }}">{{ $alumnus->nama_depan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Nama Kampus</label>
                    <input type="text" name="tracer_kuliah_kampus" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Status Kuliah</label>
                    <select name="tracer_kuliah_status" class="form-control" required>
                        <option value="">Pilih Status</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Lulus">Lulus</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Jenjang Pendidikan</label>
                    <select name="tracer_kuliah_jenjang" class="form-control" required>
                        <option value="">Pilih Jenjang</option>
                        <option value="D3">D3</option>
                        <option value="D4">D4</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Jurusan</label>
                    <input type="text" name="tracer_kuliah_jurusan" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Linier</label>
                    <select type="text" name="tracer_kuliah_linier" class="form-control" required>
                        <option value="">Pilih Linier</option>
                        <option value="Linier">Linier</option>
                        <option value="Non Linier">Non Linier</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="tracer_kuliah_alamat" class="form-control" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection