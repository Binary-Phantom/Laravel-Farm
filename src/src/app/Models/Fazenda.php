<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Gado;

class Fazenda extends Model
{
    protected $fillable = [
        'nome',
        'tamanho',
        'responsavel',
    ];

    public function veterinarios()
    {
        return $this->belongsToMany(
            Veterinario::class,
            'fazenda_veterinario',
            'fazenda_id',
            'veterinario_crmv',
            'id',
            'crmv'
        );
    }

    public function gados(): HasMany
    {
        return $this->hasMany(Gado::class);
    }
}