<?php

namespace App\Http\Controllers;

use App\Models\TahunLulus;
use Illuminate\Http\Request;

class TahunLulusController extends Controller
{
    public function index()
    {
        $tahunLuluses = TahunLulus::all();
        return view('tahun_lulus.index', compact('tahunLuluses'));
    }

    public function create()
    {
        return view('tahun_lulus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun_lulus' => 'required|string|max:50',
            'keterangan' => 'nullable|string|max:50',
        ]);

        TahunLulus::create($request->all());
        return redirect()->route('tahun_lulus.index')->with('success', 'Tahun Lulus created successfully.');
    }

    public function edit($id)
    {
        $tahunLulus = TahunLulus::findOrFail($id);
        return view('tahun_lulus.edit', compact('tahunLulus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun_lulus' => 'required|string|max:50',
            'keterangan' => 'nullable|string|max:50',
        ]);

        $tahunLulus = TahunLulus::findOrFail($id);
        $tahunLulus->update($request->all());
        return redirect()->route('tahun_lulus.index')->with('success', 'Tahun Lulus updated successfully.');
    }

    public function destroy($id)
    {
        $tahunLulus = TahunLulus::findOrFail($id);
        $tahunLulus->delete();
        return redirect()->route('tahun_lulus.index')->with('success', 'Tahun Lulus deleted successfully.');
    }
}
