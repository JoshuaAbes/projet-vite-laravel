<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chapter extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'story_id',
        'is_ending',
        'is_starting_point'
    ];

    /**
     * Récupère l'histoire à laquelle ce chapitre appartient.
     */
    public function story(): BelongsTo
    {
        return $this->belongsTo(Story::class);
    }

    /**
     * Récupère les choix disponibles à partir de ce chapitre.
     */
    public function choices(): HasMany
    {
        return $this->hasMany(Choice::class);
    }

    /**
     * Récupère les choix qui mènent à ce chapitre.
     */
    public function incomingChoices(): HasMany
    {
        return $this->hasMany(Choice::class, 'next_chapter_id');
    }
}
