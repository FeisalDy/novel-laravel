<?php

namespace App\Models;

use App\Traits\HasNovel;
use App\Traits\ModelHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Chapter extends Model
{
    use HasFactory, HasApiTokens, Notifiable, HasNovel, ModelHelpers;

    protected $fillable = [
        'novel_id',
        'title',
        'content',
    ];

    public function id(): string
    {
        return (string) $this->id;
    }
    public function title(): string
    {
        return (string) $this->title;
    }
    public function content(): string
    {
        return (string) $this->content;
    }

    public function novels()
    {
        return $this->belongsTo(Novel::class, 'novel_id');
    }
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}
