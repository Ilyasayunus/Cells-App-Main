@extends('admin.layouts.main')
@section('container')
    <div class="row">
        <div class="col-lg-8">
            <form method="POST" action="/admin/indikator" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_indikator" class="form-label">Nama Indikator</label>
                    <input type="text" class="form-control" id="nama_indikator" name="nama_indikator" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="domain_id" class="form-label">Domain Indikator</label>
                    <select class="form-select" id="domain_id" name="domain_id" aria-label="Default select example">
                        @if ($dataDomain->count() > 0)
                            @foreach ($dataDomain as $domain)
                                <option value="{{ $domain->id }}">{{ $domain->nama_domain }}</option>
                            @endforeach
                        @else
                            <option disabled>Harap isi Domain Indikator terlebih dahulu</option>
                        @endif
                    </select>
                </div>
                <div class="mb-3">
                    <label for="aspek_id" class="form-label">Aspek Indikator</label>
                    <select class="form-select" id="aspek_id" name="aspek_id" aria-label="Default select example">
                        @if ($dataAspek->count() > 0)
                            @foreach ($dataAspek as $aspek)
                                <option value="{{ $aspek->id }}">{{ $aspek->nama_aspek }}</option>
                            @endforeach
                        @else
                            <option disabled>Harap isi Aspek Indikator terlebih dahulu</option>
                        @endif
                    </select>
                </div>
                <div class="mb-3">
                    <label for="uraian_indikator" class="form-label">Uraian Indikator</label>
                    <input type="text" class="form-control" id="uraian_indikator" name="uraian_indikator" required>
                </div>
                <div class="mb-3">
                    <label for="tujuan_indikator" class="form-label">Tujuan Indikator</label>
                    <input id="tujuan_indikator" type="hidden" name="tujuan_indikator">
                    <trix-editor input="tujuan_indikator"></trix-editor>
                </div>
                <div class="mb-3">
                    <label for="ruang_lingkup_indikator" class="form-label">Ruang Lingkup Indikator</label>
                    <input id="ruang_lingkup_indikator" type="hidden" name="ruang_lingkup_indikator">
                    <trix-editor input="ruang_lingkup_indikator"></trix-editor>
                </div>
                <div class="mb-3">
                    <label for="tingkat_1" class="form-label">Kriteria Level 1</label>
                    <input id="tingkat_1" type="hidden" name="tingkat_1">
                    <trix-editor input="tingkat_1"></trix-editor>
                </div>
                <div class="mb-3">
                    <label for="tingkat_2" class="form-label">Kriteria Level 2</label>
                    <input id="tingkat_2" type="hidden" name="tingkat_2">
                    <trix-editor input="tingkat_2"></trix-editor>
                </div>
                <div class="mb-3">
                    <label for="tingkat_3" class="form-label">Kriteria Level 3</label>
                    <input id="tingkat_3" type="hidden" name="tingkat_3">
                    <trix-editor input="tingkat_3"></trix-editor>
                </div>
                <div class="mb-3">
                    <label for="tingkat_4" class="form-label">Kriteria Level 4</label>
                    <input id="tingkat_4" type="hidden" name="tingkat_4">
                    <trix-editor input="tingkat_4"></trix-editor>
                </div>
                <div class="mb-3">
                    <label for="tingkat_5" class="form-label">Kriteria Level 5</label>
                    <input id="tingkat_5" type="hidden" name="tingkat_5">
                    <trix-editor input="tingkat_5"></trix-editor>
                </div>
                <div class="mb-3">
                    <a href="/admin/indikator" class="btn btn-xs btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });
    </script>
@endsection
