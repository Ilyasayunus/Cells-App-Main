<?php

namespace App\Http\Controllers;

use App\Models\AspekIndikator;
use Illuminate\Http\Request;

class AspekIndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.indikator.aspek.create', [
            'title' => 'Aspek Indikator',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_aspek' => 'required|max:255',
            'bobot_aspek' => 'required',
        ]);

        $validatedData['created_by'] = auth()->user()->username;
        AspekIndikator::create($validatedData);

        return redirect('/admin/indikator')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(AspekIndikator $aspekIndikator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AspekIndikator $aspekIndikator)
    {
        return view('admin.indikator.aspek.edit', [
            'title' => 'Edit Domain',
            'data' => $aspekIndikator,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AspekIndikator $aspekIndikator)
    {
        $validatedData = $request->validate([
            'nama_aspek' => 'required|max:255',
            'bobot_aspek' => 'required',
        ]);

        $validatedData['updated_by'] = auth()->user()->username;
        AspekIndikator::where('id', $aspekIndikator->id)->update($validatedData);

        return redirect('/admin/indikator')->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AspekIndikator $aspekIndikator)
    {
        AspekIndikator::destroy($aspekIndikator->id);
        return redirect('/admin/indikator')->with('success', 'Data Berhasil Dihapus!');
    }
}
