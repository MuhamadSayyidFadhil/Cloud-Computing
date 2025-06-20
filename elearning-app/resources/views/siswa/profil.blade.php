@extends('layouts.master')

@section('title', 'Profil Siswa')

@section('content')
    <div class="container mt-4">
        <h3>Profil Siswa</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('siswa.profil.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control"
                    value="{{ old('tanggal_lahir', auth()->user()->tanggal_lahir) }}">
            </div>

            <div class="form-group">
                <label>Kelas</label>
                <select name="kelas" class="form-control" required>
                    <option value="7" {{ auth()->user()->kelas == '7' ? 'selected' : '' }}>Kelas 7</option>
                    <option value="8" {{ auth()->user()->kelas == '8' ? 'selected' : '' }}>Kelas 8</option>
                    <option value="9" {{ auth()->user()->kelas == '9' ? 'selected' : '' }}>Kelas 9</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection