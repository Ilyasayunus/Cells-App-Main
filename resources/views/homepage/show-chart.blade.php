@extends('homepage.layouts.main')
@section('container')
    <main id="main">
        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Chart Laporan SPBE {{ $dataLaporan->tahun }}</h2>
                    <ol>
                        <li><a href="/">Home</a></li>
                        <li>{{ $dataLaporan->nama_laporan }}</li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- End Breadcrumbs Section -->

        <section class="inner-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card px-lg-5">
                            {!! $chart->container() !!}
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama Indeks</th>
                                        @foreach ($listNilai as $data)
                                            <th class="text-center" style="width:auto">Nilai {{ $data['nama_laporan'] }}
                                            </th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < count($indeks); $i++)
                                        <tr>
                                            <td>{!! $indeks[$i] !!}</td>
                                            @foreach ($listNilai as $data)
                                                <td class="text-center">{{ $data['nilai'][$i] }}</td>
                                            @endforeach
                                        </tr>
                                    @endfor
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">Nilai SPBE</th>
                                        @foreach ($listNilai as $data)
                                            <th class="text-center">{{ $data['nilaiSPBE'] }}</th>
                                        @endforeach
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- End #main -->
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
@endsection
