<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\DomainIndikator;
use App\Models\AspekIndikator;
use App\Models\Indikator;
use App\Models\LaporanPenilaian;
use App\Models\NilaiIndikator;
use App\Charts\RekapNilaiSPBEChart;
use App\Charts\SPBEChart;

class HomepageController extends Controller
{
    public function index(RekapNilaiSPBEChart $chart)
    {

        $indikator = Indikator::all();
        $dataDomain = DomainIndikator::all();
        $dataAspek = AspekIndikator::all();
        $dataLaporan = LaporanPenilaian::where('status_pengerjaan', 'Done')->get();
        $aspek = [];
        foreach ($dataAspek as $data) {
            array_push($aspek, $data->nama_aspek);
        }
        $result = [];

        foreach ($dataLaporan as $laporan) {
            $dataNilai = NilaiIndikator::where('laporan_id', $laporan->id)->get();
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
                'nama_laporan' => $laporan->nama_laporan,
                'nilaiSPBE' => round($nilaiSPBE, 2),
            ];
        }

        return view('homepage.index', [
            'dataNews' => News::latest()->limit(6)->get(),
            'dataDomain' => DomainIndikator::all(),
            'dataAspek' => AspekIndikator::all(),
            'dataIndikator' => Indikator::all(),
            'dataLaporan' => LaporanPenilaian::where('status_pengerjaan', 'Done')->get(),
            'result' => $result,
            'chart' => $chart->build($result),

        ]);
    }

    public function news()
    {
        return view('homepage.news.index', [
            'dataNews' => News::latest()->get(),
            'dataDomain' => DomainIndikator::all(),
        ]);
    }

    public function showNews(News $news)
    {
        return view('homepage.news.show', [
            'data' => $news,
            'dataDomain' => DomainIndikator::all(),
        ]);
    }

    public function showDomain(DomainIndikator $domain)
    {
        $dataAspek = AspekIndikator::all();
        $dataIndikator = Indikator::all();
        $aspekDanIndikator = [];

        foreach ($dataAspek as $aspek) {
            foreach ($dataIndikator as $indikator) {
                if ($indikator->domain_id == $domain->id && $indikator->aspek_id == $aspek->id) {
                    $aspekDanIndikator[] = [
                        'namaAspek' => $aspek->nama_aspek,
                        'bobotAspek' => $aspek->bobot_aspek,
                        'indikator' => $dataIndikator->where('aspek_id', $aspek->id)
                    ];
                    break;
                }
            }
        }

        return view('homepage.show-domain', [
            'data' => $domain,
            'dataAspek' => $aspekDanIndikator,
            'dataDomain' => DomainIndikator::all(),
        ]);
    }

    public function showChart(LaporanPenilaian $laporan, SPBEChart $chart)
    {
        $indikator = Indikator::all();
        $dataDomain = DomainIndikator::all();
        $dataAspek = AspekIndikator::all();
        $aspek = [];
        foreach ($dataAspek as $data) {
            array_push($aspek, $data->nama_aspek);
        }

        $dataNilai = NilaiIndikator::where('laporan_id', $laporan->id)->get();
        // $dataLaporan = LaporanPenilaian::where('id', $laporan)->get();
        $dataLaporan = LaporanPenilaian::where('id', $laporan->id)->first();
        // dd($dataLaporan);
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
            'nama_laporan' => $dataLaporan->nama_laporan,
            'nilaiAspek' => $nilaiAspek,
        ];

        $listNilai[] = [
            'nama_laporan' => $dataLaporan->nama_laporan,
            'indeks' => $namaPenilaian,
            'nilai' => $penilaian,
            'nilaiSPBE' => round($nilaiSPBE, 2),
        ];

        return view('homepage.show-chart', [
            'title' => 'Chart SPBE',
            'dataLaporan' => $dataLaporan,
            'chart' => $chart->build($result, $aspek),
            'indeks' => $namaPenilaian,
            'dataDomain' => DomainIndikator::all(),
            'listNilai' => $listNilai,
        ]);
    }
}
