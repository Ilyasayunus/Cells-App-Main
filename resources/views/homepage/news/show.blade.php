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

        <!-- ======= News Detail Section ======= -->
        <section id="news" class="news">
            <div class="container" data-aos="fade-up">
                <div class="title-news">
                    <h2>{{ $data->judul }}</h2>
                    <img src="{{ asset('storage/' . $data->gambar) }}" class="img-fluid" alt="">
                    <p>
                        Post by: {{ $data->created_by }} <span> | </span> {{ $data->created_at->diffForHumans() }}
                    </p>
                </div>

                <p style="text-align: justify;">
                    {!! $data->body !!}
                </p>
            </div>
        </section>
        <!-- End News Detail Section -->
    </main>
    <!-- End #main -->
@endsection
