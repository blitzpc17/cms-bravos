<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Viajes extends Model
{
    protected $table = "viajes";
    protected $fillable = [
        'choferesId',
        'clienteId',
        'pedidosId',
        'estadosId',
        'lugarSalida',
        'fechaSalida',
        'lugarDestino',
        'lugarDestinoAux',
        'fechaLlegada',
        'trayectoMaps',
        'subtotal',
        'total',     
    ];
}
