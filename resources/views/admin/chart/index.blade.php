@extends('admin.layouts.main')
@section('container')
    <div class="row">
        <div class="col-lg-12">
            <div class="bg-white rounded shadow">
                {!! $chart->container() !!}
                <table class="table table-bordered table-striped" id="dataIndikator">
                    <thead>
                        <tr>
                            <th class="text-center">Nama Indeks</th>
                            @foreach ($listNilai as $data)
                                <th class="text-center" style="width:auto">Nilai {{ $data['nama_laporan'] }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < count($indeks); $i++)
                            <tr>
                                <td>{!! $indeks[$i] !!}</td>
                                @foreach ($listNilai as $data)
                                    <td class="text-center">{{ $data['nilai'][$i] }}</td>
                                @endforeach
                            </tr>
                        @endfor
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-center">Nilai SPBE</th>
                            @foreach ($listNilai as $data)
                                <th class="text-center">{{ $data['nilaiSPBE'] }}</th>
                            @endforeach
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="mb-3">
            <a href="/admin" class="btn btn-xs btn-primary">Kembali</a>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
@endsection
