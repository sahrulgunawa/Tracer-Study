<?php

namespace App\Http\Controllers;

use App\Models\KonsentrasiKeahlian;
use App\Models\ProgramKeahlian;
use Illuminate\Http\Request;

class KonsentrasiKeahlianController extends Controller
{
    public function index()
    {
        $konsentrasiKeahlians = KonsentrasiKeahlian::with('programKeahlian')->get();
        return view('konsentrasi_keahlian.index', compact('konsentrasiKeahlians'));
    }

    public function create()
    {
        $programKeahlian = ProgramKeahlian::all();
        return view('konsentrasi_keahlian.create', compact('programKeahlian'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_program_keahlian' => 'required|exists:tbl_program_keahlian,id_program_keahlian',
            'kode_konsentrasi_keahlian' => 'required|string|max:10',
            'konsentrasi_keahlian' => 'required|string|max:100',
        ]);

        KonsentrasiKeahlian::create($request->all());
        return redirect()->route('konsentrasi_keahlian.index')->with('success', 'Konsentrasi Keahlian created successfully.');
    }

    public function edit($id)
    {
        $konsentrasiKeahlian = KonsentrasiKeahlian::findOrFail($id);
        $programKeahlian = ProgramKeahlian::all();
        return view('konsentrasi_keahlian.edit', compact('konsentrasiKeahlian', 'programKeahlian'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_program_keahlian' => 'required|exists:tbl_program_keahlian,id_program_keahlian',
            'kode_konsentrasi_keahlian' => 'required|string|max:10',
            'konsentrasi_keahlian' => 'required|string|max:100',
        ]);

        $konsentrasiKeahlian = KonsentrasiKeahlian::findOrFail($id);
        $konsentrasiKeahlian->update($request->all());
        return redirect()->route('konsentrasi_keahlian.index')->with('success', 'Konsentrasi Keahlian updated successfully.');
    }

    public function destroy($id)
    {
        $konsentrasiKeahlian = KonsentrasiKeahlian::findOrFail($id);
        $konsentrasiKeahlian->delete();
        return redirect()->route('konsentrasi_keahlian.index')->with('success', 'Konsentrasi Keahlian deleted successfully.');
    }
}
