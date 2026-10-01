<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RepairGuide extends Model
{
    protected $fillable = [
        'nama_dealer',
        'judul_dtr',
        'no_polisi',
        'model',
        'kode_model',
        'tahun_pembuatan',
        'no_rangka',
        'no_mesin',
        'tgl_penyerahan',
        'tgl_perbaikan',
        'jarak_tempuh',
        'catatan_keseluruhan',
        'pdf_panduan',
        'status',
        'verified_by',
        'verified_at',
        'rejection_reason',
    ];

    protected $casts = [
        'tahun_pembuatan' => 'integer',
        'tgl_penyerahan' => 'date',
        'tgl_perbaikan' => 'date',
        'jarak_tempuh' => 'integer',
        'verified_at' => 'datetime',
    ];

    public function checklists(): HasMany
    {
        return $this->hasMany(RepairGuideChecklist::class)
            ->orderBy('urutan');
    }

    public function files(): HasMany
    {
        return $this->hasMany(RepairGuideFile::class)
            ->orderBy('urutan');
    }

    public function verifiedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
