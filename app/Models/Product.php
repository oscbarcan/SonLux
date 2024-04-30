<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NunoMaduro\Collision\Provider;

class Product extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    // Relación con el modelo Proveedor
    public function proveedor()
    {
        return $this->belongsTo(Provider::class, 'id_proveedor', 'id');
    }

    // Relación con el modelo Detalle_pedido
    public function detallePedidos()
    {
        return $this->hasMany(Order_Detail::class, 'id_producto', 'id');
    }
}
