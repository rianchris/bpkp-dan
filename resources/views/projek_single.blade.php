@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-lg-12 mt-5">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $projek->title }}</h5>
                                <p class="card-text"><small class="text-muted">{{ date('Y-m-d', strtotime($projek->tanggal_mulai)) }} - {{ date('Y-m-d', strtotime($projek->tanggal_selesai)) }}</small></p>
                                <p class="card-text">{!! $projek->deskripsi !!}</p>


                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td><i class="bi bi-person-fill-add"></i> Partner</td>
                                            <td>{{ $projek->partner }}</td>
                                        </tr>
                                        <tr>
                                            <td><i class="bi bi-people-fill"></i> Member </td>
                                            <td>{{ $projek->member }}</td>
                                        </tr>
                                        <tr>
                                            <td> <i class="bi bi-cash"></i> Budget </td>
                                            <td> {{ number_format($projek->budget) }}</td>
                                        </tr>
                                        <tr>
                                            <td> <i class="bi bi-telephone-fill"></i> Kontak</td>
                                            <td> {{ $projek->kontak }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="/storage/{{ $projek->image }}" class="img-fluid rounded-start" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            {{-- untuk menghindari escape character tag html sperti <p> <b> --}}
            <article class="my-3 fs-6">
                {!! $projek->body !!}
            </article>
            <a href="/projek" class="text-decoration-none">Back to projek</a>
        </div>
    </div>
@endsection
