<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vaga extends Model
{
    use SoftDeletes;

    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'inicio', 'fim'];

    protected $table = 'vagas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'descricao', 'inicio', 'fim', 'remuneracao', 'carga_horaria',
        'banner', 'email', 'telefone', 'empresa_id', 'area_atuacao_id'
    ];

    /*
     * Relacionamentos
     */

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public function area()
    {
        return $this->belongsTo(AreaAtuacao::class, 'area_atuacao_id');
    }

    public function usuarios()
    {
        return $this->belongsToMany(
            Usuario::class,
            'candidaturas',
            'vaga_id',
            'usuario_id');
    }
}