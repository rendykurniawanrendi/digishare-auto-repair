<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RepairGuideVideo extends Model
{
    protected $fillable = [
        'repair_guide_checklist_id',
        'video',
        'caption',
        'urutan',
    ];

    protected $casts = [
        'urutan' => 'integer',
    ];

    public function checklist(): BelongsTo
    {
        return $this->belongsTo(
            RepairGuideChecklist::class,
            'repair_guide_checklist_id'
        );
    }
}
