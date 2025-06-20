@extends('layouts.master')

@section('title', 'Daftar Tugas')

@section('content')
    <div class="container mt-4">
        <h3>Daftar Tugas</h3>

        <a href="{{ route('tugas.create') }}" class="btn btn-success mb-3">+ Buat Tugas</a>

        @if($tugas->isEmpty())
            <p>Belum ada tugas yang dibuat.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Kelas</th>
                        <th>Deadline</th>
                        <th>File</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tugas as $t)
                        <tr>
                            <td>{{ $t->judul }}</td>
                            <td>{{ $t->kelas }}</td>
                            <td>{{ $t->deadline }}</td>
                            <td>
                                @if ($t->file)
                                    <a href="{{ asset('storage/' . $t->file) }}" target="_blank" class="btn btn-sm btn-info">Lihat
                                        File</a>
                                @else
                                    Tidak ada file
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('tugas.detail', $t->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                <form action="{{ route('tugas.destroy', $t->id) }}" method="POST" style="display:inline-block;"
                                    onsubmit="return confirm('Yakin ingin menghapus tugas ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection