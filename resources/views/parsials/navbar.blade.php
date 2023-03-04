 <!-- ======= Header ======= -->
 <div class="row mb-5">
     <header id="header" class="fixed-top">
         <div class="container d-flex align-items-center">

             <h1 class="logo me-auto"><a href="/">Portal Penelitian</a></h1>
             <!-- Uncomment below if you prefer to use an image logo -->
             <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

             <nav id="navbar" class="navbar order-last order-lg-0">
                 <ul>
                     <li><a class="{{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                     </li>
                     <li><a class="{{ Request::is('/publikasi*') ? 'active' : '' }}" href="/publikasi">Publikasi</a>
                     </li>
                     <li><a class="{{ Request::is('/projek*') ? 'active' : '' }}" href="/projek">Projek</a>
                     </li>
                     <li><a class="{{ Request::is('/produk*') ? 'active' : '' }}" href="/produk">Produk</a>
                     </li>

                     <li class="dropdown"><a href="/news"><span>News</span> <i class="bi bi-chevron-down"></i></a>
                         <ul>
                             <li><a class="{{ Request::is('/news*') ? 'active' : '' }}"
                                     href="/news?category=event">Event</a>
                             </li>
                             <li><a class="{{ Request::is('/produk*') ? 'active' : '' }} }}"
                                     href="/news?category=gallery">Gallery</a>
                             </li>
                             <li><a class="{{ Request::is('/produk*') ? 'active' : '' }}"
                                     href="/news?category=student-opportunities">Student
                                     Opportunities</a></li>
                         </ul>
                     </li>
                 </ul>
                 <i class="bi bi-list mobile-nav-toggle"></i>
             </nav><!-- .navbar -->
             @auth
                 <a href="/dashboard" class="get-started-btn">Dashboard</a>
             @else
                 <a href="/login" class="get-started-btn">Login</a>
             @endauth
         </div>
     </header><!-- End Header -->
 </div>
