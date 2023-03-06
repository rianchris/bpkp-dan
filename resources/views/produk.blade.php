@extends('layouts.main')
<!--halaman child ini mengambil layout main.blade.php -->
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 pd-4">

                <h1 class="text-secondary fw-semibold">Daftar Produk</h1>
                <hr>
                @foreach ($produk as $produk)
                    <div class="card mb-3" style="max-width: 720px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="storage/{{ $produk->image }}" class="img-fluid rounded-3" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <a href="/produk/{{ $produk->slug }}">
                                        <h5 class="card-title">{{ $produk->title }}</h5>
                                    </a>
                                    <p class="card-text">{!! $produk->deskripsi !!}</p>
                                    <p class="card-text"><small class="text-muted">By {{ $produk->author->name }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
