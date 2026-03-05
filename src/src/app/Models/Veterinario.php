<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Veterinario extends Model
{
    protected $primaryKey = 'crmv'; // PK é crmv
    public $incrementing = false;   // não é auto-increment
    protected $keyType = 'string';  // tipo string
    protected $fillable = ['crmv', 'nome']; 

    public function getRouteKeyName()
    {
        return 'crmv'; // para rotas
    }

    public function fazendas()
    {
        return $this->belongsToMany(
        Fazenda::class,
        'fazenda_veterinario',
        'veterinario_crmv',
        'fazenda_id',
        'crmv',
        'id'
     );
    }
}