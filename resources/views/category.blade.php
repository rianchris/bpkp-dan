@extends('layouts.main')
@section('container')
    <h1>Post Category : </h1>

    <div class="container">
        <div class="row">
            @foreach ($categories as $b)
                <div class="col-md-4">

                    <a href="/categories/{{ $b->slug }}">
                        <div class="card text-bg-dark">
                            <img src="https://source.unsplash.com/800x400/?{{ $b->name }}" class="card-img"
                                alt="{{ $b->name }}">
                            <div class="card-img-overlay d-flex align-items-center align-items-center p-0">
                                <h5 class="card-title text-center flex-fill bg-dark opacity-75  py-2">{{ $b->name }}
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
