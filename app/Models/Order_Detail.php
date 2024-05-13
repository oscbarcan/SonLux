<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;
    protected $table = 'order_product';
    public $timestamps = false;

    // Relación con el modelo Pedido
    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order', 'id');
    }

    // Relación con el modelo Producto
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id');
    }
}
