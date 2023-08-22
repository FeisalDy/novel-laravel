<?php

namespace App\Models;

use App\Traits\ModelHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Novel extends Model
{
    use HasFactory, HasApiTokens, Notifiable, ModelHelpers;

    protected $table = 'novels';
    protected $fillable = [
        'title',
        'description',
        'author',
        'cover',
        'genres',
    ];

    public function id(): string
    {
        return (string) $this->id;
    }
    public function title(): string
    {
        return (string) $this->title;
    }
    public function description(): string
    {
        return (string) $this->description;
    }
    public function author(): string
    {
        return (string) $this->author;
    }
    public function cover(): string
    {
        return (string) $this->cover;
    }

    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class);
    }
    public function novel_genres()
    {
        return $this->hasMany(NovelGenre::class);
    }
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}
