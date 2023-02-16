@extends('layouts.main')
@section('container')
    <h1>Ini adalah Profile</h1>
    <p>Nama : {{ $name }}</p>
    <p>Email : {{ $email }}</p>
    <p>Umur : {{ $umur }}</p>
    <img src="img/{{ $foto }}" alt="" width="200" height="200" class="img-thumbnail rounded-circle">
@endsection
