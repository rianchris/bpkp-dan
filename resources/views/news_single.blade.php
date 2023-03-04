@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <h3>{{ $news->title }}</h3>
                <div class="share-button">
                    <a href="whatsapp://send?text=bpkp-dan.test/{{ $news->slug }}"><i class="bi bi-whatsapp"
                            style="font-size: 1.5rem; color: dodgerblue"></i></a>
                    <i class="bi bi-facebook" style="font-size: 1.5rem; color: dodgerblue"></i>
                    <i class="bi bi-envelope" style="font-size: 1.5rem; color: dodgerblue"></i>
                    <i class="bi bi-telegram" style="font-size: 1.5rem; color: dodgerblue"></i>
                </div>
                <p> By <a href="/author/{{ $news->author->username }}"
                        class="text-decoration-none">{{ $news->author->name }}
                    </a> in <a href="/categories/{{ $news->category->slug }}"
                        class="text-decoration-none">{{ $news->category->name }}</a></p>
                @if ($news->image)
                    <img src="/storage/{{ $news->image }}" class="img-fluid" alt="...">
                @else
                    <img src="/storage/news-image/no-image.png" class="img-fluid" alt="...">
                @endif

                {{-- untuk menghindari escape character tag html sperti <p> <b> --}}

                <article class="my-3 fs-6">
                    {!! $news->body !!}
                </article>
                <a href="/blog" class="text-decoration-none">Back to blog</a>
            </div>
        </div>
    </div>
@endsection
