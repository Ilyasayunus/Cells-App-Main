<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\NilaiImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function importExcel(Request $request)
    {
        $request->validate([
            'excel' => 'required|mimes:xlsx,xls',
        ]);
        Excel::import(new NilaiImport($request->laporan_id), $request->file('excel'));
        return redirect('admin/penilaian/' . $request->laporan_id)->with('success', 'Nilai Berhasil diimport!');
    }
}
