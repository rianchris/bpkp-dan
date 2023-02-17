@extends('layouts.main')
@section('container')
    <h1>Post Category : </h1>
    @foreach ($categories as $b)
        <ul>
            <li>
                <h2><a href="/categories/{{ $b->slug }}">{{ $b->name }}</a></h2>
            </li>
        </ul>
    @endforeach
@endsection
