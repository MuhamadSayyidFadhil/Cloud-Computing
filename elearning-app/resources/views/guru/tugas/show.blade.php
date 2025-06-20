@extends('layouts.master')

@section('title', 'Detail Tugas')

@section('content')
<div class="container mt-4">
    <h3>Detail Tugas</h3>

    <div class="card">
        <div class="card-body">
            <p><strong>Judul:</strong> {{ $tugas->judul }}</p>
            <p><strong>Deskripsi:</strong> {{ $tugas->deskripsi ?? '-' }}</p>
            <p><strong>Kelas:</strong> {{ $tugas->kelas }}</p>
            <p><strong>Deadline:</strong> {{ $tugas->deadline }}</p>
            <p><strong>File:</strong>
                @if ($tugas->file)
                    <a href="{{ asset('storage/' . $tugas->file) }}" target="_blank">Lihat File</a>
                @else
                    Tidak ada file
                @endif
            </p>
            <a href="{{ route('tugas.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
