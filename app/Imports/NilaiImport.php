<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\NilaiIndikator;
use App\Models\LaporanPenilaian;
use App\Models\Indikator;

class NilaiImport implements ToCollection, WithHeadingRow
{
    protected $formData;

    public function __construct(String $formData)
    {
        $this->formData = $formData;
    }
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $laporan_id = $this->formData;
        $iteration = 0;
        foreach ($collection as $item) {
            if ($iteration > 0) {
                $indikator = Indikator::where('nama_indikator', $item[1])->first();
                $indikator_id = $indikator->id;
                $data = [
                    'indikator_id' => $indikator_id,
                    'laporan_id' => $laporan_id,
                    'penjelasan' => $item[2],
                    'nilai' => $item[3],
                ];
                if (NilaiIndikator::where('indikator_id', $indikator_id)->where('laporan_id', $laporan_id)->count() == 0) {
                    $data['created_by'] = auth()->user()->username;
                    NilaiIndikator::create($data);
                } else {
                    $nilaiIndikator = NilaiIndikator::where('indikator_id', $indikator_id)->where('laporan_id', $laporan_id)->first();
                    $data['updated_by'] = auth()->user()->username;
                    NilaiIndikator::where('id', $nilaiIndikator->id)->update($data);
                }
            }
            $iteration++;
        }
    }
}