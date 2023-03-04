@extends('dashboard.layouts.main')
@section('container')
    <div class="h-screen px-3 px-lg-7 flex-grow-1 overflow-y-lg-auto">
        <header class="bg-surface-secondary border-top">
            <div class="container-xl">
                <div class="py-5 border-bottom">
                    <!-- Page heading -->
                    <div>
                        <div class="row align-items-center">
                            <div class="col-md-12 col-12 mb-3 mb-md-0">
                                <!-- Title -->
                                <a href="/dashboard/news/{{ $news->slug }}/edit" type="button" class="btn btn-sm btn-neutral text-warning-hover">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>

                                <form action="/dashboard/news/{{ $news->slug }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-neutral text-danger-hover" onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                                <h1 class="h2 mt-2 mb-0 ls-tight">{{ $news->title }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main class="py-5 bg-surface-secondary">
            <div class="container-fluid">
                <!-- Card stats -->
                <div class="card mb-7 p-3">
                    @if ($news->image)
                        <div class="mb-3" style="max-height: 450px; overflow:hidden;">
                            <img src="{{ asset('storage/' . $news->image) }}" class="img-fluid mt-3" alt="">
                        </div>
                    @else
                        <div class="mb-3" style="max-height: 350px; overflow:hidden;">
                            <img src="{{ asset('storage/news-image/no-image.png') }}" class="img-fluid mt-3" alt="">
                        </div>
                    @endif
                    <p>By {{ $news->author->name }} in {{ $news->category->name }}</p>
                    <br>
                    <p>{!! $news->body !!}</p>
                </div>
                <a href="/dashboard/news" class="btn btn-sm btn-secondary"><i class="bi bi-arrow-left"></i> Back to All
                    Projek</a>
            </div>
        </main>

    </div>
@endsection
