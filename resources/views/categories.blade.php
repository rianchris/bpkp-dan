@extends('layouts.main')
@section('container')
    <h1>Post Category : {{ $category }}</h1>
    @foreach ($blog as $c)
        <h2><a href="/blog/{{ $c->slug }}">{{ $c->title }}</a></h2>
        <p>{{ $c->body }}</p>
    @endforeach
@endsection
