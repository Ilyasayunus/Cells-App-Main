@extends('admin.layouts.main')

@section('container')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
            <div class="card-tools">
                <a href="/admin/news/create" class="btn btn-xs btn-primary"><i class="fas fa-plus-circle"></i> Buat Berita</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 75%">Judul</th>
                        <th style="width: 20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>
                                <a href="/admin/news/{{ $item->slug }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                <a href="/admin/news/{{ $item->slug }}/edit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                <form action="/admin/news/{{ $item->slug }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger border-0" onclick="return confirm('yakin hapus data?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@section('js')
    <script>
        $(function() {
            $("#dataTable").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#dataTable_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
