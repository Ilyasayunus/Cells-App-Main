<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class SPBEChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($result, $aspek): \ArielMejiaDev\LarapexCharts\RadarChart
    {
        $color = config('larapex-charts.colors');
        $hasil = $this->chart->radarChart();
        $hasil->addData('Aspek SPBE Target', [2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5, 2.5])
            ->setXAxis($aspek)
            ->setHeight(800)
            ->setWidth(1230)
            ->setToolbar(true)
            ->setShowLegend()
            ->setFontFamily('sans-serif');

        foreach ($result as $data) {
            $hasil->addData($data['nama_laporan'], $data['nilaiAspek']);
        }

        $hasil->setColors($color)
            ->setMarkers($color, 6, 10)
            ->setStroke(1, $color);

        return $hasil;
    }
}