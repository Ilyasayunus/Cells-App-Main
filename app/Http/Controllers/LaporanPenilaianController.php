<?php

namespace App\Http\Controllers;

use App\Models\LaporanPenilaian;
use App\Models\Indikator;
use App\Models\NilaiIndikator;
use Illuminate\Http\Request;

class LaporanPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataLaporan = LaporanPenilaian::all();
        $jumlahIndikator = Indikator::count();
        if ($dataLaporan->count() != 0) {
            foreach ($dataLaporan as $data) {
                if ($jumlahIndikator == 0) {
                    $persentase[$data->id] = 0;
                } else {
                    $jumlahNilai = NilaiIndikator::where('laporan_id', $data->id)->count();
                    $persentase[$data->id] = round($jumlahNilai / $jumlahIndikator * 100);
                }
            }
        } else {
            $persentase = 0;
        }

        return view('admin.penilaian.index', [
            'title' => 'Halaman Penilaian Mandiri',
            'dataLaporan' => LaporanPenilaian::all(),
            'persentase' => $persentase,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.penilaian.create', ['title' => 'Halaman Laporan']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_laporan' => 'required|max:255',
            'tahun' => 'required',
            'status_pengerjaan' => 'required|max:255',
            'batas_waktu' => 'required',
        ]);

        $part = explode(' ', $validatedData['batas_waktu']);
        $part = explode('-', $part[0]);
        $result = $part[2] . '-' . $part[1] . '-' . $part[0];
        $validatedData['batas_waktu'] = $result;

        $validatedData['created_by'] = auth()->user()->username;

        LaporanPenilaian::create($validatedData);

        return redirect('/admin/penilaian')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(LaporanPenilaian $penilaian)
    {
        return view('admin.penilaian.show', [
            'title' => 'Detail Laporan',
            'dataLaporan' => $penilaian,
            'nilaiIndikator' => NilaiIndikator::where('laporan_id', $penilaian->id)->get(),
            'dataIndikator' => Indikator::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanPenilaian $penilaian)
    {
        $part = explode(' ', $penilaian->batas_waktu);
        $part = explode('-', $part[0]);
        $result = $part[2] . '-' . $part[1] . '-' . $part[0];
        $penilaian->batas_waktu = $result;

        return view('admin.penilaian.edit', [
            'title' => 'Halaman Edit Laporan Penilaian',
            'data' => $penilaian
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LaporanPenilaian $penilaian)
    {
        $validatedData = $request->validate([
            'nama_laporan' => 'required|max:255',
            'tahun' => 'required',
            'status_pengerjaan' => 'required|max:255',
            'batas_waktu' => 'required',
        ]);

        $part = explode(' ', $validatedData['batas_waktu']);
        $part = explode('-', $part[0]);
        $result = $part[2] . '-' . $part[1] . '-' . $part[0];
        $validatedData['batas_waktu'] = $result;

        $validatedData['updated_by'] = auth()->user()->username;

        LaporanPenilaian::where('id', $penilaian->id)->update($validatedData);

        return redirect('/admin/penilaian')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanPenilaian $penilaian)
    {
        LaporanPenilaian::destroy($penilaian->id);
        return redirect('/admin/penilaian')->with('success', 'Data Berhasil Dihapus!');
    }
}
