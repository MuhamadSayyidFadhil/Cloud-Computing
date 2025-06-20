@extends('layouts.master')

@section('title', 'Dashboard Siswa')

@section('content')
    <div class="container mt-4">
        <h3>Halo, {{ auth()->user()->name }}</h3>
        <p>Selamat datang di Dashboard Siswa!</p>
        <h3>Data Profil</h3>
        <table class="table table-bordered mt-3">
            <tr>
                <th>Nama</th>
                <td>{{ auth()->user()->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ auth()->user()->email }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ auth()->user()->tanggal_lahir ?? '-' }}</td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td>{{ auth()->user()->kelas ?? '-' }}</td>
            </tr>
        </table>

        <div class="card">
            <div class="card-body">
                <p><strong>Role:</strong> {{ auth()->user()->role }}</p>
                <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
            </div>
        </div>
    </div>
@endsection
