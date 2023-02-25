 <!-- ======= Header ======= -->
 <div class="row mb-5">
     <header id="header" class="fixed-top">
         <div class="container d-flex align-items-center">

             <h1 class="logo me-auto"><a href="/">Portal Penelitian</a></h1>
             <!-- Uncomment below if you prefer to use an image logo -->
             <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

             <nav id="navbar" class="navbar order-last order-lg-0">
                 <ul>
                     <li><a class="{{ $navbar_active === 'home' ? 'active' : '' }}" href="/">Home</a></li>
                     <li><a class="{{ $navbar_active === 'publikasi' ? 'active' : '' }}" href="/publikasi">Publikasi</a>
                     </li>
                     <li><a class="{{ $navbar_active === 'projek' ? 'active' : '' }}" href="/projek">Projek</a></li>
                     <li><a class="{{ $navbar_active === 'produk' ? 'active' : '' }}" href="/produk">Produk</a></li>

                     <li class="dropdown"><a href="/news"><span>News</span> <i class="bi bi-chevron-down"></i></a>
                         <ul>
                             <li><a class="{{ $navbar_active === 'news' ? 'active' : '' }}"
                                     href="/categories/event">Event</a>
                             </li>
                             <li><a class="{{ $navbar_active === 'news' ? 'active' : '' }}"
                                     href="/categories/gallery">Gallery</a>
                             </li>
                             <li><a class="{{ $navbar_active === 'news' ? 'active' : '' }}"
                                     href="/categories/student-opportunities">Student
                                     Opportunities</a></li>
                         </ul>
                     </li>
                 </ul>
                 <i class="bi bi-list mobile-nav-toggle"></i>
             </nav><!-- .navbar -->

             <a href="courses.html" class="get-started-btn">Login</a>

         </div>
     </header><!-- End Header -->
 </div>

 {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/">BPKP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $navbar_active === 'home' ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $navbar_active === 'profile' ? 'active' : '' }}" href="/profile">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $navbar_active === 'hubungi' ? 'active' : '' }}" href="/hubungi">Hubungi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $navbar_active === 'post' ? 'active' : '' }}" href="/blog">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $navbar_active === 'categories' ? 'active' : '' }}"
                        href="/categories">Categories</a>
                </li>
            </ul>
        </div>
    </div>
</nav> --}}
