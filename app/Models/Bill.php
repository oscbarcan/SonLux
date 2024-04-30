<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'facturas';
    protected $primaryKey = 'id';
    public $timestamps = false;

    // Relación con el modelo Pedido
    public function pedido()
    {
        return $this->belongsTo(Order::class, 'id_pedido', 'id');
    }
}
