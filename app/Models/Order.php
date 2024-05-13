<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $timestamps = false;

    // Relación con el modelo Usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    // Relación con el modelo Factura
    public function bill()
    {
        return $this->hasOne(Bill::class, 'id_order', 'id');
    }

    // Relación con el modelo Detalle_pedido
    public function order_detail()
    {
        return $this->hasMany(Order_Detail::class, 'id_order', 'id');
    }
}
