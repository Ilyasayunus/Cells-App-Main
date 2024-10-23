@extends('homepage.layouts.main')
@section('container')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">
                <!-- Slide 1 -->
                <div class="carousel-item active"
                    style="background-image: url({{ asset('landing_assets/assets/img/home1.jpg') }})">
                    <div class="container">
                        <h2>Selamat Datang di <span>SPBE DPR-RI</span></h2>
                        <p>
                            Sistem Pemerintahan Berbasis Elektronik (SPBE) merupakan penyelenggaraan pemerintahan yang
                            memanfaatkan
                            teknologi informasi dan komunikasi untuk memberikan layanan kepada Pengguna SPBE.
                        </p>
                        <a href="#about" class="btn-get-started scrollto">Mulai</a>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item"
                    style="background-image: url({{ asset('landing_assets/assets/img/home2.jpg') }})">
                    <div class="container">
                        <h2>Progress <span>SPBE</span></h2>
                        <p>
                            Penilaian Sistem Pemerintahan Berbasis Elektronik Dewan Perwakilan Rakyat Republik Indonesia.
                        </p>
                        <a href="#progress-section" class="btn-get-started scrollto">Selengkapnya</a>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item"
                    style="background-image: url({{ asset('landing_assets/assets/img/home3.jpg') }})">
                    <div class="container">
                        <h2>Dashboard <span>SPBE DPR-RI</span></h2>
                        <p>
                            Dashboard Arsitektur SPBE bertujuan untuk agenda monitoring dan evaluasi SPBE tahunan
                            Pemerintah DPR RI
                            dalam menjaga konsistensi keterpaduan dan keberlanjutan, manajemen pengetahuan dan inovasi
                            sistem
                            pemerintahan.
                        </p>
                        <a href="https://lookerstudio.google.com/reporting/b61b8c8b-7720-4f37-a421-b2578bd1032a"
                            target="_blank" class="btn-get-started scrollto">Selengkapnya</a>
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">
        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Tentang <span>SPBE</span></h2>
                    <p>
                        Sistem Pemerintahan Berbasis Elektronik (SPBE) merupakan
                        penyelenggaraan pemerintahan yang memanfaatkan teknologi informasi
                        dan komunikasi untuk memberikan layanan kepada Pengguna SPBE.
                        Untuk memastikan pelaksanaan SPBE di Instansi Pusat dan Pemerintah
                        Daerah selaras dengan prinsip terintegrasi dan terpadu, maka
                        Instansi Pusat dan Pemerintah Daerah diharapkan menerapkan
                        unsur-unsur SPBE sesuai dengan kerangka kerja Tata Kelola SPBE dan
                        Manajemen SPBE agar penerapan SPBE dapat berjalan efektif,
                        efisien, dan berkesinambungan, serta dapat menghasilkan layanan
                        SPBE yang berkualitas dan optimal.
                    </p>
                </div>

                <div class="row">
                    <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
                        <h3
                            style="text-decoration: underline; text-decoration-color: #bf0050; text-underline-offset: 10px;">
                            Dasar Hukum</h3>
                        <p class="fst-italic">
                            Berikut merupakan dasar hukum pelaksanaan Sistem Pemerintahan
                            Berbasis Elektronik.
                        </p>
                        <ul>
                            <li>
                                <i class="bi bi-check-circle"></i> Peraturan Presiden Nomor 95
                                Tahun 2018 tentang Sistem Pemerintahan Berbasis Elektronik.
                                <a href="https://drive.google.com/file/d/1vhg_WBEtfijMoqUgKktuHWEPdGKHoU4_/view?usp=sharing"
                                    target="_blank"> Detail</a>
                            </li>
                            <li>
                                <i class="bi bi-check-circle"></i> Peraturan Menteri
                                Pendayagunaan Aparatur Negara dan Birokrasi Reformasi Nomor 59
                                Tahun 2020 tentang Pemantauan dan Evaluasi Sistem Pemerintahan
                                Berbasis Elektronik.
                                <a href="https://drive.google.com/file/d/1KX5abgl5y0GVSk6YeO_426T0zI3QwVHZ/view?usp=sharing"
                                    target="_blank"> Detail</a>
                            </li>
                            <li>
                                <i class="bi bi-check-circle"></i> Pedoman Menteri
                                Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor 6
                                Tahun 2023 tentang Tata Cara Pemantauan dan Evaluasi Sistem
                                Pemerintahan Berbasis Elektronik.
                                <a href="https://drive.google.com/file/d/1f08SNn4F7nWZZkBPNT_mqDZgfPGUr2EU/view?usp=sharing"
                                    target="_blank"> Detail </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
                        <h3
                            style="text-decoration: underline; text-decoration-color: #bf0050; text-underline-offset: 10px;">
                            Maksud dan Tujuan</h3>
                        <p class="fst-italic">
                            Untuk memberi panduan bagi Asesor Internal Instansi Pusat dan
                            Pemerintah Daerah, Asesor Eksternal, dan Tim Pelaksanaan
                            Pemantauan dan Evaluasi SPBE Kementerian PANRB yang terlibat
                            dalam pelaksanaan pemantauan dan evaluasi SPBE. Berikut tujuan
                            dari pelaksanaan SPBE
                        </p>
                        <ul>
                            <li>
                                <i class="bi bi-check-circle"></i> Untuk digunakan sebagai
                                panduan agar tercapai kesamaan pemahaman dan tindakan dalam
                                proses penilaian pemantauan dan evaluasi SPBE.
                            </li>
                            <li>
                                <i class="bi bi-check-circle"></i> Untuk memberikan petunjuk
                                tata cara dan kaidah dalam memberikan penjelasan pada proses
                                penilaian pemantauan dan evaluasi SPBE.
                            </li>
                            <li>
                                <i class="bi bi-check-circle"></i> Untuk menjamin kualitas dan
                                memastikan tercapainya tujuan pelaksanaan pemantauan dan
                                evaluasi SPBE secara sistematis
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Us Section -->

        <!-- ======= Progres Section ======= -->
        @if ($result != null)
            <section id="progress-section" class="progress-section">
                <div class="container" data-aos="fade-left">
                    <h2 class="line-title">Progres SPBE</h2>
                    <div class="card p-5">
                        {!! $chart->container() !!}
                    </div>
                    <div class="owl-carousel custom-carousel owl-theme owl-image-responsive">
                        @foreach ($dataLaporan as $laporan)
                            <div class="item @if ($loop->iteration == 1) active @endif"
                                style="height:110%; width:400px">
                                <div class="item-desc">
                                    <h3>{{ $laporan->nama_laporan }}</h3>
                                    <a href="/detailChart/{{ $laporan->id }}"
                                        class="btn-selengkapnya scrollto mt-2">Selengkapnya <span>.</span>
                                        <i class="bi bi-arrow-up-right"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <!-- End Progres Section -->

        <!-- ======= Domain Aspek Section ======= -->
        <section id="domain-aspek" class="domain-aspek">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Domain dan Aspek Penilaian SPBE</h2>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <ul class="nav nav-tabs flex-column">
                            @foreach ($dataDomain as $domain)
                                <li class="nav-item mt-2">
                                    <a class="nav-link @if ($loop->iteration == 1) active show @endif"
                                        data-bs-toggle="tab" data-bs-target="#tab-{{ $loop->iteration }}">
                                        <h4>Domain {{ $domain->nama_domain }}</h4>
                                        <p>
                                            Bobot : {{ $domain->bobot_domain }}%
                                        </p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="tab-content">
                            @foreach ($dataDomain as $domain)
                                <div class="tab-pane @if ($loop->iteration == 1) active show @endif"
                                    id="tab-{{ $loop->iteration }}">
                                    <h3 class="mb-0">Domain {{ $domain->nama_domain }}</h3>
                                    <p class="mb-0">Aspek : </p>
                                    <ul>
                                        @foreach ($dataAspek as $aspek)
                                            @foreach ($dataIndikator as $indikator)
                                                @if ($indikator->domain_id == $domain->id && $indikator->aspek_id == $aspek->id)
                                                    <li>
                                                        <p>{{ $aspek->nama_aspek }}</p>
                                                    </li>
                                                    @php
                                                        $break = true;
                                                        break;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endforeach

                                    </ul>
                                    <a href="/domain/{{ $domain->id }}">Selengkapnya <span>.</span>
                                        <i class="bi bi-arrow-up-right"></i>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- End Domain Aspek Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Indikator <span>SPBE</span></h2>
                    <p>
                        Jumlah indikator SPBE dari setiap domain.
                    </p>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="fa-solid fa-gavel"></i>
                            <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Kebijakan SPBE</p>
                            <div class="content"></div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="fa-solid fa-cloud"></i>
                            <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Tata Kelola SPBE</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="fa-solid fa-database"></i>
                            <span data-purecounter-start="0" data-purecounter-end="11" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Manajemen SPBE</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-puzzle-fill"></i>
                            <span data-purecounter-start="0" data-purecounter-end="16" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Layanan SPBE</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Counts Section -->

        <!-- ======= Layanan Section ======= -->
        <section id="layanan" class="layanan">
            <div class="container" data-aos="zoom-in">
                <div class="text-center">
                    <h3>Dashboard SPBE DPR-RI</h3>
                    <p>
                        Dashboard Arsitektur SPBE bertujuan untuk agenda monitoring dan evaluasi SPBE tahunan Pemerintah
                        DPR RI
                        dalam menjaga konsistensi keterpaduan dan keberlanjutan, manajemen pengetahuan dan inovasi
                        sistem pemerintahan
                    </p>
                    <a class="layanan-btn scrollto"
                        href="https://lookerstudio.google.com/reporting/b61b8c8b-7720-4f37-a421-b2578bd1032a"
                        target="_blank">Lihat
                        Dashboard <i class="bi bi-arrow-up-right"></i></a>
                </div>
            </div>
        </section>
        <!-- End Layanan Section -->

        <!-- ======= Featured Services Section ======= -->
        <section id="tata-kelola" class="tata-kelola">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Tata Kelola <span>SPBE</span></h2>
                </div>

                <div class="row mx-auto my-auto justify-content-center">
                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box-border" data-aos="fade-up" data-aos-delay="100">
                            <div class="icon-box box-1">
                                <div class="icon"><i class="fa-solid fas fa-gavel"></i></div>
                                <h4 class="title"><a href="">PERSEKJEN</a></h4>
                                <a href="https://drive.google.com/drive/folders/1j96FlFGtww2C2GAYrF3A5BtSjYmSUpJ9?usp=sharing"
                                    target="_blank" class="btn-selengkapnya scrollto mt-2">Selengkapnya <span>.</span>
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box-border" data-aos="fade-up" data-aos-delay="200">
                            <div class="icon-box box-2">
                                <div class="icon"><i class="fa-solid fa-book"></i></div>
                                <h4 class="title"><a href="">SOP SPBE</a></h4>
                                <a href="https://drive.google.com/drive/folders/16KDgf4zCvLraNY7UFzzm87tqwbNcoO_l?usp=sharing"
                                    target="_blank" class="btn-selengkapnya scrollto mt-2">Selengkapnya <span>.</span>
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box-border" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box box-3">
                                <div class="icon"><i class="fa-solid fa-map"></i></div>
                                <h4 class="title"><a href="">Peta Rencana SPBE</a></h4>
                                <a href="https://drive.google.com/drive/folders/1LbayjB_Ie0nnjcUh2JXqkEsOEX5fdEcQ?usp=sharing"
                                    target="_blank" class="btn-selengkapnya scrollto mt-2">Selengkapnya
                                    <span>.</span>
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                        <div class="icon-box-border" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon-box box-4">
                                <div class="icon"><i class="fa-solid fa-file-pen"></i></div>
                                <h4 class="title"><a href="">Indikator Evaluasi</a></h4>
                                <a href="https://drive.google.com/file/d/1nvwSJI84xzprohAQoRyTRx8WY5EDvZW2/view?usp=sharing"
                                    target="_blank" class="btn-selengkapnya scrollto mt-2">Selengkapnya <span>.</span>
                                    <i class="bi bi-arrow-up-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Featured Services Section -->

        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Galeri SPBE DPR-RI</h2>
                    <p>
                        Kumpulan dokumentasi kegiatan Evaluasi SPBE di lingkungan Dewan Perwakilan Rakyat Republik
                        Indonesia
                    </p>
                </div>

                <div class="gallery-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        @foreach ($dataNews as $data)
                            <div class="swiper-slide">
                                <a class="gallery-lightbox" href="{{ asset('storage/' . $data->gambar) }}"><img
                                        src="{{ asset('storage/' . $data->gambar) }}" class="img-fluid"
                                        alt="{{ $data->slug }}" /></a>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- End Gallery Section -->

        <!-- ======= News Section ======= -->
        <section class="news-section">
            <div class="container">
                <div class="row">
                    <div class="section-title col-md-12 text-center">
                        <h2 class="pb-md-4">BERITA TERKINI</h2>
                    </div>
                    <div class="col-md-12">
                        <div class="featured-carousel owl-carousel">
                            @foreach ($dataNews as $data)
                                <div class="item">
                                    <div class="blog-entry">
                                        <a href="#" class="block-20 d-flex align-items-start"
                                            style="background-image: url('{{ asset('storage/' . $data->gambar) }}');">
                                            <div class="meta-date text-center p-2">
                                                <span>{{ $data->created_at->diffForHumans() }}</span>
                                            </div>
                                        </a>
                                        <div class="text border border-top-0 p-4">
                                            <h3 class="heading"><a
                                                    href="berita/{{ $data->slug }}">{{ $data->judul }}</a></h3>
                                            <p class="unique">
                                                {!! $data->excerpt !!}
                                            </p>
                                            <div class="d-flex align-items-center mt-4">
                                                <p class="mb-0"><a href="berita/{{ $data->slug }}"
                                                        class="btn btn-primary">Baca Artikel <span
                                                            class="ion-ios-arrow-round-forward"></span></a></p>
                                                <p class="ml-auto meta2 mb-0">
                                                    <a href="#" class="mr-2">Posted By
                                                        {{ $data->created_by }}</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <a href="/berita" class="btn-get-started scrollto">Berita Lainnya
                    <i class="bi bi-arrow-up-right"></i></a>
            </div>

        </section>
        <!-- End News Section -->


    </main>
    <!-- End #main -->

    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
@endsection
