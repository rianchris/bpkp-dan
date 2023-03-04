@extends('layouts.main')
@section('container')
    <section id="login" class="login">
        <div class="container ">
            <div class="row mt-5 d-flex justify-content-center">
                <div class="container">
                    <div class="row  mt-5 justify-content-center">
                        <div class="col-md-8 col-lg-5">
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session()->has('loginError'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('loginError') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <main class="form-signin w-100 m-auto">
                                <form action="/login" method="post">
                                    @csrf
                                    <h1 class="h3 mb-3 fw-normal">Silahkan Login</h1>
                                    <div class="form-floating ">
                                        <input type="email" name="email"
                                            class="rounded-5 form-control @error('email') is-invlaid @enderror"
                                            id="email" placeholder="name@example.com" autofocus required
                                            value="{{ old('email') }}">
                                        <label for="email">Alamat Email</label>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div><br>
                                    <div class="form-floating">
                                        <input type="password" name="password" class="form-control rounded-5" id="password"
                                            placeholder="Password" required>
                                        <label for="password">Sandi</label>
                                    </div>
                                    <br>
                                    <button class="w-100 btn btn-lg btn-primary rounded-5" type="submit">Login</button>
                                </form>
                                <small class="d-block text-center mt-3">Belum Memiliki Akun? <a href="/register">Daftar
                                        Sekarang!</a></small>
                            </main>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Contact Section -->
@endsection
