@extends('admin.layouts.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <table class="table">
                <tbody>
                    <tr>
                        <td>
                            <dt class="col-sm-3">Judul Laporan</dt>
                            <dd class="col-sm-9">{{ $dataLaporan->nama_laporan }}</dd>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <dt class="col-sm-3">Tahun</dt>
                            <dd class="col-sm-9">{{ $dataLaporan->tahun }}</dd>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <dt class="col-sm-3">Status</dt>
                            <dd class="col-sm-9">{{ $dataLaporan->status_pengerjaan }}</dd>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <dt class="col-sm-3">Batas Waktu</dt>
                            <dd class="col-sm-9">{{ $dataLaporan->batas_waktu }}</dd>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="col-4">
                <form action="/admin/import-excel" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $dataLaporan->id }}" name="laporan_id">
                    <div class="mb-3">
                        <label for="excel" class="form-label">Import Data Dari Excel</label>
                        <input class="form-control" type="file" id="excel" name="excel" accept=".xls, .xlsx">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-success" type="submit">Import</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Indikator SPBE</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="dataIndikator" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px">No</th>
                                <th>Nama Indikator</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($dataIndikator->count() > 0)
                                @foreach ($dataIndikator as $data)
                                    @php
                                        $dataNilaiIndikator = false;
                                        foreach ($nilaiIndikator as $dataNilai) {
                                            if ($dataNilai->indikator_id == $data->id) {
                                                $dataNilaiIndikator = true;
                                            }
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="d-flex justify-content-between">
                                            {{ $data->nama_indikator }}
                                            @if ($dataNilaiIndikator == true)
                                                <div>
                                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                                        data-target="#modal-lg-{{ $data->id }}-preview">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#modal-lg-{{ $data->id }}-edit">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </button>
                                                </div>
                                            @else
                                                <div>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#modal-lg-{{ $data->id }}">
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="mb-3">
            <a href="/admin/penilaian" class="btn btn-xs btn-primary">Kembali</a>
        </div>
    </div>

    @foreach ($dataIndikator as $data)
        <div class="modal fade" id="modal-lg-{{ $data->id }}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Penilaian Mandiri</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <dt class="col-sm-3">Nama Indikator</dt>
                        <dd class="col-sm-9">{{ $data->nama_indikator }}</dd>
                        <dt class="col-sm-3">Domain Indikator</dt>
                        <dd class="col-sm-9">{{ $data->domain->nama_domain }}</dd>
                        <dt class="col-sm-3">Aspek Indikator</dt>
                        <dd class="col-sm-9">{{ $data->aspek->nama_aspek }}</dd>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Tingkat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-widget="expandable-table" aria-expanded="false">
                                    <td class="d-flex justify-content-between">
                                        <div>Level 1 </div>
                                        <div>
                                            <button type="button" class="btn btn-default p-0">
                                                <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="expandable-body">
                                    <td>
                                        <p>{!! $data->tingkat_1 !!}</p>
                                    </td>
                                </tr>
                                <tr data-widget="expandable-table" aria-expanded="false">
                                    <td class="d-flex justify-content-between">
                                        <div>Level 2</div>
                                        <div>
                                            <button type="button" class="btn btn-default p-0">
                                                <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="expandable-body">
                                    <td>
                                        <p>{!! $data->tingkat_2 !!}</p>
                                    </td>
                                </tr>
                                <tr data-widget="expandable-table" aria-expanded="false">
                                    <td class="d-flex justify-content-between">
                                        <div>Level 3</div>
                                        <div>
                                            <button type="button" class="btn btn-default p-0">
                                                <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="expandable-body">
                                    <td>
                                        <p>{!! $data->tingkat_3 !!}</p>
                                    </td>
                                </tr>
                                <tr data-widget="expandable-table" aria-expanded="false">
                                    <td class="d-flex justify-content-between">
                                        <div>Level 4</div>
                                        <div>
                                            <button type="button" class="btn btn-default p-0">
                                                <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="expandable-body">
                                    <td>
                                        <p>{!! $data->tingkat_4 !!}</p>
                                    </td>
                                </tr>
                                <tr data-widget="expandable-table" aria-expanded="false">
                                    <td class="d-flex justify-content-between">
                                        <div>Level 5</div>
                                        <div>
                                            <button type="button" class="btn btn-default p-0">
                                                <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="expandable-body">
                                    <td>
                                        <p>{!! $data->tingkat_5 !!}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <form action="/admin/nilaiIndikator" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="tahun" value='{{ $dataLaporan->tahun }}'>
                            <input type="hidden" name="laporan_id" value='{{ $dataLaporan->id }}'>
                            <input type="hidden" name="indikator_id" value='{{ $data->id }}'>
                            <div class="mb-3">
                                <label for="penjelasan" class="form-label">Penjelasan</label>
                                <input id="penjelasan-{{ $data->id }}" type="hidden" name="penjelasan">
                                <trix-editor input="penjelasan-{{ $data->id }}"></trix-editor>
                            </div>
                            <div class="mb-3 d-flex">
                                <div class="col-6">
                                    <label for="nilai" class="form-label">Nilai</label>
                                    <select class="form-select" id="nilai" name="nilai"
                                        aria-label="Default select example">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}">{{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="evidence" class="form-label">Bukti Dukung</label>
                                <input type="file" id="fileUpload" name="evidence" multiple=>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    @endforeach
    @foreach ($dataIndikator as $data)
        @if ($nilaiIndikator->count() != 0)
            @foreach ($nilaiIndikator as $dataNilai)
                @if ($dataNilai->indikator_id == $data->id)
                    @php
                        $id = $dataNilai->id;
                        $nilai = $dataNilai->nilai;
                        $penjelasan = $dataNilai->penjelasan;
                        $evidence = $dataNilai->evidence;
                    @endphp
                    <div class="modal fade" id="modal-lg-{{ $data->id }}-edit">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Penilaian Mandiri</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <dt class="col-sm-3">Nama Indikator</dt>
                                    <dd class="col-sm-9">{{ $data->nama_indikator }}</dd>
                                    <dt class="col-sm-3">Domain Indikator</dt>
                                    <dd class="col-sm-9">{{ $data->domain->nama_domain }}</dd>
                                    <dt class="col-sm-3">Aspek Indikator</dt>
                                    <dd class="col-sm-9">{{ $data->aspek->nama_aspek }}</dd>
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Tingkat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td class="d-flex justify-content-between">
                                                    <div>Level 1 </div>
                                                    <div>
                                                        <button type="button" class="btn btn-default p-0">
                                                            <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td>
                                                    <p>{!! $data->tingkat_1 !!}</p>
                                                </td>
                                            </tr>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td class="d-flex justify-content-between">
                                                    <div>Level 2</div>
                                                    <div>
                                                        <button type="button" class="btn btn-default p-0">
                                                            <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td>
                                                    <p>{!! $data->tingkat_2 !!}</p>
                                                </td>
                                            </tr>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td class="d-flex justify-content-between">
                                                    <div>Level 3</div>
                                                    <div>
                                                        <button type="button" class="btn btn-default p-0">
                                                            <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td>
                                                    <p>{!! $data->tingkat_3 !!}</p>
                                                </td>
                                            </tr>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td class="d-flex justify-content-between">
                                                    <div>Level 4</div>
                                                    <div>
                                                        <button type="button" class="btn btn-default p-0">
                                                            <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td>
                                                    <p>{!! $data->tingkat_4 !!}</p>
                                                </td>
                                            </tr>
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td class="d-flex justify-content-between">
                                                    <div>Level 5</div>
                                                    <div>
                                                        <button type="button" class="btn btn-default p-0">
                                                            <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="expandable-body">
                                                <td>
                                                    <p>{!! $data->tingkat_5 !!}</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <form id="edit-form-{{ $data->id }}"
                                        action="/admin/nilaiIndikator/{{ $id }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="tahun" value='{{ $dataLaporan->tahun }}'>
                                        <input type="hidden" name="indikator_id" value='{{ $data->id }}'>
                                        <input type="hidden" name="laporan_id" value='{{ $dataLaporan->id }}'>
                                        <div class="mb-3">
                                            <label for="penjelasan" class="form-label">Penjelasan</label>
                                            <input id="penjelasan" type="hidden" name="penjelasan"
                                                value="{{ $penjelasan }}">
                                            <trix-editor input="penjelasan"></trix-editor>
                                        </div>
                                        <div class="mb-3 d-flex">
                                            <div class="col-6">
                                                <label for="nilai" class="form-label">Nilai</label>
                                                <select class="form-select" id="nilai" name="nilai"
                                                    aria-label="Default select example">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <option value="{{ $i }}"
                                                            @if ($nilai == $i) selected @endif>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="evidence" class="form-label">Bukti Dukung</label>
                                            <input type="file" id="fileUpload" name="evidence" multiple>
                                            <input type="hidden" name="oldEvidence"
                                                value="{{ json_encode($evidence) }}">
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <div class="modal fade" id="modal-lg-{{ $data->id }}-preview">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Preview</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <dt class="col-sm-3">Penjelasan</dt>
                                    <dd class="col-sm-9">{!! $penjelasan !!}</dd>
                                    <dt class="col-sm-3">Nilai</dt>
                                    <dd class="col-sm-9">{{ $nilai }}</dd>
                                    @if ($evidence)
                                        <dt class="col-sm-3">Bukti Dukung</dt>
                                        @foreach ($evidence as $item)
                                            <div class="col-12" id="pdf-container">
                                                <embed src="{{ asset('storage/' . $item) }}" id="pdf-preview"
                                                    type="application/pdf" style="width:100%; height:500px;"></embed>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                @endif
            @endforeach
        @endif
        <!-- /.modal -->
    @endforeach

