<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidato extends Model
{
    use SoftDeletes;

    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'nascimento'];

    protected $table = 'candidatos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'nascimento', 'telefone1', 'telefone2', 'sobre', 'endereco_id'
    ];

    /*
     * Relacionamentos
     */

    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'endereco_id');
    }

    public function areas()
    {
        return $this->belongsToMany(
            AreaAtuacao::class,
            'candidatos_areas_atuacao',
            'candidato_id',
            'area_atuacao_id');
    }
}