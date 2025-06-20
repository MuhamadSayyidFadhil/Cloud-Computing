@extends('layouts.master')

@section('title', 'Nilai Saya')

@section('content')
<div class="container mt-4">
    <h3>Nilai Saya</h3>

    @if ($jawaban->isEmpty())
        <p>Belum ada nilai yang tersedia.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul Tugas</th>
                    <th>Nilai</th>
                    <th>Status</th>
                    <th>Komentar Guru</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jawaban as $j)
                    <tr>
                        <td>{{ $j->tugas->judul ?? '-' }}</td>
                        <td>{{ $j->nilai ?? 'Belum dinilai' }}</td>
                        <td>{{ $j->file ? 'Sudah mengumpulkan' : 'Belum mengumpulkan' }}</td>
                        <td>{{ $j->komentar ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
