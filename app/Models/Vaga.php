<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vaga extends Model
{
    use SoftDeletes;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $table = 'vagas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'descricao', 'remuneracao', 'carga_horaria', 'inicio', 'fim', 'empresa_id'
    ];

    /*
     * Relacionamentos
     */

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public function areas()
    {
        return $this->belongsToMany(
            AreaAtuacao::class,
            'vagas_areas_atuacao',
            'vaga_id',
            'area_atuacao_id');
    }
}