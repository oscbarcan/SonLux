<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'proveedores';
    protected $primaryKey = 'id';
    public $timestamps = false;

    // Relación con el modelo Producto
    public function productos()
    {
        return $this->hasMany(Product::class, 'id_proveedor', 'id');
    }
}
