<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::with('alumni')->get();
        return view('testimoni.index', compact('testimonis'));
    }

    public function indexUser()
    {
        $testimonis = Testimoni::with('alumni')->get();
        return view('testimoni.indexuser', compact('testimonis'));
    }

    public function create()
    {
        $alumni = Alumni::all();
        return view('testimoni.create', compact('alumni'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'testimoni' => 'required',
        ]);

        // Pastikan user yang login adalah alumni dan memiliki id_alumni
        if (!auth()->user()->id_alumni) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk membuat testimoni.');
        }

        try {
            Testimoni::create([
                'id_alumni' => auth()->user()->id_alumni,
                'testimoni' => $request->testimoni,
                'tgl_testimoni' => date('Y-m-d'), // Menggunakan format date yang sesuai
            ]);

            return redirect()->route('testimoni.index')
                ->with('success', 'Testimoni berhasil ditambahkan');
        } catch (\Exception $e) {
            \Log::error('Error creating testimoni: ' . $e->getMessage()); // Tambahkan log untuk debugging
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan testimoni: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $alumni = Alumni::all();
        return view('testimoni.edit', compact('testimoni', 'alumni'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_alumni' => 'required|exists:tbl_alumni,id_alumni',
            'testimoni' => 'required',
            'tgl_testimoni' => 'required|date',
        ]);

        $testimoni = Testimoni::findOrFail($id);
        $testimoni->update($request->all());

        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil diperbarui');
    }

    public function destroy($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->delete();

        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil dihapus');
    }

    public function createUser()
    {
        return view('testimoni.createuser');
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'testimoni' => 'required|string',
        ]);

        try {
            $alumni = Alumni::where('email', Auth::user()->email)->first();
            $data = [
                'id_alumni' => $alumni->id_alumni,
                'testimoni' => $request->testimoni,
                'tgl_testimoni' => now(),
            ];

            $testimoni = Testimoni::create($data);

            return redirect()->back()->with('success', 'Testimoni berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error: ' . $e->getMessage())
                ->withInput();
        }
    }   
}
