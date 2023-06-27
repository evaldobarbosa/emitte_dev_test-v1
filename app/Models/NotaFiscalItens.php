<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaFiscalItens extends Model
{
    use HasFactory;
    protected $fillable = ['produto', 'quantidade', 'valor', 'informacoes', 'notas_fiscais_id'];


    public function notaFiscal()
    {
        return $this->hasMany(NotasFiscaisEmpresas::class);
    }
}
