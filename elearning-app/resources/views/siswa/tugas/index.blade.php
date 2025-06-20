@extends('layouts.master')

@section('title', 'Tugas Saya')

@section('content')
    <div class="container mt-4">
        <h3>Daftar Tugas untuk Kelas {{ auth()->user()->kelas }}</h3>

        @if($tugas->isEmpty())
            <p>Tidak ada tugas untuk kelas kamu saat ini.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Deadline</th>
                        <th>File</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tugas as $t)
                        <tr>
                            <td>{{ $t->judul }}</td>
                            <td>{{ $t->deskripsi ?? '-' }}</td>
                            <td>{{ $t->deadline }}</td>
                            <td>
                                @if ($t->file)
                                    <a href="{{ asset('storage/' . $t->file) }}" download class="btn btn-sm btn-success">Download
                                        Tugas</a>
                                @else
                                    Tidak ada file
                                @endif
                            </td>

                            <td>
                                @if(in_array($t->id, $jawabanSaya ?? []))
                                    <span class="text-success">Sudah Mengumpulkan</span>
                                @else
                                    <a href="{{ route('siswa.jawab.form', $t->id) }}" class="btn btn-sm btn-success">Jawab</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection