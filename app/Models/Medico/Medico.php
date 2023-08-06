<?php

namespace App\Models\Medico;

use App\Models\Cidade\Cidade;
use App\Models\Paciente\Paciente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medico extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'medico';

    protected $fillable = [
        'nome',
        'especialidade',
        'cidade_id',
    ];

    public $timestamps = true;

    /**
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo;
     */
    public function cidade(): BelongsTo
    {
        return $this->belongsTo(Cidade::class, 'cidade_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany;
     */
    public function pacientes(): BelongsToMany
    {
        return $this->belongsToMany(Paciente::class, 'medico_paciente', 'medico_id', 'paciente_id')->withTimestamps();
    }
}
