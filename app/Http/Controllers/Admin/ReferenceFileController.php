<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReferenceFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReferenceFileController extends Controller
{
    public function index()
    {
        $files = ReferenceFile::with('uploadedBy')
            ->latest()
            ->paginate(10);

        return view('admin.reference-files.index', compact('files'));
    }

    public function create()
    {
        return view('admin.reference-files.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_file' => [
                'required',
                'string',
                'max:255',
            ],

            'deskripsi' => [
                'nullable',
                'string',
            ],

            'file' => [
                'required',
                'file',
                'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip',
                'max:51200',
            ],
        ]);

        $filePath = $request->file('file')->store(
            'reference-files',
            'public'
        );

        ReferenceFile::create([
            'nama_file' => $validated['nama_file'],
            'file' => $filePath,
            'deskripsi' => $validated['deskripsi'] ?? null,

            // Status awal selalu menunggu verifikasi
            'status' => 'pending',

            // Menyimpan Admin yang melakukan upload
            'uploaded_by' => auth()->id(),

            // Belum diverifikasi Super Admin
            'verified_by' => null,
            'verified_at' => null,
            'rejection_reason' => null,
        ]);

        return redirect()
            ->route('admin.reference-files.index')
            ->with(
                'success',
                'File referensi berhasil diupload dan menunggu verifikasi Super Admin.'
            );
    }

    public function destroy(ReferenceFile $referenceFile)
    {
        if (
            $referenceFile->file &&
            Storage::disk('public')->exists($referenceFile->file)
        ) {
            Storage::disk('public')->delete($referenceFile->file);
        }

        $referenceFile->delete();

        return redirect()
            ->route('admin.reference-files.index')
            ->with(
                'success',
                'File referensi berhasil dihapus.'
            );
    }
}
