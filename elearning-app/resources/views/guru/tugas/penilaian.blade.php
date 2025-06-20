@extends('layouts.master')

@section('title', 'Penilaian Tugas')

@section('content')
<div class="container mt-4">
    <h3>Penilaian Tugas: {{ $tugas->judul }}</h3>

    @if($jawabanTugas->isEmpty())
        <p>Belum ada siswa yang mengumpulkan tugas.</p>
    @else
        <form action="{{ route('penilaian.update', $tugas->id) }}" method="POST">
            @csrf
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Siswa</th>
                        <th>Jawaban</th>
                        <th>Nilai</th>
                        <th>Komentar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jawabanTugas as $jawaban)
                        <tr>
                            <td>{{ $jawaban->siswa->name ?? '-' }}</td>
                            <td>
                                @if ($jawaban->file)
                                    <a href="{{ asset('storage/' . $jawaban->file) }}" target="_blank">Lihat File</a>
                                @else
                                    Tidak ada file
                                @endif
                            </td>
                            <td>
                                <input type="number" name="nilai[{{ $jawaban->id }}]" class="form-control"
                                    value="{{ $jawaban->nilai }}" min="0" max="100">
                            </td>
                            <td>
                                <input type="text" name="komentar[{{ $jawaban->id }}]" class="form-control"
                                    value="{{ $jawaban->komentar }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Simpan Penilaian</button>
        </form>
    @endif
</div>
@endsection
