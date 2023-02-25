@extends('layouts.main')
<!--halaman child ini mengambil layout main.blade.php -->
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 pd-4">

                <h1>Daftar Publikasi</h1>
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Author</th>
                            <th scope="col">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($publikasi as $p)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td><a href="/publikasi/{{ $p->slug }}">{{ $p->title }}</a></td>
                                <td>{{ $p->author->name }}</td>
                                <td>{{ $p->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
