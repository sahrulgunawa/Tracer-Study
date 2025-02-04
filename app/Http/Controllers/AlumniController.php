<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\TahunLulus;
use App\Models\KonsentrasiKeahlian;
use App\Models\StatusAlumni;
use Illuminate\Http\Request;
use App\Models\User;

class AlumniController extends Controller
{
    public function index()
    {
        $alumni = Alumni::with(['tahunLulus', 'konsentrasiKeahlian', 'statusAlumni'])->paginate(10); // Fetch 10 records per page
        return view('alumni.index', compact('alumni')); // Adjust the view path as needed
    }

    public function create()
    {
        $tahunLulus = TahunLulus::all();
        $konsentrasiKeahlian = KonsentrasiKeahlian::all();
        $statusAlumni = StatusAlumni::all();
        return view('alumni.create', compact('tahunLulus', 'konsentrasiKeahlian', 'statusAlumni'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_tahun_lulus' => 'required|exists:tb_tahun_lulus,id_tahun_lulus',
            'id_konsentrasi_keahlian' => 'required|exists:tbl_konsentrasi_keahlian,id_konsentrasi_keahlian',
            'id_status_alumni' => 'required|exists:tbl_status_alumni,id_status_alumni',
            'nisn' => 'required|string|max:20',
            'nik' => 'required|string|max:20',
            'nama_depan' => 'required|string|max:50',
            'nama_belakang' => 'required|string|max:50',
            'jenis_kelamin' => 'required|string|max:10',
            'tempat_lahir' => 'required|string|max:20',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string|max:50',
            'no_hp' => 'required|string|max:15',
            'akun_fb' => 'nullable|string|max:50',
            'akun_ig' => 'nullable|string|max:50',
            'akun_tiktok' => 'nullable|string|max:50',
            'email' => 'required|email|max:50|unique:tbl_alumni,email',
            'password' => 'required|string|min:6',
        ]);

        // Buat user baru dengan role 'user'
        $user = User::create([
            'name' => $validatedData['nama_depan'] . ' ' . $validatedData['nama_belakang'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => 'user', // Pastikan kolom 'role' ada di tabel users
        ]);

        Alumni::create($validatedData);
        return redirect()->route('alumni.index')->with('success', 'Alumni created successfully.');
    }

    public function edit($id)
    {
        $alumni = Alumni::findOrFail($id);
        $tahunLulus = TahunLulus::all();
        $konsentrasiKeahlian = KonsentrasiKeahlian::all();
        $statusAlumni = StatusAlumni::all();
        return view('alumni.edit', compact('alumni', 'tahunLulus', 'konsentrasiKeahlian', 'statusAlumni'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_tahun_lulus' => 'required|exists:tb_tahun_lulus,id_tahun_lulus',
            'id_konsentrasi_keahlian' => 'required|exists:tbl_konsentrasi_keahlian,id_konsentrasi_keahlian',
            'id_status_alumni' => 'required|exists:tbl_status_alumni,id_status_alumni',
            'nisn' => 'required|string|max:20',
            'nik' => 'required|string|max:20',
            'nama_depan' => 'required|string|max:50',
            'nama_belakang' => 'required|string|max:50',
            'jenis_kelamin' => 'required|string|max:10',
            'tempat_lahir' => 'required|string|max:20',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required|string|max:50',
            'no_hp' => 'required|string|max:15',
            'akun_fb' => 'nullable|string|max:50',
            'akun_ig' => 'nullable|string|max:50',
            'akun_tiktok' => 'nullable|string|max:50',
            'email' => 'required|email|max:50|unique:tbl_alumni,email,' . $id . ',id_alumni',
            'password' => 'required|string|min:6',
        ]);

        $alumni = Alumni::findOrFail($id);
        $alumni->update($request->all());
        return redirect()->route('alumni.index')->with('success', 'Alumni updated successfully.');
    }

    public function destroy($id)
    {
        $alumni = Alumni::findOrFail($id);
        $alumni->delete();
        return redirect()->route('alumni.index')->with('success', 'Alumni deleted successfully.');
    }
}
