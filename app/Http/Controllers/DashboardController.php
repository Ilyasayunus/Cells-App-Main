<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indikator;
use App\Models\LaporanPenilaian;
use App\Models\News;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'title' => 'Halaman Dashboard',
            'indikator' => Indikator::count(),
            'laporan' => LaporanPenilaian::count(),
            'news' => News::count(),
            'dataLaporan' => LaporanPenilaian::all(),
        ]);
    }
}
