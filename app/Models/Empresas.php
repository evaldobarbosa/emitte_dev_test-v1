<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    use HasFactory;

    protected $fillable = ['razao_social', 'cnpj'];

    public function empresa()
    {
        return $this->belongsToMany(EmpresasUsuarios::class);
    }
}
