<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perfil extends Model
{
    use SoftDeletes;

    protected $table = 'perfis';

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $casts = [
        'admin' => 'boolean'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'nivel'
    ];

    /*
     * Relacionamentos
     */

    public function permissoes()
    {
        return $this->belongsToMany(
            Permissao::class, 'perfis_permissoes', 'perfil_id', 'permissao_id');
    }

    /*
     * Helpers
     */

    public function syncPermissoes($permissoesEnviadas)
    {
        if (!auth()->user()->ehAdmin()) {
            if (auth()->user()->perfil && auth()->user()->perfil->permissoes()->count()) {
                $perms = [];
                $permissoes = auth()->user()->perfil->permissoes()->get();
                foreach ($permissoes as $permissao) {
                    if (in_array($permissao->id, $permissoesEnviadas)) {
                        $perms[] = $permissao->id;
                    }
                }
                $this->permissoes()->sync($perms);
            } else {
                $this->permissoes()->sync([]);
            }
        } else {
            $this->permissoes()->sync($permissoesEnviadas);
        }
    }
}