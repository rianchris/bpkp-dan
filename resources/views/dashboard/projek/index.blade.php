@extends('dashboard.layouts.main')
@section('container')
    <div class="h-screen px-3 px-lg-7 flex-grow-1 overflow-y-lg-auto">
        <header class="bg-surface-secondary border-top">
            <div class="container-xl">
                <div class="py-5 border-bottom">
                    <!-- Page heading -->
                    <div>
                        <div class="row align-items-center">
                            <div class="col-md-6 col-6 mb-3 mb-md-0">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight">All Projeks</h1>
                            </div>
                            <!-- Actions -->
                            <div class="col-md-6 col-6 text-md-end  d-flex justify-content-end">
                                <div class="mx-n1">
                                    <a href="/dashboard/projek/create" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                        <span class="pe-2"><i class="bi bi-plus"></i></span> <span>Create</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main class="py-10 bg-surface-secondary">
            <div class="container-fluid">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <!-- Card stats -->
                <div class="card mb-7">
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Member</th>
                                    <th scope="col">Action</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projek as $projek)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> <a class="text-heading font-semibold" href="#"> {{ Str::limit($projek->title, 100) }} </a></td>
                                        <td> <a class="text-heading font-semibold" href="#"> {{ $projek->author->name }} </td>
                                        <td> <a class="text-heading font-semibold" href="#"> {{ $projek->member }} </td>
                                        <td>
                                            <a href="/dashboard/projek/{{ $projek->slug }}" class="btn btn-sm btn-neutral">View</a>
                                            <a type="button" href="/dashboard/projek/{{ $projek->slug }}/edit" class="btn btn-sm btn-square btn-neutral text-warning-hover">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="/dashboard/projek/{{ $projek->slug }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-square btn-neutral text-danger-hover" onclick="return confirm('Are you sure?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 py-5">
                        <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
                    </div>
                </div>
            </div>
        </main>

    </div>
@endsection
