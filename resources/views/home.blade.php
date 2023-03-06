@extends('layouts.main')
<!--halaman child ini mengambil layout main.blade.php -->

@section('container')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <h1>{{ $carousel->title }}</h1>
            <h2>{{ $carousel->excerpt }}</h2>
            <a href="news/{{ $carousel->slug }}" class="btn-get-started">Read More</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Popular Courses Section ======= -->
        <section id="popular-courses" class="courses">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>News</h2>
                </div>
                <div class="row" data-aos="zoom-in" data-aos-delay="100">

                    @foreach ($news as $news)
                        <div class="mt-3 col-md-4 d-inline align-items-stretch">
                            <div class="course-item">
                                @if ($news->image)
                                    <img src="/storage/{{ $news->image }}" class="img-fluid" alt="...">
                                @else
                                    <img src="/storage/news-image/no-image.png" class="img-fluid" alt="...">
                                @endif
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>{{ $news->category->name }}</h4>
                                    </div>
                                    <h3><a href="/news/{{ $news->slug }}">{{ Str::words($news->title, 15) }}</a></h3>
                                    <p>{{ Str::words($news->excerpt, 20) }}</p>
                                </div>
                            </div> <!-- End Course Item-->
                        </div>
                    @endforeach
                </div>
            </div>



            <div class="container mt-5" data-aos="fade-up">
                <div class="section-title">
                    <h2>Publikasi</h2>
                </div>
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @foreach ($publikasi as $publikasi)
                        <div class="col-lg-6  mt-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $publikasi->title }}</h5>
                                <a href="publikasi/{{ $publikasi->slug }}" class="btn btn-sm ">Read More</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="container mt-5" data-aos="fade-up">
                <div class="section-title">
                    <h2>Produk</h2>
                </div>
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @foreach ($produk as $produk)
                        <div class="col-lg-4 my-2 col-md-6 d-flex align-items-stretch">
                            <div class="course-item">
                                @if ($produk->image)
                                    <img src="/storage/{{ $produk->image }}" class="img-fluid" alt="...">
                                @else
                                    <img src="/storage/news-image/no-image.png" class="img-fluid" alt="...">
                                @endif
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>By {{ Str::words($produk->author->name, 2) }}</h4>
                                    </div>
                                    <h3><a href="/news/{{ $produk->slug }}">{{ Str::words($produk->title, 15) }}</a></h3>
                                    <p>{{ Str::words($produk->excerpt, 20) }}</p>
                                </div>
                            </div>
                        </div> <!-- End Course Item-->
                    @endforeach
                </div>
            </div>
            <div class="container mt-5" data-aos="fade-up">
                <div class="section-title">
                    <h2>Projek</h2>
                </div>
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @foreach ($projek as $projek)
                        <div class="col-lg-4 my-2 col-md-6 d-flex align-items-stretch">
                            <div class="course-item">
                                @if ($projek->image)
                                    <img src="/storage/{{ $projek->image }}" class="img-fluid" alt="...">
                                @else
                                    <img src="/storage/news-image/no-image.png" class="img-fluid" alt="...">
                                @endif
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>By {{ Str::words($projek->author->name, 2) }}</h4>
                                    </div>
                                    <h3><a href="/news/{{ $projek->slug }}">{{ Str::words($projek->title, 15) }}</a>
                                    </h3>
                                    <p>{{ Str::words($projek->excerpt, 20) }}</p>
                                </div>
                            </div>
                        </div> <!-- End Course Item-->
                    @endforeach
                </div>
            </div>
        </section><!-- End Popular Courses Section -->



    </main><!-- End #main -->
@endsection
