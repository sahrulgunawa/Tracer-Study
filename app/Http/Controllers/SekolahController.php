<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index()
    {
        $sekolahs = Sekolah::all();
        return view('sekolah.index', compact('sekolahs'));
    }

    public function create()
    {
        return view('sekolah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'npsn' => 'required|max:10',
            'nss' => 'nullable|max:20',
            'nama_sekolah' => 'required|max:50',
            'alamat' => 'nullable|max:50',
            'no_telp' => 'nullable|max:15',
            'website' => 'nullable|max:50',
            'email' => 'nullable|email|max:50',
        ]);

        Sekolah::create($request->all());
        return redirect()->route('sekolah.index')->with('success', 'Sekolah created successfully.');
    }

    public function edit($id_sekolah)
    {
        $sekolah = Sekolah::findOrFail($id_sekolah);
        return view('sekolah.edit', compact('sekolah'));
    }

    public function update(Request $request, $id_sekolah)
    {
        $request->validate([
            'npsn' => 'required|max:10',
            'nss' => 'nullable|max:20',
            'nama_sekolah' => 'required|max:50',
            'alamat' => 'nullable|max:50',
            'no_telp' => 'nullable|max:15',
            'website' => 'nullable|max:50',
            'email' => 'nullable|email|max:50',
        ]);

        $sekolah = Sekolah::findOrFail($id_sekolah);
        $sekolah->update($request->all());
        return redirect()->route('sekolah.index')->with('success', 'Sekolah updated successfully.');
    }

    public function destroy($id_sekolah)
    {
        $sekolah = Sekolah::findOrFail($id_sekolah);
        $sekolah->delete();
        return redirect()->route('sekolah.index')->with('success', 'Sekolah deleted successfully.');
    }
}
