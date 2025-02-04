<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Menghitung jumlah data di masing-masing tabel
        $counts = [
            'sekolah' => DB::table('tbl_sekolah')->count(),
            'bidang_keahlian' => DB::table('tbl_bidang_keahlian')->count(),
            'tahun_lulus' => DB::table('tb_tahun_lulus')->count(),
            'program_keahlian' => DB::table('tbl_program_keahlian')->count(),
            'konsentrasi_keahlian' => DB::table('tbl_konsentrasi_keahlian')->count(),
            'alumni' => DB::table('tbl_alumni')->count(),
            'tracer_kuliah' => DB::table('tbl_tracer_kuliah')->count(),
            'tracer_kerja' => DB::table('tbl_tracer_kerja')->count(),
            'status_alumni' => DB::table('tbl_status_alumni')->count(),
            'testimoni' => DB::table('tbl_testimoni')->count(),
        ];

        // Kirim data ke view
        return view('admin.dashboard', compact('counts'));
    }

}
