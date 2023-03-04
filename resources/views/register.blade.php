@extends('layouts.main')

@section('container')
    <section id="register" class="register">
        <div class="container " data-aos="fade-up">
            <div class="row mt-5 d-flex justify-content-center" data-aos="fade-right" data-aos-delay="100">
                <div class="container">
                    <div class="row  mt-5 justify-content-center">
                        <div class="col-md-8  col-lg-5">
                            <main class="form-registration w-100 m-auto">
                                <form action="/register" method="post">
                                    @csrf
                                    <h1 class="h3 mb-3 fw-normal">Halaman Registrasi</h1>
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control rounded-5" id="name"
                                            placeholder="Name">
                                        <label for="name">Nama</label>
                                    </div>
                                    <br>

                                    <div class="form-floating">
                                        <input type="text" name="username" class="form-control rounded-5" id="username"
                                            placeholder="Username">
                                        <label for="username">Username</label>
                                    </div>
                                    <br>
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control rounded-5" id="email"
                                            placeholder="name@example.com">
                                        <label for="floatingInput">Alamat Email</label>
                                    </div>
                                    <br>
                                    <div class="form-floating">
                                        <input type="password" name="password" class="form-control rounded-5" id="password"
                                            placeholder="Password">
                                        <label for="password">Sandi</label>
                                    </div>
                                    <br>
                                    <button class="w-100 btn btn-lg btn-primary rounded-5" type="submit">Daftar</button>
                                </form>
                                <small class="d-block text-center mt-3">Sudah Terdaftar? <a href="/login">Login</a></small>
                            </main>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Contact Section -->
@endsection
