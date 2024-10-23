@extends('admin.layouts.main')
@section('container')
    <div class="row">
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $indikator }}</h3>
                    <p>Indikator SPBE</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="/admin/indikator" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $laporan }}</h3>
                    <p>Penilaian SPBE</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/admin/penilaian" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $news }}</h3>
                    <p>Berita CELLS</p>
                </div>
                <div class="icon">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <a href="/admin/news" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    @if ($dataLaporan->count() > 0 && $indikator > 0)
        <div class="col-lg-12 p-0">
            <div class="card card-info">
                <div class="card-header">
                    <h5>Grafik Penilaian SPBE</h5>
                </div>
                <div class="card-body ">
                    <form action="/makeChart" method="post">
                        @csrf
                        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                            @foreach ($dataLaporan as $laporan)
                                <input type="checkbox" class="btn-check" name="laporan[]"
                                    id="btncheck{{ $loop->iteration }}" autocomplete="off" value="{{ $laporan->id }}">
                                <label class="btn btn-outline-primary rounded-start rounded-end"
                                    for="btncheck{{ $loop->iteration }}">{{ $laporan->nama_laporan }}</label>
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success" disabled>Make Chart</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    @endif
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            const $submitButton = $('button[type="submit"]');
            const $checkboxes = $('input[name="laporan[]"]');

            function toggleSubmitButton() {
                const anyChecked = $checkboxes.is(':checked');
                $submitButton.prop('disabled', !anyChecked);
            }

            $checkboxes.on('change', toggleSubmitButton);

            toggleSubmitButton();
        });
    </script>
@endsection
