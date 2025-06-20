@extends('layouts.master')

@section('title', 'Profil Guru')

@section('content')
    <div class="container mt-4">
        <h3>Profil Guru</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('guru.profil.update') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>

            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ $user->tanggal_lahir }}">
            </div>

            <div class="form-group">
                <label>Mata Pelajaran</label>
                <select name="mapel" class="form-control">
                    <option value="Matematika" {{ $user->mapel == 'Matematika' ? 'selected' : '' }}>Matematika</option>
                    <option value="IPA" {{ $user->mapel == 'IPA' ? 'selected' : '' }}>IPA</option>
                    <option value="Bahasa Indonesia" {{ $user->mapel == 'Bahasa Indonesia' ? 'selected' : '' }}>Bahasa
                        Indonesia</option>
                    <!-- Tambah sesuai kebutuhan -->
                </select>
            </div>

            <div class="form-group">
                <label>Kelas</label>
                <select name="kelas" class="form-control">
                    <option value="7" {{ $user->kelas == '7' ? 'selected' : '' }}>Kelas 7</option>
                    <option value="8" {{ $user->kelas == '8' ? 'selected' : '' }}>Kelas 8</option>
                    <option value="9" {{ $user->kelas == '9' ? 'selected' : '' }}>Kelas 9</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    </div>
@endsection