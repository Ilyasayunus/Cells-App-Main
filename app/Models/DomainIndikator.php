<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Indikator;

class DomainIndikator extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function indikator()
    {
        return $this->hasMany(Indikator::class)->onDelete('cascade');
    }
}
