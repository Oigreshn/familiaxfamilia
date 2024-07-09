<?php

namespace App\Models;

use App\Models\Candidato;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacante extends Model
{
    use HasFactory;

    protected $casts = ['ultimo_dia' => 'datetime'];

    protected $fillable = [
        'titulo',
        'categoria_id',
        'entidad',
        'ultimo_dia',
        'descripcion',
        'imagen',
        'user_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function candidatos()
    {
        return $this->hasMany(Candidato::class);
    }
}
