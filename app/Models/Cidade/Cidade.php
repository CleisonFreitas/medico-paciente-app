<?php

namespace App\Models\Cidade;

use App\Models\Medico\Medico;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cidade extends Model
{
    use HasFactory;

    protected $table = 'cidades';

    protected $fillable = [
        'id',
        'nome',
        'estado',
    ];

    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany;
     */
    public function medicos(): HasMany
    {
        return $this->hasMany(Medico::class, 'cidade_id');
    }
}
