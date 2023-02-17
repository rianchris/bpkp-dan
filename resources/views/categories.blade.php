@extends('layouts.main')
@section('container')
    <h1>Post Category : {{ $category }}</h1>
    @foreach ($blog as $c)
        <article class="mb-5 mt-5 border-bottom pb-4">
            <h2><a href="/blog/{{ $c->slug }}">{{ $c->title }}</a></h2>
            <p>{{ $c->excerpt }}</p>
            <a href="/blog/{{ $c->slug }}">Read More</a>
        </article>
    @endforeach
@endsection
