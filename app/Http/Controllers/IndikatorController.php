<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use Illuminate\Http\Request;
use App\Models\DomainIndikator;
use App\Models\AspekIndikator;

class IndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.indikator.index', [
            'title' => 'Indikator',
            'dataIndikator' => Indikator::all(),
            'dataDomain' => DomainIndikator::all(),
            'dataAspek' => AspekIndikator::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.indikator.create', [
            'title' => 'Indikator',
            'dataDomain' => DomainIndikator::all(),
            'dataAspek' => AspekIndikator::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_indikator' => 'required|max:255',
            'domain_id' => 'required',
            'aspek_id' => 'required',
            'uraian_indikator' => 'required',
            'tujuan_indikator' => 'required',
            'ruang_lingkup_indikator' => 'required',
            'tingkat_1' => 'required',
            'tingkat_2' => 'required',
            'tingkat_3' => 'required',
            'tingkat_4' => 'required',
            'tingkat_5' => 'required',
        ]);

        $validatedData['created_by'] = auth()->user()->username;
        Indikator::create($validatedData);


        return redirect('/admin/indikator')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Indikator $indikator)
    {
        return view('admin.indikator.show', [
            'title' => $indikator->nama_indikator,
            'data' => $indikator,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Indikator $indikator)
    {
        return view('admin.indikator.edit', [
            'title' => 'Edit Domain',
            'dataDomain' => DomainIndikator::all(),
            'dataAspek' => AspekIndikator::all(),
            'data' => $indikator,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Indikator $indikator)
    {
        $validatedData = $request->validate([
            'nama_indikator' => 'required|max:255',
            'domain_id' => 'required',
            'aspek_id' => 'required',
            'uraian_indikator' => 'required',
            'tujuan_indikator' => 'required',
            'ruang_lingkup_indikator' => 'required',
            'tingkat_1' => 'required',
            'tingkat_2' => 'required',
            'tingkat_3' => 'required',
            'tingkat_4' => 'required',
            'tingkat_5' => 'required',
        ]);

        $validatedData['updated_by'] = auth()->user()->username;

        Indikator::where('id', $indikator->id)->update($validatedData);

        return redirect('/admin/indikator')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Indikator $indikator)
    {
        Indikator::destroy($indikator->id);
        return redirect('/admin/indikator')->with('success', 'Data Berhasil Dihapus!');
    }
}
