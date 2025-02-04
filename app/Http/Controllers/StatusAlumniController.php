<?php

namespace App\Http\Controllers;

use App\Models\StatusAlumni;
use Illuminate\Http\Request;

class StatusAlumniController extends Controller
{
    public function index()
    {
        $statusAlumnis = StatusAlumni::all();
        return view('status_alumni.index', compact('statusAlumnis'));
    }

    public function create()
    {
        return view('status_alumni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|string|max:25',
        ]);

        StatusAlumni::create($request->all());
        return redirect()->route('status_alumni.index')->with('success', 'Status Alumni created successfully.');
    }

    public function edit($id)
    {
        $statusAlumni = StatusAlumni::findOrFail($id);
        return view('status_alumni.edit', compact('statusAlumni'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|max:25',
        ]);

        $statusAlumni = StatusAlumni::findOrFail($id);
        $statusAlumni->update($request->all());
        return redirect()->route('status_alumni.index')->with('success', 'Status Alumni updated successfully.');
    }

    public function destroy($id)
    {
        $statusAlumni = StatusAlumni::findOrFail($id);
        $statusAlumni->delete();
        return redirect()->route('status_alumni.index')->with('success', 'Status Alumni deleted successfully.');
    }
}
