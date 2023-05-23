<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresasUsuarios extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'empresa_id'];

    public function empresa()
    {
        return $this->belongsToMany(Empresas::class);
    }
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
