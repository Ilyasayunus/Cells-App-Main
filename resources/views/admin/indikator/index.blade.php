@extends('admin.layouts.main')
@section('container')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Domain Indikator SPBE</h3>
                    <div class="card-tools">
                        <a href="/admin/domainIndikator/create" class="btn btn-xs btn-primary"><i
                                class="fas fa-plus-circle"></i> Tambah Data</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Domain</th>
                                <th>Bobot Domain</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($dataDomain->count() > 0)
                                @foreach ($dataDomain as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nama_domain }}</td>
                                        <td>{{ $data->bobot_domain }}%</td>
                                        <td>
                                            <a href="/admin/domainIndikator/{{ $data->id }}/edit"
                                                class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="/admin/domainIndikator/{{ $data->id }}" method="post"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger border-0"
                                                    onclick="return confirm('yakin hapus data?')"><i
                                                        class="fas fa-trash-alt"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">Data Tidak Ditemukan..</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Aspek Indikator SPBE</h3>

                    <div class="card-tools">
                        <a href="/admin/aspekIndikator/create" class="btn btn-xs btn-primary"><i
                                class="fas fa-plus-circle"></i> Tambah Data</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Aspek</th>
                                <th>Bobot Aspek</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($dataAspek->count() > 0)
                                @foreach ($dataAspek as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nama_aspek }}</td>
                                        <td>{{ $data->bobot_aspek }}%</td>
                                        <td>
                                            <a href="/admin/aspekIndikator/{{ $data->id }}/edit"
                                                class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="/admin/aspekIndikator/{{ $data->id }}" method="post"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger border-0"
                                                    onclick="return confirm('yakin hapus data?')"><i
                                                        class="fas fa-trash-alt"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">Data Tidak Ditemukan..</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Indikator SPBE</h3>
                    <div class="card-tools">
                        <a href="/admin/indikator/create" class="btn btn-xs btn-primary"><i class="fas fa-plus-circle"></i>
                            Tambah Data</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="dataIndikator" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width:20px">No</th>
                                <th style="width: 450px">Nama Indikator</th>
                                <th style="width: 300px">Domain Indikator</th>
                                <th style="width: 300px">Aspek Indikator</th>
                                <th style="width: 150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($dataIndikator->count() > 0)
                                @foreach ($dataIndikator as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nama_indikator }}</td>
                                        <td>{{ $data->domain->nama_domain }}</td>
                                        <td>
                                            {{ $data->aspek->nama_aspek }}
                                        </td>
                                        <td>
                                            <a href="/admin/indikator/{{ $data->id }}" class="btn btn-success"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="/admin/indikator/{{ $data->id }}/edit" class="btn btn-primary"><i
                                                    class="fas fa-pencil-alt"></i></a>
                                            <form action="/admin/indikator/{{ $data->id }}" method="post"
                                                class="d-inline ">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger border-0"
                                                    onclick="return confirm('yakin hapus data?')"><i
                                                        class="fas fa-trash-alt"></i></button>
                                            </form>
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
    </div>
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
@endsection
