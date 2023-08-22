<?php

namespace App\Traits;

use App\Models\Novel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasNovel
{
    public function novel(): Novel
    {
        return $this->novelRelation;
    }

    public function novelRelation(): BelongsTo
    {
        return $this->belongsTo(Novel::class, 'novel_id');
    }

    public function isNovel(Novel $novel): bool
    {
        return $this->novelRelation()->matches($novel);
    }

    public function novelName(Novel $novel)
    {
        return $this->novelRelation()->associate($novel);
    }
}
