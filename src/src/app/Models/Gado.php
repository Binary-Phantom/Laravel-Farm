<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Gado extends Model
{
    protected $fillable = [
        'codigo',
        'leite_semana',
        'racao_semana',
        'peso',
        'nascimento',
        'fazenda_id',
        'abatido_em',
    ];

    protected $casts = [
        'nascimento' => 'date',
        'abatido_em' => 'datetime',
    ];

    public function fazenda(): BelongsTo
    {
        return $this->belongsTo(Fazenda::class);
    }

    public function estaVivo(): bool
    {
        return is_null($this->abatido_em);
    }
}