@extends('layouts.master')

@section('title', 'Jawab Tugas')

@section('content')
<div class="container mt-4">
    <h4>Jawaban untuk: {{ $tugas->judul }}</h4>
    <p><strong>Deskripsi:</strong> {{ $tugas->deskripsi }}</p>

    <form action="{{ route('siswa.jawab.submit', $tugas->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">Upload File Jawaban (PDF, DOC, ZIP)</label>
            <input type="file" name="file" class="form-control" required>
            @error('file')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Kirim Jawaban</button>
    </form>
</div>
@endsection
