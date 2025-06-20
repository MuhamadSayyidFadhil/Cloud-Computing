@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
  <h1>Selamat Datang {{ auth()->user()->name }}</h1>
  <a href="{{ route('logout') }}" class="btn btn-danger mt-3">Logout</a>
@endsection
