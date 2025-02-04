<?php

namespace App\Http\Controllers;

use App\Models\BidangKeahlian;
use Illuminate\Http\Request;

class BidangKeahlianController extends Controller
{
    public function index()
    {
        $bidangKeahlians = BidangKeahlian::all();
        return view('bidang_keahlian.index', compact('bidangKeahlians'));
    }

    public function create()
    {
        return view('bidang_keahlian.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_bidang_keahlian' => 'required|string|max:100',
            'bidang_keahlian' => 'required|string|max:100',
        ]);

        BidangKeahlian::create($request->all());
        return redirect()->route('bidang_keahlian.index')->with('success', 'Bidang Keahlian created successfully.');
    }

    public function edit($id)
    {
        $bidangKeahlian = BidangKeahlian::findOrFail($id);
        return view('bidang_keahlian.edit', compact('bidangKeahlian'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_bidang_keahlian' => 'required|string|max:100',
            'bidang_keahlian' => 'required|string|max:100',
        ]);

        $bidangKeahlian = BidangKeahlian::findOrFail($id);
        $bidangKeahlian->update($request->all());
        return redirect()->route('bidang_keahlian.index')->with('success', 'Bidang Keahlian updated successfully.');
    }

    public function destroy($id)
    {
        $bidangKeahlian = BidangKeahlian::findOrFail($id);
        $bidangKeahlian->delete();
        return redirect()->route('bidang_keahlian.index')->with('success', 'Bidang Keahlian deleted successfully.');
    }
}
