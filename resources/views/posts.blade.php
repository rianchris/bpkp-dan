@extends('layouts.main')
@section('container')

    <div class="row">
        <div class="col-12 mx-auto">
            @if ($blog->count())
                <div class="card mb-3 shadow p-4 mb-4 bg-white">
                    <img src="https://source.unsplash.com/1200x400/?{{ $blog[0]->category->name }}" class="card-img-top"
                        alt="{{ $blog[0]->category->name }}">
                    <div class="card-body text-center">
                        <h3 class="card-title"><a href="/blog/{{ $blog[0]->slug }}"
                                class="text-decoration-none text-dark">{{ $blog[0]->title }}</a></h3>
                        <p>
                            <small class="text-muted">
                                By <a href="/author/{{ $blog[0]->author->username }}"
                                    class="text-decoration-none">{{ $blog[0]->author->name }}</a>
                                in
                                <a href="/categories/{{ $blog[0]->category->slug }}"
                                    class="text-decoration-none">{{ $blog[0]->category->name }}</a>
                                {{ $blog[0]->created_at->diffForHumans() }}
                            </small>
                        </p>
                        <p class="card-text visible-sm-block">{{ $blog[0]->excerpt }}</p>
                        <a href="/blog/{{ $blog[0]->slug }}" class="text-decoration-none btn btn-sm btn-primary">Read
                            More</a>
                    </div>
                </div>

                <div class="row justify-content-center ">
                    @foreach ($blog->skip(1) as $blog)
                        <div class="col-12 col-lg-10 p-1 border-primary">
                            <div class="row g-0 border-bottom pb-2">
                                <div class="col-5 p-2">
                                    <small>
                                        <div class="position-absolute bg-dark py-1 px-1  opacity-75 rounded">
                                            <a href="/categories/{{ $blog->category->slug }}"
                                                class="text-decoration-none text-white ">{{ $blog->category->name }}</a>
                                        </div>
                                    </small>
                                    <img src="https://source.unsplash.com/400x400/?{{ $blog->category->name }}"
                                        class="img-fluid rounded-1 " alt="{{ $blog->category->name }}">
                                </div>
                                <div class="col-7 ">
                                    <small>
                                        By <a href="/author/{{ $blog->author->username }}"
                                            class="text-decoration-none">{{ $blog->author->name }}</a>
                                        {{ $blog->created_at->diffForHumans() }}
                                    </small>
                                    <h5 class="card-title"><a href="/blog/{{ $blog->slug }}"
                                            class="text-decoration-none text-dark">{{ $blog->title }}</a>
                                    </h5>

                                    <p class="card-text d-none d-md-block">
                                        {{ Str::limit($blog->excerpt, 150) }}
                                    </p>
                                    <a href="/blog/{{ $blog->slug }} " class="btn btn-sm btn-primary">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="fs-3 text-center">No Post Found</p>
            @endif
        </div>
    </div>

@endsection
