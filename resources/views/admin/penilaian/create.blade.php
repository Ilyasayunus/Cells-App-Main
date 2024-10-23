@extends('admin.layouts.main')
@section('container')
    <div class="row">
        <div class="col-lg-8">
            <form method="post" action="/admin/penilaian" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_laporan" class="form-label">Nama Laporan</label>
                    <input type="text" class="form-control" id="nama_laporan" name="nama_laporan"
                        value="{{ old('nama_laporan') }}" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="tahun" class="form-label">Tahun</label>
                    <select class="form-select" id="tahun" name="tahun" aria-label="Default select example">
                        @for ($i = now()->year; $i >= 2021; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status_pengerjaan" class="form-label">Status Pengerjaan</label>
                    <select class="form-select" id="status_pengerjaan" name="status_pengerjaan"
                        aria-label="Default select example">
                        <option value="On Progress">On Progress</option>
                        <option value="On Review">On Review</option>
                        <option value="Done">Done</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="batas_waktu" class="form-label">Batas Waktu</label>
                    <input type="date" class="form-control" id="batas_waktu" name="batas_waktu" required autofocus>
                </div>
                <div class="mb-3">
                    <a href="/admin/penilaian" class="btn btn-xs btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
