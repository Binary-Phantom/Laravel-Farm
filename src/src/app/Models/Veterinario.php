<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Veterinario extends Model
{
    protected $fillable = [
        'nome',
        'crmv',
    ];

    public function fazendas(): BelongsToMany
    {
        return $this->belongsToMany(Fazenda::class);
    }
}