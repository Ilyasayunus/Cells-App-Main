<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>SPBE DPR-RI</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <!-- Favicons -->
    <link href="/landing_assets/assets/img/dpr-ri.svg" rel="icon" />
    <link href="/landing_assets/assets/img/dpr-ri.svg" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="/landing_assets/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <link href="/landing_assets/assets/vendor/animate.css/animate.min.css" rel="stylesheet" />
    <link href="/landing_assets/assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="/landing_assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/landing_assets/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="/landing_assets/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="/landing_assets/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="/landing_assets/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.0/mdb.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
        rel="stylesheet" />

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <!-- Template Main CSS File -->
    <link href="/landing_assets/assets/css/style.css" rel="stylesheet" />

    <!-- =======================================================
  * Template Name: Medicio
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
            <div class="align-items-center d-none d-md-flex">
                <a href="https://www.dpr.go.id/">Dewan Perwakilan Rakyat Republik Indonesia</a>
            </div>
            <div class="social-links align-items-center">
                <a href="https://www.facebook.com/DPRRI/" target="_blank" class="facebook"><i
                        class="fa-brands fa-facebook"></i></a>
                <a href="https://www.instagram.com/dpr_ri/" target="_blank" class="instagram"><i
                        class="fa-brands fa-instagram"></i></a>
                <a href="https://x.com/dpr_ri" target="_blank" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://www.youtube.com/c/DPRRIOfficial" target="_blank" class="youtube"><i
                        class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
    </div>
    <!-- End Top Bar -->

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="container d-flex align-items-center">
                <a href="/" class="logo me-2"><img src="/landing_assets/assets/img/dpr-ri.svg"
                        alt="" /></a>
                <h1 class="logo me-auto">
                    <a href="/">SPBE<span>.</span></a>
                </h1>
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto" href="/">Beranda</a></li>
                    <li class="dropdown">
                        <a href="#"><span>Domain</span> <i class="fa-solid fa-chevron-down"></i></a>
                        <ul>
                            @foreach ($dataDomain as $domain)
                                <li><a href="/domain/{{ $domain->id }}"> Domain {{ $domain->nama_domain }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#"><span>Tata Kelola</span> <i class="fa-solid fa-chevron-down"></i></a>
                        <ul>
                            <li><a href="https://drive.google.com/drive/folders/1j96FlFGtww2C2GAYrF3A5BtSjYmSUpJ9?usp=sharing"
                                    target="_blank">PERSEKJEN</a>
                            </li>
                            <li><a href="https://drive.google.com/drive/folders/16KDgf4zCvLraNY7UFzzm87tqwbNcoO_l?usp=sharing"
                                    target="_blank">SOP
                                    SPBE</a></li>
                            <li><a href="https://drive.google.com/drive/folders/1LbayjB_Ie0nnjcUh2JXqkEsOEX5fdEcQ?usp=sharing"
                                    target="_blank">Peta Rencana SPBE</a></li>
                            <li><a href="https://drive.google.com/file/d/1nvwSJI84xzprohAQoRyTRx8WY5EDvZW2/view?usp=sharing"
                                    target="_blank">Indikator
                                    Evaluasi</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="/berita">Berita</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->

    @yield('container')

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div id="footer-top" class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <div class="footer-kiri container d-flex items-center">
                                <a href="/" class="logo me-3"><img src="/landing_assets/assets/img/dpr-ri.svg"
                                        alt="" /></a>
                                <h3>Dewan Perwakilan Rakyat <br>Republik Indonesia</h3>
                            </div>
                            <div class="container d-flex align-item-stretch social-links mt-3">
                                <!-- <p class="me-3">Media Sosial: </p> -->
                                <a href="https://www.facebook.com/DPRRI/" target="_blank" class="facebook"><i
                                        class="bx bxl-facebook"></i></a>
                                <a href="https://www.instagram.com/dpr_ri/" target="_blank" class="instagram"><i
                                        class="bx bxl-instagram"></i></a>
                                <a href="#https://x.com/dpr_ri" target="_blank" class="twitter"><i
                                        class="bx bxl-twitter"></i></a>
                                <a href="https://www.youtube.com/c/DPRRIOfficial" target="_blank" class="youtube"><i
                                        class="bx bxl-youtube"></i></a>
                                <a href="https://www.tiktok.com/@dpr_ri" target="_blank" class="tiktok"><i
                                        class="bx bxl-tiktok"></i></a>
                            </div>

                            <div class=" container mt-5">Unduh Aplikasi DPR-RI</div>
                            <div class="app container flex item-center mt-2">
                                <div class="row">
                                    <div>
                                        <a href="https://apps.apple.com/id/developer/dewan-perwakilan-rakyat-republik-indonesia/id1082335308?l=id"
                                            class="me-2">
                                            <img src="/landing_assets/assets/img/appstorebadge.svg" alt="">
                                        </a>
                                        <a href="https://play.google.com/store/apps/details?id=com.dot.dpr_ri&hl=id">
                                            <img src="/landing_assets/assets/img/playstorebadge.svg" alt="">
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>SPBE DPR-RI</h4>
                        <ul>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="/">Beranda</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="/">Progres 2023</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a
                                    href="https://lookerstudio.google.com/reporting/b61b8c8b-7720-4f37-a421-b2578bd1032a">Dashboard</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="/berita">Berita</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="/login">Masuk</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Tata Kelola</h4>
                        <ul>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Regulasi</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">SOP SPBE</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="#">Peta Rencana SPBE</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i> <a href="#">Indikator Evaluasi</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-newsletter">
                        <h4>Kontak</h4>
                        <p>
                            Jl.Jenderal Gatot Subroto, <br>
                            Senayan Jakarta 10270 - Indonesia <br><br />
                            <strong><i class="bi bi-telephone-fill"></i></strong> 021 - 571 5349<br />
                            <strong><i class="bi bi-printer-fill"></i></strong> 021 - 571 5925<br />
                            <strong><i class="bi bi-envelope-fill"></i></strong> bag_humas@dpr.go.id<br />
                        </p>

                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; 2024 <strong><span>Sekretariat Jenderal DPR RI</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="fa-solid fa-arrow-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="/landing_assets/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/landing_assets/assets/vendor/aos/aos.js"></script>
    <script src="/landing_assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/landing_assets/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/landing_assets/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/landing_assets/assets/vendor/php-email-form/validate.js"></script>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.0/mdb.umd.min.js"></script>
    <!-- MDB -->

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>

    <!-- Template Main JS File -->
    <script src="/landing_assets/assets/js/main.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
