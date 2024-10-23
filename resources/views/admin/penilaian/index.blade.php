@extends('admin.layouts.main')
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Penilaian Mandiri Indikator SPBE</h3>
                    <div class="card-tools">
                        <a href="/admin/penilaian/create" class="btn btn-xs btn-primary"><i class="fas fa-plus-circle"></i>
                            Buat Penilaian</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="penilaianIndikator" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Judul Laporan</th>
                                <th>Status Pengerjaan</th>
                                <th>Batas Waktu</th>
                                <th>Kemajuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataLaporan as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->tahun }}</td>
                                    <td>{{ $data->nama_laporan }}</td>
                                    <td>
                                        @if ($data->status_pengerjaan == 'Done')
                                            <span class="right badge rounded-pill badge-success">Done</span>
                                        @elseif ($data->status_pengerjaan == 'On Review')
                                            <span class="right badge rounded-pill badge-primary">On Review</span>
                                        @elseif ($data->status_pengerjaan == 'On Progress')
                                            <span class="right badge rounded-pill badge-info">On Progress</span>
                                        @endif
                                    </td>
                                    <td>{{ $data->batas_waktu }}</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                role="progressbar" aria-valuenow="{{ $persentase[$data->id] }}"
                                                aria-valuemin="0" aria-valuemax="100"
                                                style="width: {{ $persentase[$data->id] }}%;">
                                                {{ $persentase[$data->id] }}%
                                            </div>
                                        </div>


                                    </td>
                                    <td>
                                        <a href="/admin/penilaian/{{ $data->id }}" class="btn btn-success"><i
                                                class="fas fa-eye"></i></a>
                                        <a href="/admin/penilaian/{{ $data->id }}/edit" class="btn btn-primary"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <form action="/admin/penilaian/{{ $data->id }}" method="post"
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
            $("#penilaianIndikator").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#penilaianIndikator_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
