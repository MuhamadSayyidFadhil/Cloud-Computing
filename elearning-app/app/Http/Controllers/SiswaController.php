<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Models\JawabanTugas;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        return view('siswa.dashboard');
    }

    public function lihatNilai()
    {
        $siswa = auth()->user();

        $jawaban = JawabanTugas::with('tugas')
            ->where('siswa_id', $siswa->id)
            ->latest()
            ->get();

        return view('siswa.nilai', compact('jawaban'));
    }

    public function editProfil()
    {
        return view('siswa.profil');
    }

    public function updateProfil(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kelas' => 'required|string',
            'tanggal_lahir' => 'nullable|date',
        ]);

        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'kelas' => $request->kelas,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }

    public function tugasIndex()
    {
        $kelas = auth()->user()->kelas;
        $tugas = Tugas::where('kelas', $kelas)->latest()->get();
        $jawabanSaya = JawabanTugas::where('siswa_id', auth()->id())->pluck('tugas_id')->toArray();

        return view('siswa.tugas.index', compact('tugas', 'jawabanSaya'));
    }

    public function jawabForm($id)
    {
        $tugas = Tugas::findOrFail($id);

        if ($tugas->kelas !== auth()->user()->kelas) {
            abort(403, 'Tugas ini bukan untuk kelas kamu.');
        }

        return view('siswa.tugas.jawab', compact('tugas'));
    }

    public function submitJawaban(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx,zip|max:2048',
        ]);

        $tugas = Tugas::findOrFail($id);

        if ($tugas->kelas !== auth()->user()->kelas) {
            abort(403, 'Tidak diizinkan.');
        }

        $path = $request->file('file')->store('jawaban', 'public');

        JawabanTugas::updateOrCreate(
            ['tugas_id' => $tugas->id, 'siswa_id' => auth()->id()],
            ['file' => $path, 'nilai' => null, 'komentar' => null]
        );

        return redirect()->route('siswa.tugas')->with('success', 'Jawaban berhasil dikirim!');
    }

    public function detailTugas($id)
    {
        $tugas = Tugas::findOrFail($id);
        $siswa = auth()->user();

        $jawaban = JawabanTugas::where('tugas_id', $id)
            ->where('siswa_id', $siswa->id)
            ->first();

        return view('siswa.tugas.detail', compact('tugas', 'jawaban'));
    }

    public function kumpulTugas(Request $request, $id)
    {
        $tugas = Tugas::findOrFail($id);
        $siswa = auth()->user();

        if (now()->gt($tugas->deadline)) {
            return back()->with('error', 'Deadline sudah lewat. Tidak bisa mengumpulkan.');
        }

        $request->validate([
            'file' => 'required|file|mimes:pdf,docx,doc|max:2048',
        ]);

        $path = $request->file('file')->store('jawaban', 'public');

        JawabanTugas::updateOrCreate(
            ['tugas_id' => $tugas->id, 'siswa_id' => $siswa->id],
            ['file' => $path]
        );

        return back()->with('success', 'Tugas berhasil dikumpulkan!');
    }
}
