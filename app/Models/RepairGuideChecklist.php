<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RepairGuideChecklist extends Model
{
    protected $fillable = [
        'repair_guide_id',
        'nama_checklist',
        'is_checked',
        'urutan',
    ];
    protected $casts = [
        'is_checked' => 'boolean',
        'urutan' => 'integer',
    ];

    public function repairGuide(): BelongsTo
    {
        return $this->belongsTo(RepairGuide::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(RepairGuidePhoto::class)
            ->orderBy('urutan');
    }

    public function videos(): HasMany
    {
        return $this->hasMany(RepairGuideVideo::class)
            ->orderBy('urutan');
    }
}
