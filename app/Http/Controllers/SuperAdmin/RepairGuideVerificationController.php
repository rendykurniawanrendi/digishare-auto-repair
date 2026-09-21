<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\RepairGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepairGuideVerificationController extends Controller
{
    /**
     * Daftar DTR yang masuk untuk diverifikasi.
     */
    public function index(Request $request)
    {
        $search = trim($request->input('search', ''));
        $status = $request->input('status', '');

        $guides = RepairGuide::query()
            ->with('verifiedBy')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('judul_dtr', 'like', '%' . $search . '%')
                        ->orWhere('nama_dealer', 'like', '%' . $search . '%')
                        ->orWhere('no_polisi', 'like', '%' . $search . '%')
                        ->orWhere('model', 'like', '%' . $search . '%');
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
            'super_admin.repair-guides.index',
            compact('guides', 'search', 'status')
        );
    }

    /**
     * Menampilkan detail DTR untuk diperiksa.
     */
    public function show(RepairGuide $repairGuide)
    {
        $repairGuide->load([
            'checklists.photos',
            'checklists.videos',
            'files',
            'verifiedBy',
        ]);

        return view(
            'super_admin.repair-guides.show',
            compact('repairGuide')
        );
    }

    /**
     * Menyetujui DTR.
     */
    public function approve(RepairGuide $repairGuide)
    {
        $repairGuide->update([
            'status' => 'approved',
            'verified_by' => Auth::id(),
            'verified_at' => now(),
            'rejection_reason' => null,
        ]);

        return redirect()
            ->route(
                'super_admin.repair-guides.show',
                $repairGuide
            )
            ->with(
                'success',
                'DTR berhasil disetujui dan sekarang dapat dilihat oleh Teknisi.'
            );
    }

    /**
     * Menolak DTR.
     */
    public function reject(
        Request $request,
        RepairGuide $repairGuide
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

        $repairGuide->update([
            'status' => 'rejected',
            'verified_by' => Auth::id(),
            'verified_at' => now(),
            'rejection_reason' => $validated['rejection_reason'],
        ]);

        return redirect()
            ->route(
                'super_admin.repair-guides.show',
                $repairGuide
            )
            ->with(
                'success',
                'DTR berhasil ditolak.'
            );
    }
}
