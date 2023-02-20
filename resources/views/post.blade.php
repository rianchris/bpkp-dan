@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>{{ $post->title }}</h3>

                <p> By <a href="/author/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}
                    </a> in <a href="/categories/{{ $post->category->slug }}"
                        class="text-decoration-none">{{ $post->category->name }}</a></p>
                <img src="https://source.unsplash.com/800x400/?{{ $post->category->label }}"
                    alt="{{ $post->category->label }}" class="img-fluid">

                {{-- untuk menghindari escape character tag html sperti <p> <b> --}}

                <article class="my-3 fs-6">
                    {!! $post->body !!}
                </article>
                <a href="/blog" class="text-decoration-none">Back to blog</a>
            </div>
        </div>
    </div>
@endsection
