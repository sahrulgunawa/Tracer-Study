@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Alumni</h1>
    <form action="{{ route('alumni.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nisn">NISN</label>
            <input type="text" name="nisn" id="nisn" class="form-control" value="{{ old('nisn') }}" required>
        </div>

        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik" class="form-control" value="{{ old('nik') }}" required>
        </div>

        <div class="form-group">
            <label for="nama_depan">Nama Depan</label>
            <input type="text" name="nama_depan" id="nama_depan" class="form-control" value="{{ old('nama_depan') }}" required>
        </div>

        <div class="form-group">
            <label for="nama_belakang">Nama Belakang</label>
            <input type="text" name="nama_belakang" id="nama_belakang" class="form-control" value="{{ old('nama_belakang') }}" required>
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}" required>
        </div>

        <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="{{ old('tgl_lahir') }}" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat') }}" required>
        </div>

        <div class="form-group">
            <label for="no_hp">Nomor Telepon</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ old('no_hp') }}" required>
        </div>

        <div class="form-group">
            <label for="akun_fb">Akun Facebook</label>
            <input type="text" name="akun_fb" id="akun_fb" class="form-control" value="{{ old('akun_fb') }}">
        </div>

        <div class="form-group">
            <label for="akun_ig">Akun Instagram</label>
            <input type="text" name="akun_ig" id="akun_ig" class="form-control" value="{{ old('akun_ig') }}">
        </div>

        <div class="form-group">
            <label for="akun_tiktok">Akun TikTok</label>
            <input type="text" name="akun_tiktok" id="akun_tiktok" class="form-control" value="{{ old('akun_tiktok') }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Kata Sandi</label>
            <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}" required>
        </div>

        <div class="form-group">
            <label for="id_tahun_lulus">Tahun Lulus</label>
            <select name="id_tahun_lulus" id="id_tahun_lulus" class="form-control" required>
                @foreach ($tahunLulus as $tahun)
                    <option value="{{ $tahun->id_tahun_lulus }}" {{ old('id_tahun_lulus') == $tahun->id_tahun_lulus ? 'selected' : '' }}>{{ $tahun->tahun_lulus }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_konsentrasi_keahlian">Konsentrasi Keahlian</label>
            <select name="id_konsentrasi_keahlian" id="id_konsentrasi_keahlian" class="form-control" required>
                @foreach ($konsentrasiKeahlian as $kon)
                    <option value="{{ $kon->id_konsentrasi_keahlian }}" {{ old('id_konsentrasi_keahlian') == $kon->id_konsentrasi_keahlian ? 'selected' : '' }}>{{ $kon->konsentrasi_keahlian }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_status_alumni">Status Alumni</label>
            <select name="id_status_alumni" id="id_status_alumni" class="form-control" required>
                @foreach ($statusAlumni as $status)
                    <option value="{{ $status->id_status_alumni }}" {{ old('id_status_alumni') == $status->id_status_alumni ? 'selected' : '' }}>{{ $status->status }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
