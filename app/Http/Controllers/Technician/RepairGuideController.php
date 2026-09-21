<?php

namespace App\Http\Controllers\Technician;

use App\Http\Controllers\Controller;
use App\Models\RepairGuide;
use App\Models\RepairGuideVideo;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RepairGuideController extends Controller
{
    /**
     * Daftar panduan perbaikan.
     * Teknisi hanya dapat melihat DTR yang sudah approved.
     */
    public function index(Request $request)
    {
        $search = trim($request->input('search', ''));

        $guides = RepairGuide::query()
            ->with([
                'checklists.photos',
                'checklists.videos',
                'files',
                'verifiedBy',
            ])
            ->where('status', 'approved')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('judul_dtr', 'like', '%' . $search . '%')
                        ->orWhere('nama_dealer', 'like', '%' . $search . '%')
                        ->orWhere('no_polisi', 'like', '%' . $search . '%')
                        ->orWhere('model', 'like', '%' . $search . '%')
                        ->orWhere('kode_model', 'like', '%' . $search . '%');
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'technician.repair-guides.index',
            compact('guides', 'search')
        );
    }


    /**
     * Detail panduan perbaikan.
     */
    public function show(RepairGuide $repairGuide)
    {
        // Teknisi hanya boleh membuka DTR yang sudah approved.
        abort_unless(
            $repairGuide->status === 'approved',
            404
        );

        $repairGuide->load([
            'checklists.photos',
            'checklists.videos',
            'files',
            'verifiedBy',
        ]);

        return view(
            'technician.repair-guides.show',
            compact('repairGuide')
        );
    }


    /**
     * Generate dan download PDF laporan DTR.
     */
    public function pdf(RepairGuide $repairGuide)
    {
        // PDF hanya dapat dibuat jika DTR sudah approved.
        abort_unless(
            $repairGuide->status === 'approved',
            404
        );

        $repairGuide->load([
            'checklists.photos',
            'checklists.videos',
            'files',
            'verifiedBy',
        ]);

        $pdf = Pdf::loadView(
            'technician.repair-guides.pdf',
            compact('repairGuide')
        );

        $pdf->setPaper('a4', 'portrait');

        $filename = 'Panduan-Perbaikan-DTR-' .
            $repairGuide->id .
            '.pdf';

        return $pdf->download($filename);
    }
    /**
     * Download video pemeriksaan.
     * Teknisi hanya dapat mendownload video dari DTR approved.
     */
    public function downloadVideo(
        RepairGuide $repairGuide,
        RepairGuideVideo $video
    ) {
        abort_unless(
            $repairGuide->status === 'approved',
            404
        );

        // Pastikan video memang milik checklist dari DTR tersebut.
        $videoBelongsToGuide = $repairGuide->checklists()
            ->whereHas('videos', function ($query) use ($video) {
                $query->where('id', $video->id);
            })
            ->exists();

        abort_unless(
            $videoBelongsToGuide,
            404
        );

        if (
            !$video->video ||
            !Storage::disk('public')->exists($video->video)
        ) {
            abort(404, 'Video tidak ditemukan.');
        }

        $extension = pathinfo(
            $video->video,
            PATHINFO_EXTENSION
        );

        $filename = 'Video-DTR-' .
            $repairGuide->id .
            '-' .
            ($video->id) .
            '.' .
            $extension;

        return Storage::disk('public')->download(
            $video->video,
            $filename
        );
    }
}
