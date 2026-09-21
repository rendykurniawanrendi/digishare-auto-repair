<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\ReferenceFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReferenceFileVerificationController extends Controller
{
    /**
     * Daftar file referensi yang diajukan Admin.
     */
    public function index(Request $request)
    {
        $search = trim($request->input('search', ''));
        $status = $request->input('status', '');

        $files = ReferenceFile::query()
            ->with(['uploadedBy', 'verifiedBy'])

            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama_file', 'like', '%' . $search . '%')
                        ->orWhere('deskripsi', 'like', '%' . $search . '%');
                });
            })

            ->when(
                in_array($status, ['pending', 'approved', 'rejected'], true),
                function ($query) use ($status) {
                    $query->where('status', $status);
                }
            )

            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'super_admin.reference-files.index',
            compact('files', 'search', 'status')
        );
    }

    /**
     * Detail file referensi.
     */
    public function show(ReferenceFile $referenceFile)
    {
        $referenceFile->load([
            'uploadedBy',
            'verifiedBy',
        ]);

        return view(
            'super_admin.reference-files.show',
            compact('referenceFile')
        );
    }

    /**
     * Download file untuk diperiksa Super Admin.
     */
    public function download(ReferenceFile $referenceFile)
    {
        if (
            !$referenceFile->file ||
            !Storage::disk('public')->exists($referenceFile->file)
        ) {
            abort(404, 'File referensi tidak ditemukan.');
        }

        return Storage::disk('public')->download(
            $referenceFile->file,
            $referenceFile->nama_file . '.' .
                pathinfo($referenceFile->file, PATHINFO_EXTENSION)
        );
    }

    /**
     * Menyetujui file referensi.
     */
    public function approve(ReferenceFile $referenceFile)
    {
        // Hanya file pending yang boleh disetujui.
        if ($referenceFile->status !== 'pending') {
            return redirect()
                ->route(
                    'super_admin.reference-files.show',
                    $referenceFile
                )
                ->with(
                    'error',
                    'File ini sudah diverifikasi sebelumnya.'
                );
        }

        $referenceFile->update([
            'status' => 'approved',
            'verified_by' => Auth::id(),
            'verified_at' => now(),
            'rejection_reason' => null,
        ]);

        return redirect()
            ->route(
                'super_admin.reference-files.show',
                $referenceFile
            )
            ->with(
                'success',
                'File referensi berhasil disetujui. Sekarang Teknisi dapat melihat dan mendownload file tersebut.'
            );
    }

    /**
     * Menolak file referensi.
     */
    public function reject(
        Request $request,
        ReferenceFile $referenceFile
    ) {
        $validated = $request->validate([
            'rejection_reason' => [
                'required',
                'string',
                'max:2000',
            ],
        ], [
            'rejection_reason.required' =>
            'Alasan penolakan wajib diisi.',
        ]);

        // Hanya file pending yang boleh ditolak.
        if ($referenceFile->status !== 'pending') {
            return redirect()
                ->route(
                    'super_admin.reference-files.show',
                    $referenceFile
                )
                ->with(
                    'error',
                    'File ini sudah diverifikasi sebelumnya.'
                );
        }

        $referenceFile->update([
            'status' => 'rejected',
            'verified_by' => Auth::id(),
            'verified_at' => now(),
            'rejection_reason' => $validated['rejection_reason'],
        ]);

        return redirect()
            ->route(
                'super_admin.reference-files.show',
                $referenceFile
            )
            ->with(
                'success',
                'File referensi berhasil ditolak.'
            );
    }
}
