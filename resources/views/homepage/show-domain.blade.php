@extends('homepage.layouts.main')
@section('container')
    <main id="main">
        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Domain dan Aspek Penilaian SPBE</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>Domain {{ $data->nama_domain }}</li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- End Breadcrumbs Section -->

        <section class="inner-page">
            <div class="container">
                <h2>Domain {{ $data->nama_domain }}</h2>
                <p class="mb-2">
                    Domain {{ $data->nama_domain }} Memiliki Bobot {{ $data->bobot_domain }}% pada
                    Instrumen Pemantauan dan Evaluasi SPBE
                </p>
                <p>
                    Berikut adalah aspek dan indikator yang tergabung dalam Domain {{ $data->nama_domain }}
                </p>

                <div class="accordion accordion-flush" id="accordionFlushExample">
                    @foreach ($dataAspek as $aspek)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse-{{ $loop->iteration }}" aria-expanded="false"
                                    aria-controls="flush-collapse-{{ $loop->iteration }}">
                                    Aspek {{ $aspek['namaAspek'] }}
                                </button>
                            </h2>
                            <div id="flush-collapse-{{ $loop->iteration }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <!-- Nested Accordion Start -->
                                    <div class="accordion" id="nestedAccordion-{{ $loop->iteration }}">
                                        @foreach ($aspek['indikator'] as $indikator)
                                            <!-- Nested Accordion Items -->
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#nestedCollapse-{{ $loop->parent->iteration }}-{{ $loop->iteration }}"
                                                        aria-expanded="false"
                                                        aria-controls="nestedCollapse-{{ $loop->parent->iteration }}-{{ $loop->iteration }}">
                                                        {{ $indikator->nama_indikator }}
                                                    </button>
                                                </h2>
                                                <div id="nestedCollapse-{{ $loop->parent->iteration }}-{{ $loop->iteration }}"
                                                    class="accordion-collapse collapse"
                                                    data-bs-parent="#nestedAccordion-{{ $loop->parent->iteration }}">
                                                    <div class="accordion-body">
                                                        <dt class="col-sm-3">Uraian Indikator</dt>
                                                        <dd class="col-sm-9">{{ $indikator->uraian_indikator }}</dd>
                                                        <dt class="col-sm-3">Tujuan Indikator</dt>
                                                        <dd class="col-sm-9">{!! $indikator->tujuan_indikator !!}</dd>
                                                        <dt class="col-sm-3">Ruang Lingkup Indikator</dt>
                                                        <dd class="col-sm-9">{!! $indikator->ruang_lingkup_indikator !!}</dd>
                                                        <dt class="col-sm-3">Level 1</dt>
                                                        <dd class="col-sm-9">{!! $indikator->tingkat_1 !!}</dd>
                                                        <dt class="col-sm-3">Level 2</dt>
                                                        <dd class="col-sm-9">{!! $indikator->tingkat_2 !!}</dd>
                                                        <dt class="col-sm-3">Level 3</dt>
                                                        <dd class="col-sm-9">{!! $indikator->tingkat_3 !!}</dd>
                                                        <dt class="col-sm-3">Level 4</dt>
                                                        <dd class="col-sm-9">{!! $indikator->tingkat_4 !!}</dd>
                                                        <dt class="col-sm-3">Level 5</dt>
                                                        <dd class="col-sm-9">{!! $indikator->tingkat_5 !!}</dd>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End of Nested Accordion Item #1 -->
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    <script src="scripts.js"></script>
                </div>
            </div>
        </section>
    </main>
    <!-- End #main -->
@endsection
