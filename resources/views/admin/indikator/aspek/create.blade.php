@extends('admin.layouts.main')
@section('container')
    <div class="row">
        <div class="col-lg-8">
            <form method="post" action="/admin/aspekIndikator" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_aspek" class="form-label">Nama Aspek Indikator</label>
                    <input type="text" class="form-control" id="nama_aspek" name="nama_aspek" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="bobot_aspek" class="form-label">Bobot Aspek Indikator (%)</label>
                    <input type="number" class="form-control" id="bobot_aspek" name="bobot_aspek" step="0.1" required
                        autofocus>
                </div>
                <div class="mb-3">
                    <a href="/admin/indikator" class="btn btn-xs btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
