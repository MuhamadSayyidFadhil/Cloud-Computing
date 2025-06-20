<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        return view('guru.dashboard', compact('user'));
    }

    public function editProfil()
    {
        $user = Auth::user();
        return view('guru.profil', compact('user'));
    }

    public function updateProfil(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'mapel' => 'required|string',
            'kelas' => 'required|string',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->mapel = $request->mapel;
        $user->kelas = $request->kelas;
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }


}


