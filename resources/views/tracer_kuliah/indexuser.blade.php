<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TracerStudy;
use Illuminate\Support\Facades\Auth;

class TracerStudyController extends Controller
{
    public function index()
    {
        $alumni = Auth::user();
        $tracer = TracerStudy::where('id_alumni', $alumni->id)->first();
        return view('tracer.index', compact('tracer'));
    }

    public function create()
    {
        return view('tracer.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'status_kerja' => 'required|string',
            'perusahaan' => 'nullable|string',
            'jabatan' => 'nullable|string',
            'tahun_masuk' => 'nullable|integer',
            'gaji' => 'nullable|numeric',
        ]);

        $alumni = Auth::user();
        $validated['id_alumni'] = $alumni->id;

        TracerStudy::updateOrCreate(
            ['id_alumni' => $alumni->id],
            $validated
        );

        return redirect()->route('tracer.index')->with('success', 'Data Tracer Study berhasil disimpan');
    }

    public function edit($id)
    {
        $tracer = TracerStudy::findOrFail($id);
        return view('tracer.edit', compact('tracer'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status_kerja' => 'required|string',
            'perusahaan' => 'nullable|string',
            'jabatan' => 'nullable|string',
            'tahun_masuk' => 'nullable|integer',
            'gaji' => 'nullable|numeric',
        ]);

        $tracer = TracerStudy::findOrFail($id);
        $tracer->update($validated);

        return redirect()->route('tracer.index')->with('success', 'Data Tracer Study berhasil diperbarui');
    }

    public function destroy($id)
    {
        $tracer = TracerStudy::findOrFail($id);
        $tracer->delete();

        return redirect()->route('tracer.index')->with('success', 'Data Tracer Study berhasil dihapus');
    }
}
