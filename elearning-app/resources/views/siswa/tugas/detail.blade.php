@extends('layouts.master')

@section('title', 'Detail Tugas')

@section('content')
<div class="container mt-4">
    <h3>{{ $tugas->judul }}</h3>
    <p>{{ $tugas->deskripsi }}</p>
    <p><strong>Deadline:</strong> {{ $tugas->deadline }}</p>

    @if ($tugas->file)
        <a href="{{ asset('storage/' . $tugas->file) }}" target="_blank" class="btn btn-sm btn-info">Lihat File Tugas</a>
    @endif

    <hr>

    @if ($jawaban)
        <p class="text-success">Kamu sudah mengumpulkan tugas ini.</p>
        <a href="{{ asset('storage/' . $jawaban->file) }}" target="_blank">Lihat Jawaban</a>
    @elseif(now()->lte($tugas->deadline))
        <form action="{{ route('siswa.tugas.kumpul', $tugas->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Upload Jawaban (PDF/DOC)</label>
                <input type="file" name="file" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Kumpulkan</button>
        </form>
    @else
        <p class="text-danger">Waktu pengumpulan sudah lewat.</p>
    @endif
</div>
@endsection
