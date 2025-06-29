@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="login-box">
    <div class="card card-outline card-success">
        <div class="card-header text-center">
            <a href="#" class="h1"><b>Login</b> eLearning</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Login sebagai <strong>{{ $role ?? 'siswa' }}</strong></p>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ $role === 'guru' ? route('login.guru') : route('login') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input name="email" type="email" class="form-control" placeholder="Email" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input name="password" type="password" class="form-control" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-block">Masuk</button>
                    </div>
                </div>
            </form>

            <hr>

            <div class="text-center">
                @if($role === 'guru')
                    <a href="{{ route('login') }}">Login sebagai Siswa</a> |
                    <a href="{{ route('register.guru') }}">Daftar sebagai Guru</a>
                @else
                    <a href="{{ route('login.guru') }}">Login sebagai Guru</a> |
                    <a href="{{ route('register.siswa') }}">Daftar sebagai Siswa</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
