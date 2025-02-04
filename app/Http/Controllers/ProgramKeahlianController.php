<?php

namespace App\Http\Controllers;

use App\Models\ProgramKeahlian;
use App\Models\BidangKeahlian;
use Illuminate\Http\Request;

class ProgramKeahlianController extends Controller
{
    public function index()
    {
        $programKeahlians = ProgramKeahlian::with('bidangKeahlian')->get();
        return view('program_keahlian.index', compact('programKeahlians'));
    }

    public function create()
    {
        $bidangKeahlian = BidangKeahlian::all();
        return view('program_keahlian.create', compact('bidangKeahlian'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_bidang_keahlian' => 'required|exists:tbl_bidang_keahlian,id_bidang_keahlian',
            'kode_program_keahlian' => 'required|string|max:100',
            'program_keahlian' => 'required|string|max:100',
        ]);

        ProgramKeahlian::create($request->all());
        return redirect()->route('program_keahlian.index')->with('success', 'Program Keahlian created successfully.');
    }

    public function edit($id)
    {
        $programKeahlian = ProgramKeahlian::findOrFail($id);
        $bidangKeahlian = BidangKeahlian::all();
        return view('program_keahlian.edit', compact('programKeahlian', 'bidangKeahlian'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_bidang_keahlian' => 'required|exists:tbl_bidang_keahlian,id_bidang_keahlian',
            'kode_program_keahlian' => 'required|string|max:100',
            'program_keahlian' => 'required|string|max:100',
        ]);

        $programKeahlian = ProgramKeahlian::findOrFail($id);
        $programKeahlian->update($request->all());
        return redirect()->route('program_keahlian.index')->with('success', 'Program Keahlian updated successfully.');
    }

    public function destroy($id)
    {
        $programKeahlian = ProgramKeahlian::findOrFail($id);
        $programKeahlian->delete();
        return redirect()->route('program_keahlian.index')->with('success', 'Program Keahlian deleted successfully.');
    }
}
