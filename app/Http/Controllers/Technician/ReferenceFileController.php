<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use App\Models\ReferenceFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReferenceFileController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->input('search', ''));
        $format = strtolower(trim($request->input('format', '')));

        $allowedFormats = [
            'pdf',
            'doc',
            'docx',
            'xls',
            'xlsx',
            'ppt',
            'pptx',
            'zip',
        ];

        $files = ReferenceFile::query()

            // PENTING:
            // Teknisi hanya boleh melihat file yang
            // sudah disetujui oleh Super Admin.
            ->where('status', 'approved')

            // Pencarian nama file / deskripsi
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama_file', 'like', '%' . $search . '%')
                        ->orWhere('deskripsi', 'like', '%' . $search . '%');
                });
            })

            // Filter format
            ->when(
                in_array($format, $allowedFormats, true),
                function ($query) use ($format) {
                    $query->whereRaw(
                        "LOWER(SUBSTRING_INDEX(file, '.', -1)) = ?",
                        [$format]
                    );
                }
            )

            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('technician.reference-files.index', compact(
            'files',
            'search',
            'format'
        ));
    }

    public function download(ReferenceFile $referenceFile)
    {
        // File yang belum disetujui tidak boleh didownload Teknisi.
        if ($referenceFile->status !== 'approved') {
            abort(403, 'File ini belum disetujui oleh Super Admin.');
        }

        if (
            !$referenceFile->file ||
            !Storage::disk('public')->exists($referenceFile->file)
        ) {
            abort(404, 'File tidak ditemukan.');
        }

        return Storage::disk('public')->download(
            $referenceFile->file,
            $referenceFile->nama_file . '.' .
                pathinfo($referenceFile->file, PATHINFO_EXTENSION)
        );
    }
}
