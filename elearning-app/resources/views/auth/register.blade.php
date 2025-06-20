@extends('layouts.auth')

@section('title', 'Daftar Akun')

@section('content')
<div class="login-box">
    <div class="card card-outline card-success">
        <div class="card-header text-center">
            <a href="#" class="h1"><b>Daftar</b> Akun {{ ucfirst($role) }}</a>
        </div>
        <div class="card-body">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <input type="hidden" name="role" value="{{ $role }}">

                <div class="mb-3">
                    <input name="name" type="text" class="form-control" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                </div>
                <div class="mb-3">
                    <input name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <input name="password" type="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <input name="password_confirmation" type="password" class="form-control" placeholder="Konfirmasi Password" required>
                </div>
                <button type="submit" class="btn btn-success btn-block">Daftar sebagai {{ ucfirst($role) }}</button>
            </form>

            <div class="text-center mt-3">
                @if ($role === 'guru')
                    <a href="{{ route('login.guru') }}">Sudah punya akun? Login sebagai Guru</a>
                @else
                    <a href="{{ route('login') }}">Sudah punya akun? Login sebagai Siswa</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
