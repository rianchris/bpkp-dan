@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-lg-12 mt-5">
                <h1 class="text-seconary">Publikasi</h1>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Judul</td>
                            <td>{{ $publikasi->title }}</td>
                        </tr>
                        <tr>
                            <td>Author</td>
                            <td>{{ $publikasi->author->name }}</td>
                        </tr>
                        <tr>
                            <td>Penerbit</td>
                            <td>{{ $publikasi->publisher }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Publis</td>
                            <td>{{ $publikasi->created_at->format('Y-m-d') }}</td>
                        </tr>
                        <tr>
                            <td>Download PDF</td>
                            <td><a href="/storage/{{ $publikasi->file }}" target="blank">Link</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- untuk menghindari escape character tag html sperti <p> <b> --}}
            <article class="my-3 fs-6">
                {!! $publikasi->body !!}
            </article>
            <a href="/publikasi" class="text-decoration-none">Back to publikasi</a>
        </div>
    </div>
@endsection
