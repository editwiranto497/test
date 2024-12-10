<?php

namespace App\Http\Controllers;

use App\Models\StorageLocation;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function create()
    {
        $storageLocations = StorageLocation::all();
        return view('upload_form', compact('storageLocations'));
    }

    public function store(Request $request)
    {
        // Validasi file dan alias
        $request->validate([
            'file' => 'required|file|mimes:jpg,png,pdf,json|max:2048',
            'destination' => 'required|exists:storage_locations,alias',
        ]);

        // Ambil path berdasarkan alias
        $location = StorageLocation::where('alias', $request->input('destination'))->first();
        $destinationPath = $location->path;

        // Tangani upload file
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Tentukan nama file
            $filename = $file->getClientOriginalName();

            // Pindahkan file ke tujuan
            $file->move($destinationPath, $filename);
            return back()->with('success', 'File berhasil diupload ke ' . $destinationPath);
        }

        return back()->withErrors('Tidak ada file yang diupload');
    }
}
