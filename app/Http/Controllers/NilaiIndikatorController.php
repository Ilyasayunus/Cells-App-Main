<?php

namespace App\Http\Controllers;

use App\Models\NilaiIndikator;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NilaiIndikatorController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tmp_files = TemporaryFile::all();
        $validatedData = $request->validate([
            'indikator_id' => 'required',
            'laporan_id' => 'required',
            'penjelasan' => 'required',
            'nilai' => 'required'
        ]);

        $validatedData['evidence'] = [];

        if ($tmp_files) {
            // dd($tmp_files);
            foreach ($tmp_files as $tmp_file) {
                Storage::copy('spbe-evidence/tmp/' . $tmp_file->folder . '/' . $tmp_file->file, 'spbe-evidence/' . $tmp_file->folder . '/' . $tmp_file->file);
                Storage::deleteDirectory('spbe-evidence/tmp/' . $tmp_file->folder);
                array_push($validatedData['evidence'], 'spbe-evidence/' . $tmp_file->folder . '/' . $tmp_file->file);
                $tmp_file->delete();
            }
        }

        $validatedData['created_by'] = auth()->user()->username;

        NilaiIndikator::create($validatedData);
        return redirect('admin/penilaian/' . $request->laporan_id)->with('success', 'Nilai Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(NilaiIndikator $nilaiIndikator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NilaiIndikator $nilaiIndikator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NilaiIndikator $nilaiIndikator)
    {
        $tmp_files = TemporaryFile::all();
        $validatedData = $request->validate([
            'indikator_id' => 'required',
            'laporan_id' => 'required',
            'penjelasan' => 'required',
            'nilai' => 'required'
        ]);
        if ($tmp_files->count() > 0) {
            if ($request->oldEvidence) {
                $oldEvidences = json_decode($request->oldEvidence);
                foreach ($oldEvidences as $oldEvidence) {
                    $split = explode('/', $oldEvidence);
                    Storage::deleteDirectory('spbe-evidence/' . $split[1]);
                }
            }
            $validatedData['evidence'] = [];
            foreach ($tmp_files as $tmp_file) {
                Storage::copy('spbe-evidence/tmp/' . $tmp_file->folder . '/' . $tmp_file->file, 'spbe-evidence/' . $tmp_file->folder . '/' . $tmp_file->file);
                Storage::deleteDirectory('spbe-evidence/tmp/' . $tmp_file->folder);
                array_push($validatedData['evidence'], 'spbe-evidence/' . $tmp_file->folder . '/' . $tmp_file->file);
                $tmp_file->delete();
            }
        } else {
            $validatedData['evidence'] = json_decode($request->oldEvidence);
        }

        $validatedData['updated_by'] = auth()->user()->username;
        NilaiIndikator::where('id', $nilaiIndikator->id)->update($validatedData);

        return redirect('/admin/penilaian/' . $request->laporan_id)->with('success', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NilaiIndikator $nilaiIndikator)
    {
        //
    }
}
