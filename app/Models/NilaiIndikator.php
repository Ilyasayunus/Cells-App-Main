<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Indikator;
use App\Models\LaporanPenilaian;

class NilaiIndikator extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['indikator', 'laporan'];
    protected $casts = [
        'evidence' => 'array',
    ];

    public function indikator()
    {
        return $this->belongsTo(Indikator::class);
    }

    public function laporan()
    {
        return $this->belongsTo(LaporanPenilaian::class);
    }
}
