@extends('admin.layouts.main')
@section('container')
    <div class="row ">
        <div class="col-lg-8">
            <h1>{{ $data->judul }}</h1>
            @if ($data->gambar)
                <div style="max-height: 400px; overflow:hidden">
                    <img src="{{ asset('storage/' . $data->gambar) }}" class="card-img-top mb-2 img-fluid"
                        alt="{{ $data->judul }}">
                </div>
            @endif
            <div class="mt-3">
                <a href="/admin/news" class="btn btn-success"><i class="bi bi-arrow-left"></i></a>
                <a href="/admin/news/{{ $data->slug }}/edit" class="btn btn-primary"><i class="bi bi-pencil-fill"></i></a>
                <form action="/admin/news/{{ $data->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger" onclick="return confirm('yakin hapus data?')"><i
                            class="bi bi-trash3-fill"></i></button>
                </form>

            </div>
            <article class="fs-5 mt-3">
                {!! $data->body !!}
            </article>
        </div>
    </div>
@endsection
