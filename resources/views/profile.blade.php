@extends('layouts.main')
@section('container')
    <h1>Ini adalah Profile</h1>
    <p>Nama : {{ $name }}</p>
    <p>Email : {{ $email }}</p>
    <p>Umur : {{ $umur }}</p>
    <img src="img/{{ $foto }}" alt="" width="300">
@endsection
