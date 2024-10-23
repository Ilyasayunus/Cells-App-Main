<?php

namespace App\Http\Controllers;

use App\Models\DomainIndikator;
use Illuminate\Http\Request;

class DomainIndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.indikator.domain.create', [
            'title' => 'Domain Indikator',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_domain' => 'required|max:255',
            'bobot_domain' => 'required',
        ]);

        $validatedData['created_by'] = auth()->user()->username;

        DomainIndikator::create($validatedData);

        return redirect('/admin/indikator')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DomainIndikator $domainIndikator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DomainIndikator $domainIndikator)
    {
        return view('admin.indikator.domain.edit', [
            'title' => 'Edit Domain',
            'data' => $domainIndikator,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DomainIndikator $domainIndikator)
    {
        $validatedData = $request->validate([
            'nama_domain' => 'required|max:255',
            'bobot_domain' => 'required',
        ]);

        $validatedData['updated_by'] = auth()->user()->username;

        DomainIndikator::where('id', $domainIndikator->id)->update($validatedData);

        return redirect('/admin/indikator')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DomainIndikator $domainIndikator)
    {
        DomainIndikator::destroy($domainIndikator->id);
        return redirect('/admin/indikator')->with('success', 'Data Berhasil Dihapus!');
    }
}
