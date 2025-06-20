<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\JawabanTugas;
use Illuminate\Http\Request;

class JawabanTugasController extends Controller
{
    // Menampilkan daftar jawaban tugas untuk penilaian oleh guru
    public function penilaian($id)
    {
        $tugas = Tugas::findOrFail($id);

        // Ambil semua jawaban tugas lengkap dengan relasi siswa
        $jawabanTugas = JawabanTugas::with('siswa')
            ->where('tugas_id', $id)
            ->get();

        return view('guru.tugas.penilaian', compact('tugas', 'jawabanTugas'));
    }

    // Menyimpan penilaian dan komentar untuk banyak jawaban sekaligus
    public function updateNilai(Request $request, $id)
    {
        foreach ($request->nilai as $jawabanId => $nilai) {
            $jawaban = JawabanTugas::find($jawabanId);
            if ($jawaban) {
                $jawaban->nilai = $nilai;
                $jawaban->komentar = $request->komentar[$jawabanId] ?? null;
                $jawaban->save();
            }
        }

        return redirect()->back()->with('success', 'Penilaian berhasil disimpan!');
    }
}

