@extends('admin.layouts.main')
@section('container')
    <div class="row d-flex justify-content-center" style="text-align: justify;">
        <div class="col-md-12">
            <div class="card shadow card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-info-circle"></i> Detail Indikator</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Domain Indikator :</dt>
                        <dd>{{ $data->domain->nama_domain }}</dd>
                        <dt class="col-sm-3">Aspek Indikator :</dt>
                        <dd>{{ $data->aspek->nama_aspek }}</dd>
                        <dt class="col-sm-3">Uraian Indikator :</dt>
                        <dd>{!! $data->uraian_indikator !!}</dd>
                        <dt class="col-sm-3">Tujuan Indikator :</dt>
                        <dd> {!! $data->tujuan_indikator !!}</dd>
                    </dl>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-12">
            <div class="card shadow card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-expand"></i> Ruang Lingkup Indikator</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p>{!! $data->ruang_lingkup_indikator !!}</p>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <h2 style="text-align: center">Kriteria Indikator</h2>
        <div class="col-md-4">
            <div class="card shadow card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-star"></i> Level 1</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p>{!! $data->tingkat_1 !!}</p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-4">
            <div class="card shadow card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-star"></i> Level 2</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p>{!! $data->tingkat_2 !!}</p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-4">
            <div class="card shadow card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-star"></i> Level 3</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p>{!! $data->tingkat_3 !!}</p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-6">
            <div class="card shadow card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-star"></i> Level 4</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p>{!! $data->tingkat_4 !!}</p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-6">
            <div class="card shadow card-primary">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-star"></i> Level 5</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p>{!! $data->tingkat_5 !!}</p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="mb-3">
            <a href="/admin/indikator" class="btn btn-xs btn-primary">Kembali</a>
        </div>
    </div>
@endsection
