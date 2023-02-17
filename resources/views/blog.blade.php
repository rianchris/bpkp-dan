@extends('layouts.main')
@section('container')
    @foreach ($blog as $blog)
        <h2><a href="/blog/{{ $blog->slug }}">{{ $blog->title }}</a></h2>
        <p>{{ $blog->excerpt }}</p>
    @endforeach
@endsection
