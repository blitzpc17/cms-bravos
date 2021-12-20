<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Pedidos extends Model
{
    protected $table = "pedidos";
    protected $fillable = [
        'folio',
        'partidas',
        'total',
        'estadosId',
        'choferesId',
        'observacionesCliente',
        'clientesId',
        'observacionesProveedor',
        'proveedoresId',
        'tiempoEstimadoEntrega',
        'fechaEntrega',     
    ];
}
