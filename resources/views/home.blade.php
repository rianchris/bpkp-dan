@extends('layouts.main')
<!--halaman child ini mengambil layout main.blade.php -->

@section('container')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <h1>Learning Today,<br>Leading Tomorrow</h1>
            <h2>We are team of talented designers making websites with Bootstrap</h2>
            <a href="courses.html" class="btn-get-started">Get Started</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Popular Courses Section ======= -->
        <section id="popular-courses" class="courses">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>News</h2>
                    <p>Event</p>
                </div>
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @foreach ($event as $event)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="course-item">
                                @if ($event->image)
                                    <img src="/storage/{{ $event->image }}" class="img-fluid" alt="...">
                                @else
                                    <img src="/storage/news-image/no-image.png" class="img-fluid" alt="...">
                                @endif
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>By {{ Str::words($event->author->name, 2) }}</h4>
                                    </div>
                                    <h3><a href="/news/{{ $event->slug }}">{{ Str::words($event->title, 15) }}</a></h3>
                                    <p>{{ Str::words($event->excerpt, 20) }}</p>
                                </div>
                            </div>
                        </div> <!-- End Course Item-->
                    @endforeach
                </div>
            </div>
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>News</h2>
                    <p>Gallery</p>
                </div>
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @foreach ($gallery as $gallery)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="course-item">
                                @if ($gallery->image)
                                    <img src="/storage/{{ $gallery->image }}" class="img-fluid" alt="...">
                                @else
                                    <img src="/storage/news-image/no-image.png" class="img-fluid" alt="...">
                                @endif
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>By {{ Str::words($gallery->author->name, 2) }}</h4>
                                    </div>
                                    <h3><a href="/news/{{ $gallery->slug }}">{{ Str::words($gallery->title, 15) }}</a></h3>
                                    <p>{{ Str::words($gallery->excerpt, 20) }}</p>
                                </div>
                            </div>
                        </div> <!-- End Course Item-->
                    @endforeach
                </div>
            </div>
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>News</h2>
                    <p>Student</p>
                </div>
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @foreach ($student as $student)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="course-item">
                                @if ($student->image)
                                    <img src="/storage/{{ $student->image }}" class="img-fluid" alt="...">
                                @else
                                    <img src="/storage/news-image/no-image.png" class="img-fluid" alt="...">
                                @endif
                                <div class="course-content">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4>By {{ Str::words($student->author->name, 2) }}</h4>
                                    </div>
                                    <h3><a href="/news/{{ $student->slug }}">{{ Str::words($student->title, 15) }}</a>
                                    </h3>
                                    <p>{{ Str::words($student->excerpt, 20) }}</p>
                                </div>
                            </div>
                        </div> <!-- End Course Item-->
                    @endforeach
                </div>
            </div>
        </section><!-- End Popular Courses Section -->



    </main><!-- End #main -->
@endsection
