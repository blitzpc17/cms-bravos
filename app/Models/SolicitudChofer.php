<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class SolicitudChofer extends Model
{
    protected $table = "SolicitudChofer";
    protected $fillable = [
        'nombres',
        'apellidos',
        'telefono',        
        'email',
        'calle',
        'noext',
        'noint',
        'referencias',
        'cp',
        'estadosId',
        'tiposChoferId',        
        'razonSolicitud',
        'experienciaManejo',
        'cuentaUnidad',
        'licenciaVigente',
        'evIne',
        'evLicencia',
        'evSelfie',
    ];
}
