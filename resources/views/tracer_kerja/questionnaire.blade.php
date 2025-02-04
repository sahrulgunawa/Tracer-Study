@extends(auth()->user()->role === 'admin' ? 'layouts.app' : 'layouts.user')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Kuesioner Tracer Kerja</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('tracer_kerja.submit-questionnaire') }}" method="POST">
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
                    <label>Pekerjaan</label>
                    <input type="text" name="tracer_kerja_pekerjaan" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Nama Perusahaan</label>
                    <input type="text" name="tracer_kerja_nama" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="tracer_kerja_jabatan" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Bagaimana status kepegawaian Anda?</label>
                    <select name="tracer_kerja_status" class="form-control" required>
                        <option value="">Pilih Status</option>
                        <option value="Tetap">Tetap</option>
                        <option value="Kontrak">Kontrak</option>
                        <option value="Freelance">Freelance</option>
                        <option value="Wirausaha">Wirausaha</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Di kota mana lokasi tempat kerja Anda?</label>
                    <input type="text" name="tracer_kerja_lokasi" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Bagaimana alamat lengkap tempat kerja Anda?</label>
                    <textarea name="tracer_kerja_alamat" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label>Tanggal Mulai Kerja</label>
                    <input type="date" name="tracer_kerja_tgl_mulai" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Berapa gaji/penghasilan Anda per bulan?</label>
                    <input type="number" name="tracer_kerja_gaji" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Submit Kuesioner</button>
            </form>
        </div>
    </div>
</div>
@endsection