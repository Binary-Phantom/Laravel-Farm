<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Gado extends Model
{
    //protected $primaryKey = 'codigo';
    //public $incrementing = false;
   // protected $keyType = 'int';

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

    // dia do nascimento do animal
    public function idade()
    {
        return $this->nascimento->diffInYears(now());
    }

    //idade exata do animal para fins de consulta
    public function idadeDetalhada()
{
    $data = $this->nascimento;
    $agora = now();

    $anos = (int) $data->diffInYears($agora);

    $meses = (int) $data->copy()
        ->addYears($anos)
        ->diffInMonths($agora);

    $dias = (int) $data->copy()
        ->addYears($anos)
        ->addMonths($meses)
        ->diffInDays($agora);

    if ($anos > 0) {

        if ($meses > 0) {
            return "{$anos} anos e {$meses} meses";
        }

        return "{$anos} anos";
    }

    if ($meses > 0) {

        if ($dias > 0) {
            return "{$meses} meses e {$dias} dias";
        }

        return "{$meses} meses";
    }

    return "{$dias} dias";
    }

    //consumo de ração
    public function racaoPorDia()
    {
        return $this->racao_semana / 7;
    }
    //peso em arrobas
    public function pesoEmArrobas()
    {
        return $this->peso / 15;
    }
    //regra de abate
    public function podeSerAbatido(): bool
    {
        // mais de 5 anos
        if ($this->idade() > 5) {
            return true;
        }

        // menos de 40 litros de leite
        if ($this->leite_semana < 40) {
            return true;
        }

        // menos de 70 litros e mais de 50kg/dia de ração
        if ($this->leite_semana < 70 && $this->racaoPorDia() > 50) {
            return true;
        }

        // peso maior que 18 arrobas (270kg)
        if ($this->peso > 270) {
            return true;
        }

        return false;
    }
    //verificar condições de abaate
    public function abater()
    {
        if (!$this->podeSerAbatido()) {
        throw new \Exception('Este animal não atende às condições de abate.');
        }

        $this->abatido_em = now();
        $this->save();
    }

}