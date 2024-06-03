<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = false;

    // Relación con el modelo Proveedor
    public function provider()
    {
        return $this->belongsTo(Provider::class, 'id_provider', 'id');
    }

    // Relación con el modelo Detalle_pedido
    public function order_product()
    {
        return $this->hasMany(Order_Product::class, 'id_product', 'id');
    }

    // Relación con el modelo Order a través de Order_Product
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product', 'id_product', 'id_order')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }
}
