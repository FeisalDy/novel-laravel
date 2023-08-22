<?php

namespace App\Traits;

use App\Models\Chapter;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasChapter
{

    public function chapterRelation(): HasMany
    {
        return $this->hasMany(Chapter::class, 'novel_id');
    }

    public function isChapter(Chapter $chapter): bool
    {
        return $this->chapterRelation()->matches($chapter);
    }

    public function novelName(Chapter $chapter)
    {
        return $this->novelRelation()->associate($chapter);
    }
}
