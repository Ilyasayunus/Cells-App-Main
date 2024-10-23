<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DomainIndikator;
use App\Models\AspekIndikator;
use App\Models\NilaiIndikator;

class Indikator extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['domain', 'aspek'];

    public function domain()
    {
        return $this->belongsTo(DomainIndikator::class);
    }

    public function aspek()
    {
        return $this->belongsTo(AspekIndikator::class);
    }

    public function nilai()
    {
        return $this->hasOne(NilaiIndikator::class);
    }
}
