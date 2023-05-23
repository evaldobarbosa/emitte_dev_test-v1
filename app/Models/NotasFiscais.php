<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotasFiscais extends Model
{
    use HasFactory;

    protected $fillable = ['numero', 'total', 'informacoes', 'empresa_id', 'processada_em'];

    protected $casts = [
        'processada_em' => 'datetime:Y-m-d',
    ];

    public function empresa()
    {
        return $this->hasMany(Empresas::class);
    }
}
