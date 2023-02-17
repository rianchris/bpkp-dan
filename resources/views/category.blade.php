@extends('layouts.main')
@section('container')
    <h1>Post Category : {{ $category }}</h1>
    @foreach ($blog as $b)
        <h2><a href="/blog/{{ $b->slug }}">{{ $b->title }}</a></h2>
        <p>{{ $b->excerpt }}</p>
    @endforeach
@endsection
