@extends('layouts.main')

@section('container')
    <h1>{{ $post->title }}</h1>
    {{-- untuk menghindari escape character tag html sperti <p> <b> --}}
    {!! $post->body !!}
    <a href="/blog">Back to blog</a>
@endsection
