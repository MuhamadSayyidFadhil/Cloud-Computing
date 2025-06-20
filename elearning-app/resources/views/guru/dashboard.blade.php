@extends('layouts.master')

@section('title', 'Dashboard Guru')

@section('content')
    <div class="container mt-4">
        <h3>Halo, {{ $user->name }}</h3>
        <p>Selamat datang di Dashboard Guru!</p>
        <h3>Data Profil</h3>
        <table class="table table-bordered mt-3">
            <tr>
                <th>Nama</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $user->tanggal_lahir }}</td>
            </tr>
            <tr>
                <th>Mata Pelajaran</th>
                <td>{{ $user->mapel }}</td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td>{{ $user->kelas }}</td>
            </tr>
        </table>


        <div class="card">
            <div class="card-body">
                <p><strong>Role:</strong> {{ $user->role }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
            </div>
        </div>
    </div>
@endsection