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
                    <label>Apa jenis pekerjaan Anda saat ini?</label>
                    <input type="text" name="tracer_kerja_jenis" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Dimana tempat Anda bekerja?</label>
                    <input type="text" name="tracer_kerja_tempat" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Apa jabatan Anda di tempat kerja?</label>
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
                    <input type="text" name="tracer_kerja_kota" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Bagaimana alamat lengkap tempat kerja Anda?</label>
                    <textarea name="tracer_kerja_alamat" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label>Berapa gaji/penghasilan Anda per bulan?</label>
                    <input type="number" name="tracer_kerja_gaji" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit Kuesioner</button>
            </form>
        </div>
    </div>
</div>
@endsection