@endsection
@section('js')
    <script>
        $(function() {
            $("#dataIndikator").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#dataIndikator_wrapper .col-md-6:eq(0)');
        });
    </script>

    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        document.querySelectorAll('#fileUpload').forEach(inputElement => {
            FilePond.create(inputElement);
        });
        FilePond.setOptions({
            server: {
                process: {
                    url: '/filepond-upload',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                },
                revert: {
                    url: '/filepond-delete',
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                }
            }
        });
    </script>

    @foreach ($dataIndikator as $data)
        <script>
            $('#modal-lg-{{ $data->id }}-edit').on('hidden.bs.modal', function() {
                console.log('dismiss berhasil');
                $.ajax({
                    url: '/filepond-deleteAll',
                    method: 'delete',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log('File sementara dihapus dari database.');
                    },
                    error: function(xhr) {
                        console.error('Gagal menghapus file sementara:', xhr.responseText);
                    }
                });
            });
            $('#modal-lg-{{ $data->id }}').on('hidden.bs.modal', function() {
                console.log('dismiss berhasil');
                $.ajax({
                    url: '/filepond-deleteAll',
                    method: 'delete',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log('File sementara dihapus dari database.');
                    },
                    error: function(xhr) {
                        console.error('Gagal menghapus file sementara:', xhr.responseText);
                    }
                });
            });
        </script>
    @endforeach
@endsection
