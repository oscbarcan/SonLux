<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;
    protected $table = 'providers';
    protected $primaryKey = 'id';
    public $timestamps = false;

    // Relación con el modelo Producto
    public function products()
    {
        return $this->hasMany(Product::class, 'id_provider', 'id');
    }
}
