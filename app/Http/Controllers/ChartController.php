<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indikator;
use App\Models\LaporanPenilaian;
use App\Models\NilaiIndikator;
use App\Models\AspekIndikator;
use App\Models\DomainIndikator;
use App\Charts\SPBEChart;

class ChartController extends Controller
{
    public function makeChart(SPBEChart $chart, Request $request)
    {
        $indikator = Indikator::all();
        $dataDomain = DomainIndikator::all();
        $dataAspek = AspekIndikator::all();
        $aspek = [];
        foreach ($dataAspek as $data) {
            array_push($aspek, $data->nama_aspek);
        }

        foreach ($request->laporan as $laporan) {
            $dataNilai = NilaiIndikator::where('laporan_id', $laporan)->get();
            $dataLaporan = LaporanPenilaian::where('id', $laporan)->get();
            $nilaiAspek = [];
            $rataXbobot = [];

            foreach ($dataAspek as $data) {
                $nilaiIndikator = 0;
                foreach ($dataNilai as $nilai) {
                    if ($indikator->where('id', $nilai->indikator_id)->where('aspek_id', $data->id)->count() > 0) {
                        $nilaiIndikator += $nilai->nilai;
                    }
                }
                if ($indikator->where('aspek_id', $data->id)->count() > 0) {
                    $rataAspek = $nilaiIndikator / $indikator->where('aspek_id', $data->id)->count();
                    array_push($nilaiAspek, round($rataAspek, 2));
                    array_push($rataXbobot, $rataAspek * $data->bobot_aspek / 100);
                }
            }

            $penilaian = [];
            $namaPenilaian = [];
            foreach ($dataDomain as $domain) {
                array_push($namaPenilaian, '<b> Domain ' . $domain->nama_domain . '</b>');
                $indeks = 0;
                $rataDomain = 0;
                foreach ($aspek as $data) {
                    $aspek_id = $dataAspek->where('nama_aspek', $data)->value('id');
                    $bobot_aspek = $dataAspek->where('nama_aspek', $data)->value('bobot_aspek');
                    // dd($data);
                    if ($indikator->where('aspek_id', $aspek_id)->where('domain_id', $domain->id)->count() > 0) {
                        array_push($namaPenilaian, $data);
                        $hitung = ($bobot_aspek / $domain->bobot_domain) * $nilaiAspek[$indeks];
                        $rataDomain += $hitung;
                    }
                    $indeks++;
                }

                array_push($penilaian, number_format(round($rataDomain, 2), 2));

                $indeks = 0;
                foreach ($aspek as $data) {
                    $aspek_id = $dataAspek->where('nama_aspek', $data)->value('id');
                    if ($indikator->where('aspek_id', $aspek_id)->where('domain_id', $domain->id)->count() > 0) {
                        array_push($penilaian, number_format($nilaiAspek[$indeks], 2));
                    }
                    $indeks++;
                }
            }

            $nilaiSPBE = 0;
            foreach ($rataXbobot as $nilai) {
                $nilaiSPBE += $nilai;
            }

            $result[] = [
                'nama_laporan' => $dataLaporan[0]->nama_laporan,
                'nilaiAspek' => $nilaiAspek,
            ];

            $listNilai[] = [
                'nama_laporan' => $dataLaporan[0]->nama_laporan,
                'indeks' => $namaPenilaian,
                'nilai' => $penilaian,
                'nilaiSPBE' => round($nilaiSPBE, 2),
            ];
        }

        return view('admin.chart.index', [
            'title' => 'Chart SPBE',
            'chart' => $chart->build($result, $aspek),
            'indeks' => $namaPenilaian,
            'listNilai' => $listNilai,
        ]);
    }
}
