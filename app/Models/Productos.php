<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Productos extends Model
{
    protected $table = "Productos";
    protected $fillable = [
        'descripcion',
        'precio',
        'tiposId',
        'estadosId',
        'proveedoresId',
        'existencias',
        'descuento',
        'precioAnterior',
        'iconoProducto',
        'imgProducto',     
    ];
}
