<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RepairGuideFile extends Model
{
    protected $fillable = [
        'repair_guide_id',
        'nama_file',
        'file',
        'deskripsi',
        'urutan',
    ];

    protected $casts = [
        'urutan' => 'integer',
    ];

    public function repairGuide(): BelongsTo
    {
        return $this->belongsTo(
            RepairGuide::class,
            'repair_guide_id'
        );
    }
}
