@extends('layouts.main')
@section('container')
    <h1>{{ $page_title }}</h1> <br><br>
    @foreach ($blog as $blog)
        <article class="mb-5 border-bottom pb-4">
            <h2><a href="/blog/{{ $blog->slug }}" class="text-decoration-none">{{ $blog->title }}</a></h2>
            <p>By <a href="/author/{{ $blog->author->username }}" class="text-decoration-none">{{ $blog->author->name }}</a>
                in
                <a href="/categories/{{ $blog->category->slug }}" class="text-decoration-none">{{ $blog->category->name }}</a>
            </p>
            <p>{{ $blog->excerpt }}</p>

            <a href="/blog/{{ $blog->slug }}" class="text-decoration-none">Read More..</a>
        </article>
    @endforeach
@endsection
