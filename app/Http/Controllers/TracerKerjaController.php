<?php

namespace App\Http\Controllers;

use App\Models\TracerKerja;
use App\Models\Alumni;
use Illuminate\Http\Request;

class TracerKerjaController extends Controller
{
    public function index()
    {
        $tracerKerja = TracerKerja::with('alumni')->get();
        return view('tracer_kerja.index', compact('tracerKerja'));
    }

    public function indexUser()
    {
        // Your logic here
        return view('tracer_kerja.indexuser');
    }

    public function create()
    {
        $alumni = Alumni::all();
        return view('tracer_kerja.create', compact('alumni'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_alumni' => 'required|exists:tbl_alumni,id_alumni',
            'tracer_kerja_pekerjaan' => 'required|string|max:50',
            'tracer_kerja_nama' => 'required|string|max:50',
            'tracer_kerja_jabatan' => 'required|string|max:50',
            'tracer_kerja_status' => 'required|string|max:50',
            'tracer_kerja_lokasi' => 'required|string|max:50',
            'tracer_kerja_alamat' => 'required|string|max:50',
            'tracer_kerja_tgl_mulai' => 'required|date',
            'tracer_kerja_gaji' => 'nullable|string|max:50',
        ]);

        TracerKerja::create($request->all());

        return redirect()->route('tracer_kerja.index')->with('success', 'Tracer Kerja created successfully.');
    }

    public function edit($id)
    {
        $tracerKerja = TracerKerja::findOrFail($id);
        $alumni = Alumni::all();
        return view('tracer_kerja.edit', compact('tracerKerja', 'alumni'));
    }

    public function update(Request $request, $id)
    {
        $tracerKerja = TracerKerja::findOrFail($id);
        
        $request->validate([
            'id_alumni' => 'required|exists:tbl_alumni,id_alumni',
            'tracer_kerja_pekerjaan' => 'required|string|max:50',
            'tracer_kerja_nama' => 'required|string|max:50',
            'tracer_kerja_jabatan' => 'required|string|max:50',
            'tracer_kerja_status' => 'required|string|max:50',
            'tracer_kerja_lokasi' => 'required|string|max:50',
            'tracer_kerja_alamat' => 'required|string|max:50',
            'tracer_kerja_tgl_mulai' => 'required|date',
            'tracer_kerja_gaji' => 'nullable|string|max:50',
        ]);

        $tracerKerja->update($request->all());
        return redirect()->route('tracer_kerja.index')->with('success', 'Tracer Kerja updated successfully.');
    }

    public function destroy(TracerKerja $tracerKerja)
    {
        $tracerKerja->delete();

        return redirect()->route('tracer_kerja.index')->with('success', 'Tracer Kerja deleted successfully.');
    }

    public function showQuestionnaire()
    {
        $alumni = Alumni::all();
        return view('tracer_kerja.questionnaire', compact('alumni'));
    }

    public function submitQuestionnaire(Request $request)
    {
        $request->validate([
            'id_alumni' => 'required|exists:tbl_alumni,id_alumni',
            'tracer_kerja_pekerjaan' => 'required|string|max:50',
            'tracer_kerja_nama' => 'required|string|max:50',
            'tracer_kerja_jabatan' => 'required|string|max:50',
            'tracer_kerja_status' => 'required|string|max:50',
            'tracer_kerja_lokasi' => 'required|string|max:50',
            'tracer_kerja_alamat' => 'required|string|max:50',
            'tracer_kerja_tgl_mulai' => 'required|date',
            'tracer_kerja_gaji' => 'nullable|string|max:50',
        ]);

        TracerKerja::create($request->all());
        return redirect()->route('tracer_kerja.index')
            ->with('success', 'Kuesioner tracer kuliah berhasil disubmit.');
    }

    
}
