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
        'banner', 'email', 'telefone', 'empresa', 'area_atuacao_id'
    ];

    protected static function boot()
    {
        self::creating(function ($model) {
            $model->usuario_id = auth()->check() ? auth()->user()->id : Usuario::first()->id;
        });

        parent::boot();
    }

    /*
     * Relacionamentos
     */

    public function area()
    {
        return $this->belongsTo(AreaAtuacao::class, 'area_atuacao_id');
    }

    public function candidatos()
    {
        return $this->belongsToMany(
            Usuario::class,
            'candidaturas',
            'vaga_id',
            'usuario_id');
    }
}
