<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'bills';
    protected $primaryKey = 'id';
    public $timestamps = false;

    // Relación con el modelo Pedido
    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order', 'id');
    }
}
