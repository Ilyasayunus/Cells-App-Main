@extends('homepage.layouts.main')
@section('container')
    <main id="main">
        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Berita dan Informasi</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>Berita</li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- End Breadcrumbs Section -->

        <section class="inner-page">
            <div class="container">
                <section class="news-section">
                    <div class="container">
                        <div class="row">
                            @foreach ($dataNews as $data)
                                <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-2">
                                    <div class="item">
                                        <div class="blog-entry">
                                            <a href="#" class="block-20 d-flex align-items-start"
                                                style="background-image: url('{{ asset('storage/' . $data->gambar) }}');">
                                                <div class="meta-date text-center p-2">
                                                    <span>{{ $data->created_at->diffForHumans() }}</span>
                                                </div>
                                            </a>
                                            <div class="text border border-top-0 p-4">
                                                <h3 class="heading"><a href="#">{{ $data->judul }}</a></h3>
                                                <p>{!! $data->excerpt !!}</p>
                                                <div class="d-flex align-items-center mt-4">
                                                    <p class="mb-0"><a href="/berita/{{ $data->slug }}"
                                                            class="btn btn-primary">Read More
                                                            <span class="ion-ios-arrow-round-forward"></span></a></p>
                                                    <p class="ml-auto meta2 mb-0">
                                                        <a href="#" class="mr-2">Posted By :
                                                            {{ $data->created_by }}</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                </section>
                <script src="scripts.js"></script>
            </div>
        </section>
    </main>
    <!-- End #main -->
@endsection
