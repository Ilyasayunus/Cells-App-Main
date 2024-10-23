<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class RekapNilaiSPBEChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($result): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $nilai = [];
        $laporan = [];
        foreach ($result as $data) {
            array_push($nilai, $data['nilaiSPBE']);
            array_push($laporan, $data['nama_laporan']);
        }
        $color = config('larapex-charts.colors');
        $hasil = $this->chart->lineChart();
        $hasil
            ->addData('Nilai SPBE', $nilai)
            ->setXAxis($laporan)
            ->setShowLegend()
            ->setToolbar(true)
            ->setFontFamily('sans-serif')
            ->setGrid()
            ->setColors($color)
            ->setMarkers($color, 6, 10)
            ->setStroke(1, $color);


        return $hasil;
    }
}
