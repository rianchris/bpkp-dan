@extends('layouts.main')

@section('container')
    <h1>{{ $post->title }}</h1>

    <p>By Rian Chris in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>

    {{-- untuk menghindari escape character tag html sperti <p> <b> --}}
    {!! $post->body !!}
    <a href="/blog">Back to blog</a>
@endsection
