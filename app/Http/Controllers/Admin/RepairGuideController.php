<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RepairGuide;
use App\Models\RepairGuideChecklist;
use App\Models\RepairGuidePhoto;
use App\Models\RepairGuideVideo;
use App\Models\RepairGuideFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RepairGuideController extends Controller
{
    public function index()
    {
        $guides = RepairGuide::with([
            'checklists.photos',
            'checklists.videos',
            'files',
        ])
            ->latest()
            ->paginate(10);

        return view('admin.repair-guides.index', compact('guides'));
    }


    public function create()
    {
        return view('admin.repair-guides.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_dealer' => ['required', 'string', 'max:255'],
            'judul_dtr' => ['required', 'string', 'max:255'],

            'no_polisi' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
            'kode_model' => ['required', 'string', 'max:255'],
            'tahun_pembuatan' => ['required', 'integer', 'min:1900', 'max:2100'],
            'no_rangka' => ['required', 'string', 'max:255'],
            'no_mesin' => ['required', 'string', 'max:255'],
            'tgl_penyerahan' => ['required', 'date'],
            'tgl_perbaikan' => ['required', 'date'],
            'jarak_tempuh' => ['required', 'integer', 'min:0'],

            'catatan_keseluruhan' => ['nullable', 'string'],


            'checklists' => ['required', 'array', 'min:1'],
            'checklists.*.nama_checklist' => ['required', 'string', 'max:255'],
            'checklists.*.is_checked' => ['nullable', 'boolean'],

            'checklists.*.photos' => ['nullable', 'array'],
            'checklists.*.photos.*.foto' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120'
            ],
            'checklists.*.photos.*.caption' => [
                'nullable',
                'string',
                'max:1000'
            ],

            'checklists.*.videos' => ['nullable', 'array'],
            'checklists.*.videos.*.video' => [
                'nullable',
                'file',
                'mimes:mp4,mov,avi,webm',
                'max:102400'
            ],
            'checklists.*.videos.*.caption' => [
                'nullable',
                'string',
                'max:1000'
            ],

            'files' => ['nullable', 'array'],
            'files.*.nama_file' => ['nullable', 'string', 'max:255'],
            'files.*.file' => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx,xls,xlsx,zip',
                'max:20480'
            ],
            'files.*.deskripsi' => [
                'nullable',
                'string',
                'max:2000'
            ],
        ]);


        DB::transaction(function () use ($request, $validated) {

            $repairGuide = RepairGuide::create([
                'nama_dealer' => $validated['nama_dealer'],
                'judul_dtr' => $validated['judul_dtr'],

                'no_polisi' => $validated['no_polisi'],
                'model' => $validated['model'],
                'kode_model' => $validated['kode_model'],
                'tahun_pembuatan' => $validated['tahun_pembuatan'],
                'no_rangka' => $validated['no_rangka'],
                'no_mesin' => $validated['no_mesin'],

                'tgl_penyerahan' => $validated['tgl_penyerahan'],
                'tgl_perbaikan' => $validated['tgl_perbaikan'],
                'jarak_tempuh' => $validated['jarak_tempuh'],

                'catatan_keseluruhan' =>
                $validated['catatan_keseluruhan'] ?? null,


                'status' => 'pending',
            ]);


            foreach ($validated['checklists'] as $checklistIndex => $checklistData) {

                $checklist = $repairGuide->checklists()->create([
                    'nama_checklist' => $checklistData['nama_checklist'],
                    'is_checked' => !empty($checklistData['is_checked']),
                    'urutan' => $checklistIndex + 1,
                ]);


                $photos = $checklistData['photos'] ?? [];

                foreach ($photos as $photoIndex => $photoData) {

                    $field =
                        "checklists.{$checklistIndex}.photos.{$photoIndex}.foto";

                    if (!$request->hasFile($field)) {
                        continue;
                    }

                    $photo = $request->file($field);

                    $photoPath = $photo->store(
                        'repair-guides/photos',
                        'public'
                    );

                    RepairGuidePhoto::create([
                        'repair_guide_checklist_id' => $checklist->id,
                        'foto' => $photoPath,
                        'caption' => $photoData['caption'] ?? null,
                        'urutan' => $photoIndex + 1,
                    ]);
                }


                $videos = $checklistData['videos'] ?? [];

                foreach ($videos as $videoIndex => $videoData) {

                    $field =
                        "checklists.{$checklistIndex}.videos.{$videoIndex}.video";

                    if (!$request->hasFile($field)) {
                        continue;
                    }

                    $video = $request->file($field);

                    $videoPath = $video->store(
                        'repair-guides/videos',
                        'public'
                    );

                    RepairGuideVideo::create([
                        'repair_guide_checklist_id' => $checklist->id,
                        'video' => $videoPath,
                        'caption' => $videoData['caption'] ?? null,
                        'urutan' => $videoIndex + 1,
                    ]);
                }
            }


            $files = $validated['files'] ?? [];

            foreach ($files as $fileIndex => $fileData) {

                $field = "files.{$fileIndex}.file";

                if (!$request->hasFile($field)) {
                    continue;
                }

                $file = $request->file($field);

                $filePath = $file->store(
                    'repair-guides/files',
                    'public'
                );

                RepairGuideFile::create([
                    'repair_guide_id' => $repairGuide->id,
                    'nama_file' =>
                    $fileData['nama_file']
                        ?? $file->getClientOriginalName(),
                    'file' => $filePath,
                    'deskripsi' =>
                    $fileData['deskripsi'] ?? null,
                    'urutan' => $fileIndex + 1,
                ]);
            }
        });


        return redirect()
            ->route('admin.repair-guides.index')
            ->with(
                'success',
                'DTR berhasil dikirim dan menunggu verifikasi Super Admin.'
            );
    }


    public function show(RepairGuide $repairGuide)
    {
        $repairGuide->load([
            'checklists.photos',
            'checklists.videos',
            'files',
            'verifiedBy',
        ]);

        return view(
            'admin.repair-guides.show',
            compact('repairGuide')
        );
    }


    public function edit(RepairGuide $repairGuide)
    {
        $repairGuide->load([
            'checklists.photos',
            'checklists.videos',
            'files',
        ]);

        return view(
            'admin.repair-guides.edit',
            compact('repairGuide')
        );
    }


    public function update(
        Request $request,
        RepairGuide $repairGuide
    ) {
        $validated = $request->validate([
            'nama_dealer' => ['required', 'string', 'max:255'],
            'judul_dtr' => ['required', 'string', 'max:255'],

            'no_polisi' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
            'kode_model' => ['required', 'string', 'max:255'],
            'tahun_pembuatan' => [
                'required',
                'integer',
                'min:1900',
                'max:2100'
            ],
            'no_rangka' => ['required', 'string', 'max:255'],
            'no_mesin' => ['required', 'string', 'max:255'],

            'tgl_penyerahan' => ['required', 'date'],
            'tgl_perbaikan' => ['required', 'date'],
            'jarak_tempuh' => ['required', 'integer', 'min:0'],

            'catatan_keseluruhan' => ['nullable', 'string'],

            'checklists' => ['required', 'array', 'min:1'],

            'checklists.*.id' => ['nullable', 'integer'],

            'checklists.*.nama_checklist' => [
                'required',
                'string',
                'max:255'
            ],

            'checklists.*.is_checked' => [
                'nullable',
                'boolean'
            ],

            'checklists.*.photos' => [
                'nullable',
                'array'
            ],

            'checklists.*.photos.*.foto' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120'
            ],

            'checklists.*.photos.*.caption' => [
                'nullable',
                'string',
                'max:1000'
            ],

            'checklists.*.videos' => [
                'nullable',
                'array'
            ],

            'checklists.*.videos.*.video' => [
                'nullable',
                'file',
                'mimes:mp4,mov,avi,webm',
                'max:102400'
            ],

            'checklists.*.videos.*.caption' => [
                'nullable',
                'string',
                'max:1000'
            ],

            'files' => [
                'nullable',
                'array'
            ],

            'files.*.id' => [
                'nullable',
                'integer'
            ],

            'files.*.nama_file' => [
                'nullable',
                'string',
                'max:255'
            ],

            'files.*.file' => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx,xls,xlsx,zip',
                'max:20480'
            ],

            'files.*.deskripsi' => [
                'nullable',
                'string',
                'max:2000'
            ],

            'delete_photos' => [
                'nullable',
                'array'
            ],

            'delete_photos.*' => [
                'integer'
            ],

            'delete_videos' => [
                'nullable',
                'array'
            ],

            'delete_videos.*' => [
                'integer'
            ],

            'delete_files' => [
                'nullable',
                'array'
            ],

            'delete_files.*' => [
                'integer'
            ],
        ]);


        DB::transaction(function () use (
            $request,
            $validated,
            $repairGuide
        ) {

            /*
             * ==========================================================
             * UPDATE DATA UTAMA
             * ==========================================================
             */

            $repairGuide->update([
                'nama_dealer' => $validated['nama_dealer'],
                'judul_dtr' => $validated['judul_dtr'],

                'no_polisi' => $validated['no_polisi'],
                'model' => $validated['model'],
                'kode_model' => $validated['kode_model'],
                'tahun_pembuatan' => $validated['tahun_pembuatan'],

                'no_rangka' => $validated['no_rangka'],
                'no_mesin' => $validated['no_mesin'],

                'tgl_penyerahan' => $validated['tgl_penyerahan'],
                'tgl_perbaikan' => $validated['tgl_perbaikan'],

                'jarak_tempuh' => $validated['jarak_tempuh'],

                'catatan_keseluruhan' =>
                $validated['catatan_keseluruhan'] ?? null,

                'status' => 'pending',
                'verified_by' => null,
                'verified_at' => null,
                'rejection_reason' => null,
            ]);
            /*
 ]);
            }

            /*
             * ==========================================================
             * HAPUS FOTO YANG DIPILIH
             * ==========================================================
             */

            foreach (
                $validated['delete_photos'] ?? []
                as $photoId
            ) {

                $photo = RepairGuidePhoto::whereHas(
                    'checklist',
                    function ($query) use ($repairGuide) {
                        $query->where(
                            'repair_guide_id',
                            $repairGuide->id
                        );
                    }
                )->find($photoId);

                if (!$photo) {
                    continue;
                }

                if (
                    $photo->foto &&
                    Storage::disk('public')->exists($photo->foto)
                ) {
                    Storage::disk('public')->delete(
                        $photo->foto
                    );
                }

                $photo->delete();
            }


            /*
             * ==========================================================
             * HAPUS VIDEO YANG DIPILIH
             * ==========================================================
             */

            foreach (
                $validated['delete_videos'] ?? []
                as $videoId
            ) {

                $video = RepairGuideVideo::whereHas(
                    'checklist',
                    function ($query) use ($repairGuide) {
                        $query->where(
                            'repair_guide_id',
                            $repairGuide->id
                        );
                    }
                )->find($videoId);

                if (!$video) {
                    continue;
                }

                if (
                    $video->video &&
                    Storage::disk('public')->exists($video->video)
                ) {
                    Storage::disk('public')->delete(
                        $video->video
                    );
                }

                $video->delete();
            }


            /*
             * ==========================================================
             * HAPUS FILE PENDUKUNG
             * ==========================================================
             */

            foreach (
                $validated['delete_files'] ?? []
                as $fileId
            ) {

                $file = $repairGuide->files()
                    ->find($fileId);

                if (!$file) {
                    continue;
                }

                if (
                    $file->file &&
                    Storage::disk('public')->exists($file->file)
                ) {
                    Storage::disk('public')->delete(
                        $file->file
                    );
                }

                $file->delete();
            }


            /*
             * ==========================================================
             * UPDATE / TAMBAH CHECKLIST
             * ==========================================================
             */

            foreach (
                $validated['checklists']
                as $checklistIndex => $checklistData
            ) {

                $checklist = null;


                /*
                 * Kalau punya ID → UPDATE
                 */
                if (!empty($checklistData['id'])) {

                    $checklist = $repairGuide->checklists()
                        ->find($checklistData['id']);
                }


                /*
                 * Kalau checklist baru → CREATE
                 */
                if (!$checklist) {

                    $checklist =
                        $repairGuide->checklists()->create([
                            'nama_checklist' =>
                            $checklistData['nama_checklist'],

                            'is_checked' =>
                            !empty($checklistData['is_checked']),

                            'urutan' =>
                            $checklistIndex + 1,
                        ]);
                } else {

                    $checklist->update([
                        'nama_checklist' =>
                        $checklistData['nama_checklist'],

                        'is_checked' =>
                        !empty($checklistData['is_checked']),

                        'urutan' =>
                        $checklistIndex + 1,
                    ]);
                }


                /*
                 * ======================================================
                 * FOTO BARU
                 * ======================================================
                 */

                $photos =
                    $checklistData['photos'] ?? [];

                foreach (
                    $photos as $photoIndex => $photoData
                ) {

                    $field =
                        "checklists.{$checklistIndex}.photos.{$photoIndex}.foto";

                    if (!$request->hasFile($field)) {
                        continue;
                    }

                    $photo =
                        $request->file($field);

                    $photoPath =
                        $photo->store(
                            'repair-guides/photos',
                            'public'
                        );

                    RepairGuidePhoto::create([
                        'repair_guide_checklist_id' =>
                        $checklist->id,

                        'foto' =>
                        $photoPath,

                        'caption' =>
                        $photoData['caption'] ?? null,

                        'urutan' =>
                        $checklist->photos()->count() + 1,
                    ]);
                }


                /*
                 * ======================================================
                 * VIDEO BARU
                 * ======================================================
                 */

                $videos =
                    $checklistData['videos'] ?? [];

                foreach (
                    $videos as $videoIndex => $videoData
                ) {

                    $field =
                        "checklists.{$checklistIndex}.videos.{$videoIndex}.video";

                    if (!$request->hasFile($field)) {
                        continue;
                    }

                    $video =
                        $request->file($field);

                    $videoPath =
                        $video->store(
                            'repair-guides/videos',
                            'public'
                        );

                    RepairGuideVideo::create([
                        'repair_guide_checklist_id' =>
                        $checklist->id,

                        'video' =>
                        $videoPath,

                        'caption' =>
                        $videoData['caption'] ?? null,

                        'urutan' =>
                        $checklist->videos()->count() + 1,
                    ]);
                }
            }


            /*
             * ==========================================================
             * FILE BARU
             * ==========================================================
             */

            $files =
                $validated['files'] ?? [];

            foreach (
                $files as $fileIndex => $fileData
            ) {

                $field =
                    "files.{$fileIndex}.file";

                if (!$request->hasFile($field)) {
                    continue;
                }

                $file =
                    $request->file($field);

                $filePath =
                    $file->store(
                        'repair-guides/files',
                        'public'
                    );

                RepairGuideFile::create([
                    'repair_guide_id' =>
                    $repairGuide->id,

                    'nama_file' =>
                    $fileData['nama_file']
                        ?? $file->getClientOriginalName(),

                    'file' =>
                    $filePath,

                    'deskripsi' =>
                    $fileData['deskripsi'] ?? null,

                    'urutan' =>
                    $repairGuide->files()->count() + 1,
                ]);
            }
        });


        return redirect()
            ->route(
                'admin.repair-guides.show',
                $repairGuide
            )
            ->with(
                'success',
                'DTR berhasil diperbarui dan kembali menunggu verifikasi Super Admin.'
            );
    }


    public function destroy(RepairGuide $repairGuide)
    {
        $repairGuide->load([
            'checklists.photos',
            'checklists.videos',
            'files',
        ]);

        DB::transaction(function () use ($repairGuide) {

            foreach ($repairGuide->checklists as $checklist) {

                foreach ($checklist->photos as $photo) {

                    if (
                        $photo->foto &&
                        Storage::disk('public')
                        ->exists($photo->foto)
                    ) {
                        Storage::disk('public')
                            ->delete($photo->foto);
                    }
                }


                foreach ($checklist->videos as $video) {

                    if (
                        $video->video &&
                        Storage::disk('public')
                        ->exists($video->video)
                    ) {
                        Storage::disk('public')
                            ->delete($video->video);
                    }
                }
            }


            foreach ($repairGuide->files as $file) {

                if (
                    $file->file &&
                    Storage::disk('public')
                    ->exists($file->file)
                ) {
                    Storage::disk('public')
                        ->delete($file->file);
                }
            }


            $repairGuide->delete();
        });


        return redirect()
            ->route('admin.repair-guides.index')
            ->with(
                'success',
                'DTR berhasil dihapus.'
            );
    }
}
