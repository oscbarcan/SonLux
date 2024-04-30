<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;
    protected $table = 'detalle_pedidos';
    public $timestamps = false;

    // Relación con el modelo Pedido
    public function pedido()
    {
        return $this->belongsTo(Order::class, 'id_pedido', 'id');
    }

    // Relación con el modelo Producto
    public function producto()
    {
        return $this->belongsTo(Product::class, 'id_producto', 'id');
    }
}
