@extends('layouts.master')

@section('title', 'Buat Tugas')

@section('content')
<div class="container mt-4">
    <h3>Buat Tugas Baru</h3>
    <form action="{{ route('tugas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Judul Tugas</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label>Upload File (Opsional, PDF/DOCX)</label>
            <input type="file" name="file" class="form-control-file">
        </div>

        <div class="form-group">
            <label>Untuk Kelas</label>
            <select name="kelas" class="form-control" required>
                <option value="7">Kelas 7</option>
                <option value="8">Kelas 8</option>
                <option value="9">Kelas 9</option>
            </select>
        </div>

        <div class="form-group">
            <label>Deadline</label>
            <input type="date" name="deadline" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Simpan</button>
    </form>
</div>
@endsection
