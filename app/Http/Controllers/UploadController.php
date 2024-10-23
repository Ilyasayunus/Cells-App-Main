<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\TemporaryFile;

class UploadController extends Controller
{
    public function tmpUpload(Request $request)
    {
        if ($request->hasFile('evidence')) {
            $file = $request->file('evidence');
            $fileName = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('spbe-evidence/tmp/' . $folder, $fileName);
            TemporaryFile::create([
                'folder' => $folder,
                'file' => $fileName,
            ]);

            return $folder;
        }

        return '';
    }

    public function tmpDelete()
    {
        $tmp_file = TemporaryFile::where('folder', request()->getContent())->first();
        if ($tmp_file) {
            Storage::deleteDirectory('spbe-evidence/tmp/' . $tmp_file->folder);
            $tmp_file->delete();
            return response('');
        }
    }

    public function deleteAll()
    {
        Storage::deleteDirectory('spbe-evidence/tmp');
        TemporaryFile::where('updated_at', '<', now())->delete();
        return '';
    }
}
