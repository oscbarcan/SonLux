<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'pedidos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    // Relación con el modelo Factura
    public function factura()
    {
        return $this->hasOne(Bill::class, 'id_pedido', 'id');
    }

    // Relación con el modelo Detalle_pedido
    public function detallePedidos()
    {
        return $this->hasMany(Order_Detail::class, 'id_pedido', 'id');
    }
}
