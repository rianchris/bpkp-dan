@extends('dashboard.layouts.main')
@section('container')
    <!-- Main content -->
    <div class="h-screen px-3 px-lg-7 flex-grow-1 overflow-y-lg-auto">
        <header class="bg-surface-secondary border-top">
            <div class="container-xl">
                <div class="py-5 border-bottom">
                    <!-- Page heading -->
                    <div>
                        <div class="row align-items-center">
                            <div class="col-md-6 col-12 mb-2 mb-md-0">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight">Dashhboard</h1>

                                <h3 class="h4 mb-0 ls-tight">
                                    @if (auth()->user()->is_admin && auth()->user()->is_periset)
                                        You are a Super Admin
                                    @elseif(auth()->user()->is_admin)
                                        You are an Admin
                                    @elseif(auth()->user()->is_periset)
                                        You are a Periset
                                    @else
                                        You are an User
                                    @endif
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main class="py-10 bg-surface-secondary">
            <div class="row g-6 mb-6">
                <div class="col-xl-3 col-sm-6 col-12">

                    <div class="card">
                        <a href="/dashboard/news" class="d-flex-inline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <span class="h4 font-semibold text-muted d-block mb-2">News</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                            <i class="bi bi-postcard"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @can('periset')
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <a href="/dashboard/publikasi" class="d-flex-inline">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h4 font-semibold text-muted d-block mb-2">Publikasi</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                                <i class="bi bi-grid"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endcan
            </div>
        </main>
    </div>
@endsection
