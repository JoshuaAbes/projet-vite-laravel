<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Story extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'cover_image',
        'user_id',
        'is_published'
    ];

    /**
     * Récupère l'utilisateur qui a créé cette histoire.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Récupère les chapitres associés à cette histoire.
     */
    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class);
    }

    /**
     * Récupère les progressions des utilisateurs sur cette histoire.
     */
    public function progressions(): HasMany
    {
        return $this->hasMany(Progression::class);
    }

    /**
     * Récupère le chapitre de départ de l'histoire.
     */
    public function startingChapter()
    {
        return $this->chapters()->where('is_starting_point', true)->first();
    }
}