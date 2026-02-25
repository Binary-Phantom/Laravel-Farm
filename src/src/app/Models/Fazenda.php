<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fazenda extends Model
{
    protected $fillable = [
        'nome',
        'tamanho_hectares',
        'responsavel',
    ];

    public function veterinarios(): BelongsToMany
    {
        return $this->belongsToMany(Veterinario::class);
    }

    public function gados(): HasMany
    {
        return $this->hasMany(Gado::class);
    }
}