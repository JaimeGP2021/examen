<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    /** @use HasFactory<\Database\Factories\CuentaFactory> */
    use HasFactory;

    protected $fillable =[
        'numero',
    ];

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

    public function movimientos() {
        return $this->hasMany(Movimiento::class);
    }
}
