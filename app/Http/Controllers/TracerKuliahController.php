<?php

namespace App\Http\Controllers;

use App\Models\TracerKuliah;
use App\Models\Alumni;
use Illuminate\Http\Request;

class TracerKuliahController extends Controller
{
    public function index()
    {
        $tracerKuliah = TracerKuliah::all();
        return view('tracer_kuliah.index', compact('tracerKuliah'));
    }

    public function create()
    {
        $alumni = Alumni::all();
        return view('tracer_kuliah.create', compact('alumni'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_alumni' => 'required|exists:tbl_alumni,id_alumni',
            'tracer_kuliah_kampus' => 'required',
            'tracer_kuliah_status' => 'required',
            'tracer_kuliah_jenjang' => 'required',
            'tracer_kuliah_jurusan' => 'required',
            'tracer_kuliah_linier' => 'required',
            'tracer_kuliah_alamat' => 'required',
        ]);

        TracerKuliah::create($request->all());
        return redirect()->route('tracer_kuliah.index')->with('success', 'Tracer Kuliah added successfully.');
    }

    public function edit(TracerKuliah $tracerKuliah)
    {
        $alumni = Alumni::all();
        return view('tracer_kuliah.edit', compact('tracerKuliah', 'alumni'));
    }

    public function update(Request $request, TracerKuliah $tracerKuliah)
    {
        $request->validate([
            'id_alumni' => 'required|exists:tbl_alumni,id_alumni',
            'tracer_kuliah_kampus' => 'required',
            'tracer_kuliah_status' => 'required',
            'tracer_kuliah_jenjang' => 'required',
            'tracer_kuliah_jurusan' => 'required',
            'tracer_kuliah_linier' => 'required',
            'tracer_kuliah_alamat' => 'required',
        ]);

        $tracerKuliah->update($request->all());
        return redirect()->route('tracer_kuliah.index')->with('success', 'Tracer Kuliah updated successfully.');
    }

    public function destroy(TracerKuliah $tracerKuliah)
    {
        $tracerKuliah->delete();
        return redirect()->route('tracer_kuliah.index')->with('success', 'Tracer Kuliah deleted successfully.');
    }

    public function showQuestionnaire()
    {
        $alumni = Alumni::all();
        return view('tracer_kuliah.questionnaire', compact('alumni'));
    }

    public function submitQuestionnaire(Request $request)
    {
        $request->validate([
            'id_alumni' => 'required|exists:tbl_alumni,id_alumni',
            'tracer_kuliah_kampus' => 'required',
            'tracer_kuliah_status' => 'required',
            'tracer_kuliah_jenjang' => 'required',
            'tracer_kuliah_jurusan' => 'required',
            'tracer_kuliah_linier' => 'required',
            'tracer_kuliah_alamat' => 'required',
        ]);

        TracerKuliah::create($request->all());
        return redirect()->route('tracer_kuliah.index')
            ->with('success', 'Kuesioner tracer kuliah berhasil disubmit.');
    }
}
