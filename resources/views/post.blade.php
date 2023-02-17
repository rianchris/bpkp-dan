@extends('layouts.main')

@section('container')
    <h1>{{ $post->title }}</h1>

    <p> By <a href="/author/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }} </a> in <a
            href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>

    {{-- untuk menghindari escape character tag html sperti <p> <b> --}}
    {!! $post->body !!}
    <a href="/blog" class="text-decoration-none">Back to blog</a>
@endsection
