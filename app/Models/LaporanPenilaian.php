<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NilaiIndikator;

class LaporanPenilaian extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function nilai()
    {
        return $this->hasMany(NilaiIndikator::class)->onDelete('cascade');
    }
}
