<?php

namespace App\Models\Paciente;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'paciente';

    protected $fillable = [
        'nome',
        'cpf',
        'celular',
    ];

    public $timestamps = true;
}
