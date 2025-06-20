<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
    public function index()
    {
        $tugas = Tugas::where('guru_id', Auth::id())->latest()->get();
        return view('guru.tugas.index', compact('tugas'));
    }

    public function create()
    {
        return view('guru.tugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'kelas' => 'required|string',
            'deadline' => 'required|date',
        ]);

        $filePath = null;

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('tugas', 'public');
        }

        Tugas::create([
            'guru_id' => Auth::id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $filePath,
            'kelas' => $request->kelas,
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dibuat.');
    }

    public function show($id)
    {
        $tugas = Tugas::findOrFail($id);
        return view('guru.tugas.show', compact('tugas'));
    }

    public function destroy($id)
    {
        $tugas = Tugas::findOrFail($id);
        if ($tugas->file) {
            \Storage::delete($tugas->file);
        }
        $tugas->delete();

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dihapus.');
    }



}
