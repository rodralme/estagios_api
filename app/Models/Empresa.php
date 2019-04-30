<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use SoftDeletes;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $table = 'empresas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'razao_social', 'cnpj', 'cnpj_sem_mascara', 'telefone1', 'telefone2', 'endereco_id'
    ];

    protected static function boot()
    {
        parent::boot();

        self::saving(function($model) {
            $model->cnpj_sem_mascara = preg_replace("/[^0-9]/", "", $model->cnpj);
        });
    }

    /*
     * Relacionamentos
     */

    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'endereco_id');
    }
}