@extends('admin.layouts.main')
@section('container')
    <div class="col-lg-8">
        <form method="post" action="/admin/domainIndikator/{{ $data->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nama_domain" class="form-label">Nama Domain Indikator</label>
                <input type="text" class="form-control" id="nama_domain" name="nama_domain" required autofocus
                    value="{{ $data->nama_domain }}">
            </div>
            <div class="mb-3">
                <label for="bobot_domain" class="form-label">Bobot Domain Indikator (%)</label>
                <input type="number" class="form-control" id="bobot_domain" name="bobot_domain" step="0.1" required
                    autofocus value="{{ $data->bobot_domain }}">
            </div>
            <div class="mb-3">
                <a href="/admin/indikator" class="btn btn-xs btn-primary">Kembali</a>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
@endsection
